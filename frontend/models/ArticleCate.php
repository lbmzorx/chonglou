<?php

namespace frontend\models;


use common\models\data\User;
use yii\data\Pagination;
use yii\db\Query;
/**
 * ContactForm is the model behind the contact form.
 */
class ArticleCate
{
    public static function home(){
        return \common\models\data\ArticleCate::find()
            ->select(['id','name','level',])
            ->where(['status'=>1,'parent_id'=>0])
            ->orderBy(['id'=>SORT_DESC,])
            ->limit(11)
            ->all();
    }

    public function subCate(){

    }
}
