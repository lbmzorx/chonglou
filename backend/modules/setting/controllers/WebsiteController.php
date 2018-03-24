<?php

namespace backend\modules\setting\controllers;

use Yii;
use common\models\data\Options;
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
class WebsiteController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new OptionsSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Options::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Options::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Options::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Options::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Options::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>Options::className(),
            ],
        ];
    }
}
