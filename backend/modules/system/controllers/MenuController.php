<?php

namespace backend\modules\system\controllers;

use Yii;
use common\models\data\Menu;
use common\models\search\Menu as MenuSearch;
use yii\web\Controller;
use backend\components\actions\CreateAction;
use backend\components\actions\ViewAction;
use backend\components\actions\UpdateAction;
use backend\components\actions\IndexAction;
use backend\components\actions\DeleteAction;
use backend\components\actions\SortAction;
use backend\components\actions\ChangeStatusAction;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $searchModel = new MenuSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'view' => [
                'class' => ViewAction::className(),
                'modelClass' => Menu::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Menu::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Menu::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Menu::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Menu::className(),
            ],
            'change-status'=>[
                'class'=>ChangeStatusAction::className(),
                'modelClass'=>Menu::className(),
            ],
        ];
    }
}
