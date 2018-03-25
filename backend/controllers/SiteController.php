<?php
namespace backend\controllers;

use common\components\behaviors\LimitLogin;
use common\components\events\LoginEvent;
use Yii;
use common\models\admin\LoginForm;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    const EVENT_BEFORE_LOGIN='beforeLogin';

    public function actions()
    {
        return [
            'error' => [
                'class' => 'backend\components\actions\ErrorAction',
                'guestView'=>'error-guest',
                'userView'=>'error-user',
            ],
        ];


    }

    public function behaviors()
    {
        return [
            'check_login'=>[
                'class'=>LimitLogin::className(),
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->trigger(LoginEvent::EVENT_BEFORE_LOGIN,new LoginEvent());
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            \yii::$app->getSession()->setFlash('Success',Yii::t('app','Login Success!'));
            return $this->goBack();
        } else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
