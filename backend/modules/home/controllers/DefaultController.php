<?php

namespace backend\modules\home\controllers;

use backend\controllers\CommonController;
use yii\web\Controller;

/**
 * Default controller for the `home` module
 */
class DefaultController extends CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
