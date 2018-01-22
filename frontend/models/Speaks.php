<?php

namespace frontend\models;

/**
 * ContactForm is the model behind the contact form.
 */
class Speaks extends \common\models\data\Speaks
{
    public static function home(){
        return self::find()
            ->select(['id','user_id','content','commit','view','thumbup'])
            ->where(['or',['status'=>1],['>','status',20]])
            ->orderBy(['status'=>SORT_DESC,'id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }
}
