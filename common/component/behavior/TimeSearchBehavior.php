<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-01-22 17:23
 */
namespace common\components\behaviors;


use common\components\events\SearchEvent;

class TimeSearchBehavior extends \yii\base\Behavior
{

    public $timeAttributes = ['add_time','edit_time'];

    public $delimiter = "~";

    public $format = "int";


    public function init()
    {
        parent::init();
    }

    public function events()
    {
        return [
            SearchEvent::BEFORE_SEARCH => 'beforeSearch'
        ];
    }

    public function beforeSearch($event)
    {
        /** @var $event \common\components\events\SearchEvent */
        foreach ($this->timeAttributes as $attribute) {
            if($attribute !== null) $timeAt = $event->sender->{$attribute};
            if( !empty($timeAt) ){
                $time = explode($this->delimiter, $timeAt);
                if( $this->format === 'int' ){
                    $startAt = strtotime($time[0]);
                    $endAt = strtotime($time[1]);
                }else{
                    $startAt = $time[0];
                    $endAt = $time[1];
                }
                $event->query->andFilterWhere(['>=',$attribute, $startAt]);
                $event->query->andFilterWhere(['<=',$attribute, $endAt]);
            }
        }
    }
}