<?php

namespace backend\modules\article\controllers;

use backend\controllers\CommonController;
use frontend\models\ArticleCate;
use Yii;
use common\models\crud\Article as ArticleCrud;
use common\models\search\Article as ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Article model.
 */
class DefaultController extends CommonController
{
    public $left_nav_id='article';
//    public $enableCsrfValidation=false;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $rules= [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
        return array_merge($rules,parent::behaviors());
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

//        echo $dataProvider->query->createCommand()->getRawSql();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleCrud();
        $model->user_id=\yii::$app->user->identity->id;
        $model->status=ArticleCrud::ADMIN_ADDER;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ArticleCrud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCrud::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangeStatus(){
        $request=\yii::$app->request;
        $id=$request->post('id');
        $key=$request->post('key');
        $value=$request->post('value');

        $this->reJson();

        if($id && preg_match('/[\d]+/',$id)){
            $model=$this->findModel($id);
            if($model->load([$key=>$value],'')&&$model->save()){
                return ['status'=>true,'msg'=>Yii::t('app','修改成功')];
            }else{
                return ['status'=>true,'msg'=>Yii::t('app',current($model->getFirstErrors()))];
            }
        }
        return ['status'=>false,'msg'=>Yii::t('app','修改失败')];
    }

}
