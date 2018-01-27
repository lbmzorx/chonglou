<?php
namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\ArticleCate;
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

        $articles=new Article();
        $data=$articles->index();
        $cate = ArticleCate::home();
        $data['cate']=$cate;
        $tags=Tag::home();
        $data['tags']=$tags;
        return $this->render('index',['articles'=>$articles,'tags'=>$tags]);
    }


}
