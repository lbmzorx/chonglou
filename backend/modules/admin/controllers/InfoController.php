<?php

namespace backend\modules\admin\controllers;

use Yii;
use common\models\data\AdminInfo;
use common\models\search\AdminInfo as AdminInfoSearch;
use backend\Controllers\CommonController;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * InfoController implements the CRUD actions for AdminInfo model.
 */
class InfoController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new AdminInfoSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => AdminInfo::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => AdminInfo::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => AdminInfo::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => AdminInfo::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => AdminInfo::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>AdminInfo::className(),
            ],
        ];
    }
}
