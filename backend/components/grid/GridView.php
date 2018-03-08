<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/6
 * Time: 0:33
 */
namespace backend\components\grid;

use Yii;
class GridView extends \yii\grid\GridView
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->pager = [
            'class'=>\common\components\widget\JumpPager::className(),
            'firstPageLabel'=>Yii::t('app','首页'),
            'nextPageLabel'=>Yii::t('app','下一页'),
            'prevPageLabel'=>Yii::t('app','上一页'),
            'lastPageLabel'=>Yii::t('app','尾页'),
        ];
    }
}