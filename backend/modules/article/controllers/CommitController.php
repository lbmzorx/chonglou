<?php

namespace backend\modules\article\controllers;

use Yii;
use common\models\data\ArticleCommit;
use common\models\search\Commit;
use yii\web\Controller;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * CommitController implements the CRUD actions for ArticleCommit model.
 */
class CommitController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new Commit();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => ArticleCommit::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => ArticleCommit::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => ArticleCommit::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => ArticleCommit::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => ArticleCommit::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>ArticleCommit::className(),
            ],
        ];
    }
}
