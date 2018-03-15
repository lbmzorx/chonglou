<?php

namespace backend\modules\article\controllers;

use Yii;
use common\models\data\Tag;
use common\models\search\Tag as TagSearch;
use yii\web\Controller;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new TagSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Tag::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Tag::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Tag::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Tag::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Tag::className(),
            ],
        ];
    }
}
