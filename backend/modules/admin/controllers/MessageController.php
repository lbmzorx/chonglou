<?php

namespace backend\modules\admin\controllers;

use Yii;
use common\models\data\AdminMessage;
use common\models\search\AdminMessage as AdminMessageSearch;
use backend\Controllers\CommonController;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * MessageController implements the CRUD actions for AdminMessage model.
 */
class MessageController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new AdminMessageSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => AdminMessage::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => AdminMessage::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => AdminMessage::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => AdminMessage::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => AdminMessage::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>AdminMessage::className(),
            ],
        ];
    }
}
