<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-05 12:47
 */
namespace backend\models\form;

use yii;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use common\models\data\Maintain;
class AdForm extends Maintain
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'custom'=>[
                'class' =>AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE =>'type',
                ],
                'value'=>self::MAINTAIN_POSITION_TYPE_FIRM_AD,
            ],
        ]); // TODO: Change the autogenerated stub
    }
}