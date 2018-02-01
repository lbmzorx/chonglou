<?php

namespace frontend\modules\user\controllers;

use frontend\models\user\UserMessage;
use yii\web\Controller;

/**
 * Default controller for the `user` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model=new UserMessage();

        return $this->render('index',$model);
    }
}
