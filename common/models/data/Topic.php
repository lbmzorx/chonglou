<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%topic}}".
 *
 */
class Topic extends \common\models\database\Topic
{

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cate_id' => Yii::t('app', '分类'),
            'title' => Yii::t('app', '标题'),
            'author' => Yii::t('app', '作者'),
            'content' => Yii::t('app', '内容'),
            'remain' => Yii::t('app', '提醒,0未提醒，1已经提醒'),
            'publish' => Yii::t('app', '发布,0不发布，1发布,2发布当前'),
            'status' => Yii::t('app', '状态值，0待审核,1审核通过,2正在审核,3审核不通过'),
            'tags' => Yii::t('app', '标签'),
            'commit' => Yii::t('app', '评论'),
            'view' => Yii::t('app', '浏览'),
            'collection' => Yii::t('app', '收藏'),
            'thumbup' => Yii::t('app', '点赞'),
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '编辑时间'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
}
