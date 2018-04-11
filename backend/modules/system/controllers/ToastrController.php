<?php

namespace backend\modules\system\controllers;

use backend\controllers\CommonController;
/**
 * Default controller for the `system` module
 */
class ToastrController extends CommonController
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
