<?php

namespace backend\modules\system\controllers;

use yii\web\Controller;

/**
 * Default controller for the `system` module
 */
class ToastrController extends Controller
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
