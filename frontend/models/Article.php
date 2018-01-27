<?php

namespace frontend\models;


use common\models\data\ArticleCate;
use common\models\data\User;
use yii\data\Pagination;
use yii\db\Query;
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

    public function index(){
        $request=\yii::$app->request;
        $query=(new Query())
            ->select(['a.*','u.name','u.head',])
            ->from(['a'=>Article::tableName()])
            ->leftJoin(['u'=>User::tableName()],['u.id'=>'a.user_id'])
            ->where(['a.status'=>1,'a.publish'=>1])
            ->andFilterWhere(['a.cate_id'=>$request->get('cate_id')])
            ->andFilterWhere(['like','a.name',$request->get('cate_name')])
            ->andFilterWhere(['like','tag',$request->get('tag')]);

        $page=new Pagination(['totalCount'=>$query->count(),'pageSize'=>20]);
        $page->page=$request->get($page->pageParam);

        $data=$query->offset($page->offset)->limit($page->limit)->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC])->all();
        return ['data'=>$data,'page'=>$page];
    }
}
