<?php

namespace backend\modules\auth\controllers;

use Yii;
use common\models\data\Admin;
use common\models\search\Admin as AdminSearch;
use backend\Controllers\CommonController;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new AdminSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Admin::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Admin::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Admin::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Admin::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Admin::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>Admin::className(),
            ],
        ];
    }
}
