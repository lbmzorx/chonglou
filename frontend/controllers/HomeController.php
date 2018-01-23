<?php
namespace frontend\controllers;

use frontend\models\Article;
use frontend\models\Speaks;
use frontend\models\Tag;
use frontend\models\Topic;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class HomeController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $speaks=Speaks::home();
        $articles=Article::home();
        $topics=Topic::home();
        $tags=Tag::home();
        return $this->render('index',['speaks'=>$speaks,'articles'=>$articles,'topics'=>$topics,'tags'=>$tags]);
    }


}
