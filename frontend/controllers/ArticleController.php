<?php
namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\ArticleCate;
use frontend\models\ArticleCommit;
use frontend\models\FormArticle;
use frontend\models\Tag;
use frontend\models\Topic;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class ArticleController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $article=new Article();
        $data=$article->index();
        $cate = ArticleCate::home();
        $data['cate']=$cate;
        $tags=Tag::home();
        $data['tags']=$tags;
        return $this->render('index',$data);
    }

    public function actionDetail($id){
        $articles=new Article();
        $article=$articles->detail($id);

        $articleCommit=new ArticleCommit();
        $commit=$articleCommit->articleCommit($id);
        $commit['article']=$article;
        return $this->render('detail',$commit);

    }

    public function actionAdd(){
        $model=new FormArticle();
        $model->user_id=\yii::$app->user->identity->id;
        $article=new Article();
        if ($model->load(Yii::$app->request->post()) && $model->save($article)) {
            return $this->redirect(['index',]);
        } else {
            return $this->render('add',['model'=>$model]);
        }

    }


}
