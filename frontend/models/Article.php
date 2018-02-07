<?php

namespace frontend\models;


use common\models\data\ArticleCate;
use common\models\data\User;
use yii\data\Pagination;
/**
 * ContactForm is the model behind the contact form.
 */
class Article extends \common\models\data\Article
{

    /**
     * @return array
     */
    public function rules()
    {
        $rules=[
            [['title','cate_id','tags','content','user_id'],'required'],
            [['title'],'string',],
        ];
        return \yii\helpers\ArrayHelper::merge(parent::rules(),$rules);
    }

    public static function home(){
        return self::find()
            ->select(['id','title','add_time','commit','view','collection','thumbup'])
            ->where(['status'=>1,'publish'=>1])
            ->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC,])
            ->limit(16)
            ->all();
    }

    /**
     * 文章列表
     * @return array
     */
    public function index(){
        $request=\yii::$app->request;
        $query=self::find()
            ->select(['id','user_id','title','thumbup','collection','commit','add_time'])
            ->with('user')
            ->where(['status'=>1,'publish'=>1])
            ->andFilterWhere(['cate_id'=>$request->get('cate_id')])
            ->andFilterWhere(['like','name',$request->get('cate_name')])
            ->andFilterWhere(['like','tag',$request->get('tag')]);

        $page=new Pagination(['totalCount'=>$query->count(),'pageSize'=>20]);
        $page->page=$request->get($page->pageParam);

        $data=$query->offset($page->offset)->limit($page->limit)->orderBy(['sort'=>SORT_DESC,'id'=>SORT_DESC])->all();
        return ['data'=>$data,'page'=>$page];
    }

    /**
     * 文章详情
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     */
    public function detail($id){
        return self::find()->where(['id'=>$id])->with('user')->with('userInfo')->with('userScore')->asArray()->one();
    }


    /**
     * 其他参数
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->user_id=\yii::$app->user->id;
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }



}
