<?php

namespace backend\modules\article\controllers;

use backend\components\actions\UploadAction;
use common\models\data\ArticleContent;
use common\models\tool\UploadImg;
use Yii;
use common\models\data\Article;
use common\models\search\Article as ArticleSearch;
use yii\web\Controller;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\MutiUpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * DefaultController implements the CRUD actions for Article model.
 */
class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new ArticleSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Article::className(),
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Article::className(),
            ],
            'update' => [
                'class' => MutiUpdateAction::className(),
                'modelClass' => Article::className(),
                'transation'=>true,
                'depandeClass'=>[
                    'class'=>ArticleContent::className(),
                    'condition'=>['id'=>'{model:content_id}'],
                ],
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Article::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Article::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>Article::className(),
            ],
            'upload' => [
                'class' => UploadAction::className(),
                'modelClass' => Article::className(),
                'imgClass'=>UploadImg::className(),
            ],
        ];
    }
}
