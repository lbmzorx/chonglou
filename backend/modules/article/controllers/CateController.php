<?php

namespace backend\modules\article\controllers;

use Yii;
use common\models\data\ArticleCate;
use common\models\search\AritcleCate;
use yii\web\Controller;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * CateController implements the CRUD actions for ArticleCate model.
 */
class CateController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new AritcleCate();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => ArticleCate::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => ArticleCate::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => ArticleCate::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => ArticleCate::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => ArticleCate::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>ArticleCate::className(),
            ],
        ];
    }
}
