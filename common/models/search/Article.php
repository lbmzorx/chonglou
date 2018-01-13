<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\Article as ArticleModel;

/**
 * Article represents the model behind the search form about `common\models\data\Article`.
 */
class Article extends ArticleModel
{

    public $add_time_start;
    public $add_time_end;
    public $edit_time_start;
    public $edit_time_end;

    /**
     * @inheritdoc
     */
    public function rules()
    {

        $unsetRules=['add_time','edit_time'];
        $parent_rules=$this->unsetRules(parent::rules(),$unsetRules);

        $rules=[
            [['id',],'integer'],
            [['cateName',],'string',],
            [['cateName',],'safe',],
            [['add_time','edit_time'],'string',],
        ];
        return array_merge($rules,$parent_rules);
    }

    /**
     * 清楚某个属性的规则
     * @param array $rules
     * @param array $unsetArr
     * @return array
     */
    protected function unsetRules(array $rules, array $unsetArr){
        foreach ($rules as $k=>$rule){
            $inArr=is_array($rule[0]) && array_intersect($unsetArr,$rule[0]);
            $inString=is_string($rule[0]) && in_array($rule[0],$unsetArr);
            if($inArr || $inString){
                unset($rules[$k]);
            }
        }
        return $rules;
    }

    public function attributes()
    {
        return array_merge(parent::attributes(),['cateName']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArticleModel::find()->alias('a');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'a.id' => $this->id,
            'a.add_admin_id' => $this->add_admin_id,
            'a.remain' => $this->remain,
            'a.publish' => $this->publish,
            'a.status' => $this->status,
        ]);
        $query->join('INNER JOIN',\common\models\data\ArticleCate::tableName().' c','c.id = a.cate_id');
        $query->andFilterWhere(['like','c.name',$this->cateName]);

        $query->andFilterWhere(['like', 'a.title', $this->title])
            ->andFilterWhere(['like', 'a.author', $this->author])
            ->andFilterWhere(['like', 'a.abstract', $this->abstract])
            ->andFilterWhere(['like', 'a.tags', $this->tags])
            ->andFilterWhere(['like', 'a.content', $this->content])
            ->andFilterWhere(['>=','a.add_time',$this->add_time_start])
            ->andFilterWhere(['<=','a.add_time',$this->add_time_end])
            ->andFilterWhere(['>=','a.edit_time',$this->edit_time_start])
            ->andFilterWhere(['<=','a.edit_time',$this->edit_time_end]);
        $dataProvider->sort->attributes['cateName'] =
            [
                'asc'=>['a.cate_id'=>SORT_ASC],
                'desc'=>['a.cate_id'=>SORT_DESC],
            ];

        return $dataProvider;
    }

    public function afterValidate()
    {
        parent::afterValidate(); // TODO: Change the autogenerated stub
        $this->setTimeRange();
    }

    public function setTimeRange(){
        $times=['add_time'=>$this->add_time,'edit_time'=>$this->edit_time];

        $return=[];
        foreach ($times as $ktime=>$time){
            $ranges=explode('~',$time);
            foreach ($ranges as $range){
                if(strtotime($range)){
                    $return[$ktime]=strtotime($range);
                }
            }
        }

        $this->add_time_start   =empty($range['add_time'][0])?null:$range['add_time'][0];
        $this->add_time_end     =empty($range['add_time'][1])?null:$range['add_time'][1];
        $this->edit_time_start  =empty($range['edit_time'][0])?null:$range['edit_time'][0];
        $this->edit_time_end    =empty($range['edit_time'][1])?null:$range['edit_time'][1];
    }

}
