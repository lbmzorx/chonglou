<?php

namespace backend\modules\setting\controllers;

use backend\components\actions\CreateAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\ViewAction;
use Yii;
use backend\models\CustomOptions;
use yii\base\Model;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;

class BannerController extends \backend\Controllers\CommonController
{
    public function actions()
    {
        return [
            'create-option' => [
                'class' => CreateAction::className(),
                'modelClass' => CustomOptions::className(),
                'scenario'=>'custom',
            ],
            'view-option' => [
                'class' => ViewAction::className(),
                'modelClass' => CustomOptions::className(),
            ],
            'update-option' => [
                'class' => UpdateAction::className(),
                'modelClass' => CustomOptions::className(),
                'scenario'=>'custom',
            ],
            'delete-option' => [
                'class' => DeleteAction::className(),
                'modelClass' => CustomOptions::className(),
                'scenario'=>'custom',
            ],
        ];
    }

    /**
     * 自定义设置
     *
     * @return string
     */
    public function actionIndex()
    {
        $settings = CustomOptions::find()->where(['type' => CustomOptions::OPTIONS_TYPE_SELF])->orderBy("sort")->indexBy('id')->all();

        if (Model::loadMultiple($settings, yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                $setting->save(false);
            }
            yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
        }
        $options = new CustomOptions();
        $options->loadDefaultValues();

        return $this->render('index', [
            'settings' => $settings,
            'model' => $options,
        ]);
    }
}
