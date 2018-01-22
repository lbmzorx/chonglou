<?php

namespace frontend\models;

/**
 * ContactForm is the model behind the contact form.
 */
class Topic extends \common\models\data\Topic
{
    public static function home(){
        return self::find()
            ->select(['id','user_id','title','add_time','commit','view','collection','thumbup'])
            ->where(['publish'=>1])->andWhere(['or',['status'=>1],['>','status',20]])
            ->orderBy(['status'=>SORT_DESC,'id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }
}
