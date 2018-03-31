<?php

namespace backend\modules\auth\controllers;


use common\components\tools\ModelHelper;
use Yii;
use backend\models\form\Rbac;
use backend\controllers\CommonController;
use backend\models\search\Rbac as RbacSearch;
use yii\web\MethodNotAllowedHttpException;
use yii\web\Response;

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

    public function actionSort(){
        if (yii::$app->getRequest()->getIsPost()) {
            $name=yii::$app->getRequest()->post('name');
            $sort=yii::$app->getRequest()->post('sort');
            $status=false;
            if(is_array($name)){
                foreach ($name as $key){
                    $t=\yii::$app->db->beginTransaction();
                    $tstatus=true;
                    $model = new Rbac(['scenario'=>'permission']);
                    $model->fillModel($key);
                    if($model->sort!=$sort){
                        $model->sort = $sort;
                        $status=$model->updatePermission($key);
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
                $model = new Rbac(['scenario'=>'permission']);
                $model->fillModel($name);
                if($model->sort!=$sort){
                    $model->sort = $sort;
                    $status=$model->updatePermission($name);
                    if($status){
                        $status=true;
                    }
                }
            }
            if(\yii::$app->request->isAjax){
                \yii::$app->response->format=Response::FORMAT_JSON;
                if($status){
                    return ['status'=>true,'msg'=>yii::t('app','Success')];
                }else{
                    return ['status'=>false,'msg'=>yii::t('app','Update Failed')];
                }
            }
        }
    }

    public function actionUpdate($name)
    {
        $model = new Rbac(['scenario'=>'permission']);
        $model->fillModel($name);
        if( yii::$app->getRequest()->getIsPost() ) {
            if ($model->load(yii::$app->getRequest()->post()) && $model->validate() && $model->updatePermission($name)) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
            } else {
                $errors = $model->getErrors();
                $err=ModelHelper::getErrorAsString($errors);
                Yii::$app->getSession()->setFlash('error', $err);
            }
        }
        if(yii::$app->getRequest()->isAjax){
            if(isset($err)){
                return ['status'=>false,'msg'=>$err];
            }else{
                return ['status'=>true,'msg'=>yii::t('app', 'Success')];
            }
        }else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    public function actionDelete($name=null)
    {
        $model = new Rbac(['scenario'=>'permission']);
        if( yii::$app->getRequest()->getIsPost() ){
            yii::$app->getResponse()->format = Response::FORMAT_JSON;
            $param = yii::$app->getRequest()->post('id', null);
            if($param !== null){
                $name = $param;
            }
            $ids = explode(',', $name);
            $errorIds = [];
            foreach ($ids as $id) {
                $model->fillModel($id);
                if (! $model->deletePermission()) {
                    $errorIds[] = $id;
                }
            }
            if (count($errorIds) == 0) {
                return ['status' => true, 'msg' => yii::t('app', 'Success')];
            } else {
                return ['status' => false, 'msg' => 'id ' . implode(',', $errorIds) . yii::t('app', 'Error')];
            }
        }else {
            throw new MethodNotAllowedHttpException(yii::t('app', "Delete must be POST http method"));
        }
    }

}
