<?php

namespace backend\modules\maintain\controllers;

use Yii;
use common\models\data\Maintain;
use common\models\search\Maintain as MaintainSearch;
use backend\Controllers\CommonController;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * BannerController implements the CRUD actions for Maintain model.
 */
class BannerController extends CommonController
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new MaintainSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Maintain::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Maintain::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Maintain::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Maintain::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Maintain::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>Maintain::className(),
            ],
        ];
    }
}
