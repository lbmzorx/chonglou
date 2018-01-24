<?php

namespace frontend\models;
use common\models\data\User;

/**
 * ContactForm is the model behind the contact form.
 */
class Topic extends \common\models\data\Topic
{
    public static function home(){
        return self::find()->alias('t')
            ->select(['t.id','t.user_id','u.name','t.title','t.add_time','t.commit','t.view','t.collection','t.thumbup'])
            ->innerJoin(['u'=>User::tableName()],'u.id=t.user_id')
            ->where(['t.publish'=>1])->andWhere(['or',['t.status'=>1],['>','t.status',20]])
            ->orderBy(['t.status'=>SORT_DESC,'t.id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }
}
