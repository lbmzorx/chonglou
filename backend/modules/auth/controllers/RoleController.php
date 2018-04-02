<?php

namespace backend\modules\auth\controllers;

use yii;
use backend\models\form\Rbac;
use backend\controllers\CommonController;
use backend\models\search\Rbac as RbacSearch;
use yii\web\UnprocessableEntityHttpException;
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
                return $this->redirect(['index']);
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

    public function actionUpdate($name)
    {
        $model = new Rbac(['scenario'=>'role']);
        $model->fillModel($name);//var_dump($model->roles);exit;
        if( yii::$app->getRequest()->getIsPost() ) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate() && $model->updateRole($name)) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                Yii::$app->getSession()->setFlash('error', $err);
            }
        }
        return $this->render('update', [
            'model' => $model
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

    public function actionSort(){
        if (yii::$app->getRequest()->getIsPost()) {
            $name=yii::$app->getRequest()->post('name');
            $sort=yii::$app->getRequest()->post('sort');
            $status=false;
            if(is_array($name)){
                foreach ($name as $key){
                    $t=\yii::$app->db->beginTransaction();
                    $tstatus=true;
                    $model = new Rbac(['scenario'=>'role']);
                    $model->fillModel($key);
                    if($model->sort!=$sort){
                        $model->sort = $sort;
                        $status=$model->updateRole($key);
                        if($status==false){
                            $t->rollBack();
                            $tstatus=false;
                            break;
                        }
                    }
                    if($tstatus==true){
                        $t->commit();
                        $status=true;
                    }
                }
            }else{
                $model = new Rbac(['scenario'=>'role']);
                $model->fillModel($name);
                if($model->sort!=$sort){
                    $model->sort = $sort;
                    $status=$model->updateRole($name);
                    if($status){
                        $status=true;
                    }
                }
            }
            if(\yii::$app->request->isAjax){
                \yii::$app->response->format=yii\web\Response::FORMAT_JSON;
                if($status){
                    return ['status'=>true,'msg'=>yii::t('app','Success')];
                }else{
                    return ['status'=>false,'msg'=>yii::t('app','Update Failed')];
                }
            }
        }
    }

    public function actionDelete($name='', $id=null)
    {
        if( yii::$app->getRequest()->getIsPost() ) {
            $model = new Rbac(['scenario' => 'role']);
            if ($name == '') {
                Yii::$app->getResponse()->format = yii\web\Response::FORMAT_JSON;
                $param = yii::$app->getRequest()->post('id', null);
                if($param !== null) $id = $param;
                if (!$id) {
                    return ['status' => 1, 'msg' => yii::t('app', "Name doesn't exit")];
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
                        return ['status'=>true,'msg'=>'Success'];
                    } else {
                        return $this->redirect(yii::$app->request->headers['referer']);
                    }
                } else {
                    throw new UnprocessableEntityHttpException(yii::t('app', 'Error'));
                }
            }
        }else{
            throw new yii\web\MethodNotAllowedHttpException(yii::t('app', "Delete must be POST http method"));
        }
    }


}
