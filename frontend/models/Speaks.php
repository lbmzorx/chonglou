<?php

namespace frontend\models;

use yii\base\Model;


/**
 * ContactForm is the model behind the contact form.
 */
class Speaks extends Model
{
    public static function home(){
        return \common\models\data\Speaks::find()
            ->select(['id','user_id','content','commit','view','thumbup'])
            ->where(['or',['status'=>1],['>','status',20]])
            ->orderBy(['status'=>SORT_DESC,'id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }
}
