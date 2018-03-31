<?php

namespace backend\modules\auth\controllers;


use Yii;
use backend\models\form\Rbac;
use backend\controllers\CommonController;
use backend\models\search\Rbac as RbacSearch;
/**
 * Default controller for the `auth` module
 */
class PermissionController extends CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RbacSearch(['scenario'=>'permission']);
        $dataProvider = $searchModel->searchPermissions(\Yii::$app->getRequest()->getQueryParams());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate()
    {
        $model = new Rbac(['scenario'=>'permission']);
        if( Yii::$app->getRequest()->getIsPost() ) {
            if ($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->createPermission()) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Success'));
                return $this->redirect(['permissions']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                Yii::$app->getSession()->setFlash('error', $err);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

}
