<?php

namespace frontend\models;

use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class Tag extends \common\models\data\Tag
{
    public static function home(){
        return self::find()
            ->select(['id','name','frequence',])
            ->orderBy(['frequence'=>SORT_DESC,'id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }
}
