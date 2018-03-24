<?php

namespace backend\modules\setting\controllers;

use backend\models\form\SettingWebsiteForm;
use common\components\behaviors\StatusCode;
use Yii;
use common\models\data\Options;
use common\models\search\Options as OptionsSearch;
use backend\Controllers\CommonController;
use yii\base\Model;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;
use yii\widgets\ActiveForm;

/**
 * WebsiteController implements the CRUD actions for Options model.
 */
class DefaultController extends CommonController
{
    /**
     * 网站设置
     *
     * @return string
     */
    public function actionWebsite()
    {
        $model = new SettingWebsiteForm();
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate() && $model->setWebsiteConfig()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                yii::$app->getSession()->setFlash('error', $err);
            }
        }

        $model->getWebsiteSetting();
        return $this->render('website', [
            'model' => $model
        ]);

    }

    /**
     * 自定义设置
     *
     * @return string
     */
    public function actionCustom()
    {
        $settings = Options::find()->where(['type' => Options::OPTIONS_TYPE_SELF])->orderBy("sort")->indexBy('id')->all();

        if (Model::loadMultiple($settings, yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                $setting->save(false);
            }
            yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
        }
        $options = new Options();
        $options->loadDefaultValues();

        return $this->render('custom', [
            'settings' => $settings,
            'model' => $options,
        ]);
    }

    /**
     * 增加自定义设置项
     *
     * @return array
     * @throws UnprocessableEntityHttpException
     */
    public function actionCustomCreate()
    {
        $model = new Options();
        $model->type = Options::OPTIONS_TYPE_SELF;
        if ($model->load(yii::$app->getRequest()->post()) && $model->save()) {
            yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
            return [];
        } else {
            $errors = $model->getErrors();
            $err = '';
            foreach ($errors as $v) {
                $err .= $v[0] . '<br>';
            }
            yii::$app->getResponse()->format = Response::FORMAT_JSON;
            throw new UnprocessableEntityHttpException($err);
        }
    }

    /**
     * 修改自定义设置项
     *
     * @param string $id
     * @return array
     * @throws UnprocessableEntityHttpException
     */
    public function actionCustomUpdate($id = '')
    {
        $model = Options::findOne(['id' => $id]);
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->save()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return [];
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                yii::$app->getResponse()->format = Response::FORMAT_JSON;
                throw new UnprocessableEntityHttpException($err);
            }
        } else {
            yii::$app->getResponse()->format = Response::FORMAT_HTML;

            echo '<div class="" id="editForm">';
            echo '<div class="ibox-content">';
            $form = ActiveForm::begin(['options' => ['name' => 'edit']]);
            echo $form->field($model, 'name')->textInput();
            echo $form->field($model, 'input_type')->dropDownList(StatusCode::tranStatusCode(Options::$input_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]);
            echo $form->field($model, 'tips')->textInput();
            echo $form->field($model, 'autoload')->dropDownList(StatusCode::tranStatusCode(Options::$autoload_code,'app'),['prompt'=>\Yii::t('app','Please Select')]);
            echo $form->field($model, 'value')->textInput();
            echo $form->field($model, 'sort')->textInput();
            ActiveForm::end();
            echo '</div>';
            echo '</div>';
        }
    }

    /**
     * 邮件smtp设置
     *
     * @return string
     */
    public function actionSmtp()
    {
        $model = new SettingSmtpForm();
        if (yii::$app->getRequest()->getIsPost()) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate() && $model->setSmtpConfig()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                yii::$app->getSession()->setFlash('error', $err);
            }
        }

        $model->getSmtpConfig();
        return $this->render('smtp', [
            'model' => $model
        ]);

    }

    /**
     * 发送测试邮件确认smtp设置是否正确
     *
     * @return mixed
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionTestSmtp()
    {
        $model = new SettingSmtpForm();
        yii::$app->getResponse()->format = Response::FORMAT_JSON;
        if ($model->load(yii::$app->getRequest()->post()) && $model->validate()) {
            $mailer = yii::createObject([
                'class' => Mailer::className(),
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => $model->smtp_host,
                    'username' => $model->smtp_username,
                    'password' => $model->smtp_password,
                    'port' => $model->smtp_port,
                    'encryption' => $model->smtp_encryption,

                ],
                'messageConfig' => [
                    'charset' => 'UTF-8',
                    'from' => [$model->smtp_username => $model->smtp_nickname]
                ],
            ]);
            return $mailer->compose()
                ->setFrom($model->smtp_username)
                ->setTo($model->smtp_username)
                ->setSubject('Email SMTP test ' . yii::$app->name)
                ->setTextBody('Email SMTP config works successful')
                ->send();
        } else {
            $error = '';
            foreach ($model->getErrors() as $item) {
                $error .= $item[0] . "<br/>";
            }
            throw new BadRequestHttpException( $error );
        }
    }

}
