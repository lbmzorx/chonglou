<?php

namespace frontend\modules\user\controllers;

use frontend\models\user\UserMessage;
use frontend\models\user\UserInfo;
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
        $umsgModel=new UserMessage();
        $umsg=$umsgModel->active();

        $userInfo=new UserInfo();
        $umsg['uscore']=$userInfo->score();
        $umsg['ubaseinfo']=$userInfo->baseInfo();

        return $this->render('index',$umsg);
    }
}
