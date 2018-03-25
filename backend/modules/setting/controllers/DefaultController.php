<?php

namespace backend\modules\setting\controllers;

use backend\models\form\SettingSmtpForm;
use backend\models\form\SettingWebsiteForm;
use common\components\behaviors\StatusCode;
use common\components\tools\ModelHelper;
use Yii;
use common\models\data\Options;
use backend\Controllers\CommonController;
use yii\base\Model;
use yii\helpers\VarDumper;
use yii\swiftmailer\Mailer;
use yii\web\BadRequestHttpException;
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
        $website = new SettingWebsiteForm();
        $smtp = new SettingSmtpForm();
        $website->readOptions();
        $smtp->readOptions();
        return $this->render('website', [
            'website' => $website,
            'smtp' => $smtp,
        ]);
    }

    public function actionSaveWebsite()
    {
        $website = new SettingWebsiteForm();
        $request=yii::$app->getRequest();
        if ($request->getIsPost()) {
            if ($website->load(yii::$app->getRequest()->post()) && $website->validate() && $website->saveOptions()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                $res=['status'=>true,'msg'=>'Success'];
            } else {
                $errors = $website->getErrors();
                $err = ModelHelper::getErrorAsString($errors);
                $res=['status'=>false,'msg'=>$err];
                yii::$app->getSession()->setFlash('error', $err);
            }
            if($request->isAjax){
                \yii::$app->getResponse()->format=Response::FORMAT_JSON;
                return $res;
            }
        }
        return $this->redirect('website');
    }

    /**
     * 邮件smtp设置
     */
    public function actionSaveSmtp()
    {
        $smtp = new SettingSmtpForm();
        $request=yii::$app->getRequest();
        if ($request->getIsPost()) {
            if ($smtp->load(yii::$app->getRequest()->post()) && $smtp->validate() && $smtp->saveOptions()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                $res=['status'=>true,'msg'=>'Success'];
            } else {
                $errors = $smtp->getErrors();
                $err = ModelHelper::getErrorAsString($errors);
                $res=['status'=>false,'msg'=>$err];
                yii::$app->getSession()->setFlash('error', $err);
            }
            if($request->isAjax){
                \yii::$app->getResponse()->format=Response::FORMAT_JSON;
                return $res;
            }
        }
        return $this->redirect('website');
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
