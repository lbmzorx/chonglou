<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/4
 * Time: 14:24
 */

namespace frontend\models;


use yii\base\Model;
class FormArticle extends Model
{
    public $title;
    public $content;
    public $cate;
    public $tags;
    public $cate_id;
    public $publish;
    public $user_id;

    public function rules()
    {
        return [
            [['user_id', 'cate_id', 'publish'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['tags'], 'string', 'max' => 20],
            [['title','cate_id','tags','content','user_id'],'required'],
            [['publish'],'in', 'range' => [0,1]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'标题',
            'content'=>'内容',
            'cate_id'=>'分类',
            'tags'=>'标签',
            'publish'=>'发布',
        ];
    }

    /**
     * @param \yii\db\ActiveRecord $article
     */
    public function save($article){
        if($this->validate()){
            $article->status=0;
            $article->remain=0;
            if($article->load($this->toArray(),'') && $article->save()){
                return true;
            }else{
                $this->addErrors($article->getFirstErrors());
            }
        }
        return false;
    }

}