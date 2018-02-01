<?php

namespace frontend\models\user;

use Yii;
use yii\base\Model;
use common\models\data\UserMessage as UserMessageModel;
/**
 * This is the model class for table "{{%user_message}}".
 *
 */
class UserMessage extends Model
{

    public function search(){
        $query = UserMessageModel::find()->alias('a')->select(['*'])->where(['user_id'=>\yii::$app->user->id]);

        $query->andFilterWhere([]);



    }

}
