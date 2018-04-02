<?php

namespace backend\modules\log\controllers;

use Yii;
use common\models\data\Log;
use common\models\search\Log as LogSearch;
use backend\Controllers\CommonController;
use backend\components\actions\ViewAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;

/**
 * RunningController implements the CRUD actions for Log model.
 */
class RunningController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new LogSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Log::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Log::className(),
            ],
        ];
    }
}
