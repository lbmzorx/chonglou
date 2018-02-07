<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/4
 * Time: 14:24
 */

namespace frontend\models;


use yii\base\Model;
class FormArticleCommit extends Model
{
    public $article_id;
    public $commit_id;
    public $user_id;
    public $content;

    public function rules()
    {
        return [
            [['user_id', 'article_id', 'commit_id'], 'integer'],
            [['content'], 'string','max'=>500],
            [['article_id', 'commit_id','content'],'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id'=>'用户',
            'article_id'=>'文章',
            'commit_id'=>'上级评论',
            'content'=>'内容',
        ];
    }

    /**
     * @param \yii\db\ActiveRecord $commit
     */
    public function save($commit){
        if($this->validate()){
            $commit->status=0;
            $commit->remain=0;
            if($commit->load($this->toArray(),'') && $commit->save()){
                return true;
            }else{
                $this->addErrors($commit->getFirstErrors());
            }
        }
        return false;
    }



}