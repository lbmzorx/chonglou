<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%img_upload}}".
 *
 * @property string $id
 * @property string $filePath
 * @property int $add_time
 * @property int $user_id 用户ID
 * @property int $admin_id 管理员ID
 */
class ImgUpload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%img_upload}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['add_time', 'user_id', 'admin_id'], 'integer'],
            [['filePath'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'filePath' => Yii::t('model', 'File Path'), //
            'add_time' => Yii::t('model', 'Add Time'), //
            'user_id' => Yii::t('model', 'User ID'), //用户ID
            'admin_id' => Yii::t('model', 'Admin ID'), //管理员ID
        ];
    }
}


