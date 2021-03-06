<?php
/**
 * bannre controller
 */
namespace backend\modules\maintain\controllers;

use common\models\data\Options;
use Yii;
use backend\models\form\SettingBannerForm;
use common\models\search\Options as OptionsSearch;
use backend\Controllers\CommonController;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * WebsiteController implements the CRUD actions for Options model.
 */
class BannerController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new OptionsSearch();
                    $dataProvider = $searchModel->search(array_merge(yii::$app->getRequest()->getQueryParams(),['Options'=>['type'=>Options::OPTIONS_TYPE_BANNER]]));
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' =>SettingBannerForm::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => SettingBannerForm::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => SettingBannerForm::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => SettingBannerForm::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => SettingBannerForm::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>SettingBannerForm::className(),
            ],
        ];
    }
}
