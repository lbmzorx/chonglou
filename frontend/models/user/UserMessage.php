<?php

namespace frontend\models\user;

use common\models\data\UserAction as UserActionModel;
use yii\base\Object;
use yii\caching\TagDependency;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%user_message}}".
 *
 */
class UserMessage extends Object
{


    public function active(){
        $request=\yii::$app->request;

        $query = UserActionModel::find()->alias('a')->select(['a.*'])->where(['user_id'=>\yii::$app->user->id])->with('user');
        $query->andFilterWhere([
            'action_type'=>$request->get('action_type'),
            'user_id'=>$request->get('user_id'),
        ]);

        $key=['class'=>self::className(),'method'=>__METHOD__,'type'=>'count'];

        $count=\yii::$app->fileCache->get($key);
        if(!$count){
            $count=$query->count();
            \yii::$app->fileCache->set($key,$count,60,new TagDependency([
                'tags'=>UserActionModel::TAGS_USERACTION.\yii::$app->user->id
            ]));
        }
        $pages=new Pagination(['totalCount'=>$count]);
        $data=$query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        return ['umsg'=>$data,'pages'=>$pages];
    }


}
