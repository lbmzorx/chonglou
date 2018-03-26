<?php

namespace backend\modules\log\controllers;

use Yii;
use common\models\data\AdminLog;
use common\models\search\AdminLog as AdminLogSearch;
use backend\Controllers\CommonController;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;

/**
 * AdminLogController implements the CRUD actions for AdminLog model.
 */
class AdminLogController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new AdminLogSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => AdminLog::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => AdminLog::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => AdminLog::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => AdminLog::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => AdminLog::className(),
            ],
        ];
    }
}
