<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Article extends \common\models\search\Article
{
    public static function home(){
        return self::find()
            ->select(['id','title','add_time','commit','view','collection','thumbup'])
            ->where(['status'=>1,'publish'=>1])
            ->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }
}
