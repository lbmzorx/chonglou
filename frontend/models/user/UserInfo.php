<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3
 * Time: 13:39
 */

namespace frontend\models\user;


use common\models\data\UserScore;

class UserInfo
{

    /**
     * 获取分数
     * @return array|null|\yii\db\ActiveRecord
     */
    public function score(){
        $user_id=\yii::$app->user->id;
        return UserScore::find()->where(['user_id'=>$user_id])->asArray()->one();
    }

    public function baseInfo(){
        $user_id=\yii::$app->user->id;
        return \common\models\data\UserInfo::find()->where(['user_id'=>$user_id])->asArray()->one();
    }

}