<?php

namespace backend\modules\auth\controllers;

use yii;
use backend\models\form\Rbac;
use backend\controllers\CommonController;
use backend\models\search\Rbac as RbacSearch;
/**
 * Default controller for the `auth` module
 */
class RoleController extends CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RbacSearch(['scenario'=>'role']);
        $dataProvider = $searchModel->searchRoles(yii::$app->getRequest()->getQueryParams());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


    public function actionCreate()
    {
        $model = new Rbac(['scenario'=>'role']);
        if( yii::$app->getRequest()->getIsPost() ) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate() && $model->createRole()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['roles']);
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


    public function actionRoles()
    {
        $searchModel = new RbacSearch(['scenario'=>'role']);
        $dataProvider = $searchModel->searchRoles(yii::$app->getRequest()->getQueryParams());
        return $this->render('roles', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }



    public function actionRoleCreate()
    {
        $model = new Rbac(['scenario'=>'role']);
        if( yii::$app->getRequest()->getIsPost() ) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate() && $model->createRole()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['roles']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                Yii::$app->getSession()->setFlash('error', $err);
            }
        }
        return $this->render('role-create', [
            'model' => $model,
        ]);
    }

    public function actionRoleUpdate($name)
    {
        $model = new Rbac(['scenario'=>'role']);
        $model->fillModel($name);//var_dump($model->roles);exit;
        if( yii::$app->getRequest()->getIsPost() ) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate() && $model->updateRole($name)) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['roles']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                Yii::$app->getSession()->setFlash('error', $err);
            }
        }
        return $this->render('role-update', [
            'model' => $model
        ]);
    }

    public function actionRolesSort()
    {
        if (yii::$app->getRequest()->getIsPost()) {
            $data = yii::$app->getRequest()->post();
            if (! empty($data['sort'])) {
                foreach ($data['sort'] as $key => $value) {
                    $model = new Rbac(['scenario'=>'role']);
                    $model->fillModel($key);
                    if ($model->sort != $value) {
                        $model->sort = $value;
                        $model->updateRole($key);
                    }
                }
            }
        }
        return [];
    }

    public function actionRoleDelete($name='', $id=null)
    {
        if( yii::$app->getRequest()->getIsPost() ) {
            $model = new Rbac(['scenario' => 'role']);
            if ($name == '') {
                Yii::$app->getResponse()->format = Response::FORMAT_JSON;
                $param = yii::$app->getRequest()->post('id', null);
                if($param !== null) $id = $param;
                if (!$id) {
                    return ['code' => 1, 'message' => yii::t('app', "Name doesn't exit")];
                }
                $ids = explode(',', $id);
                $errorIds = [];
                foreach ($ids as $one) {
                    $model->fillModel($one);
                    if (!$model->deleteRole()) {
                        $errorIds[] = $one;
                    }
                }
                if (count($errorIds) == 0) {
                    return [];
                } else {
                    throw new UnprocessableEntityHttpException('id ' . implode(',', $errorIds));
                }
            } else {
                $model->fillModel($name);
                if ($model->deleteRole()) {
                    if (yii::$app->getRequest()->getIsAjax()) {
                        return [];
                    } else {
                        return $this->redirect(yii::$app->request->headers['referer']);
                    }
                } else {
                    throw new UnprocessableEntityHttpException(yii::t('app', 'Error'));
                }
            }
        }else{
            throw new MethodNotAllowedHttpException(yii::t('app', "Delete must be POST http method"));
        }
    }


}
