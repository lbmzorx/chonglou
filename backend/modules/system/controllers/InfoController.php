<?php

namespace backend\modules\system\controllers;

use backend\controllers\CommonController;
/**
 * MenuController implements the CRUD actions for Menu model.
 */
class InfoController extends CommonController
{
    public function actionIndex(){
        return $this->render('index');
    }
}
