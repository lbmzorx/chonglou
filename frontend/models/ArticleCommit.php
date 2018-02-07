<?php

namespace frontend\models;


use common\models\data\ArticleCate;
use common\models\data\User;
use yii\data\Pagination;
/**
 * ContactForm is the model behind the contact form.
 */
class ArticleCommit
{
    public function articleCommit($article_id){
        $request=\yii::$app->request;
        $query=\common\models\data\ArticleCommit::find()
            ->select(['id','user_id','commit_id','content','add_time'])
            ->with('user')
            ->where(['status'=>1,'article_id'=>$article_id])
            ->andFilterWhere(['commit_id'=>$request->get('commit_id')]);

        $page=new Pagination(['totalCount'=>$query->count(),'pageSize'=>20]);
        $page->page=$request->get($page->pageParam);

        $data=$query->offset($page->offset)->limit($page->limit)->orderBy(['id'=>SORT_ASC])->all();
        return ['commit'=>$data,'pageCommit'=>$page];
    }

}
