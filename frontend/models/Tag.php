<?php

namespace frontend\models;

use Yii;

/**
 * ContactForm is the model behind the contact form.
 */
class Tag extends \common\models\data\Tag
{

    public static $tag_color=['default','primary','success','info','warning','danger'];
    public static $tag_dim=['h2','h3','h4','h5','h6','p'];

    public static function home(){
        return \common\models\data\Tag::find()
            ->select(['id','name','frequence',])
            ->orderBy(['frequence'=>SORT_DESC,'id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }
}
