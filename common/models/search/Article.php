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
            [['add_time_start','add_time_end','edit_time_start','edit_time_end'],'integer',],
        ];
        return array_merge($rules,$parent_rules);
    }

    /**
     * 清楚某个属性的规则
     * @param array $rules
     * @param array $unsetAttrs
     * @return array
     */
    protected function unsetRules(array $rules, array $unsetAttrs){
        foreach ($rules as $k=>$rule){
            $inArr=is_array($rule[0]) && array_intersect($unsetAttrs,$rule[0]);
            $inString=is_string($rule[0]) && in_array($rule[0],$unsetAttrs);

            if( ($inArr&&count($rule[0])==1) || $inString){
                unset($rules[$k]);
            }
            if($inArr &&count($rule[0])>=1){

                foreach ($unsetAttrs as $unsetAttr){
                    if(!empty(array_flip($rule[0])[$unsetAttr])){
                        $key=array_flip($rule[0])[$unsetAttr];
                        unset($rules[$k][0][$key]);
                    }
                }
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
        $this->setTimeRange();
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
            ->andFilterWhere(['like', 'a.abstract',$this->abstract])
            ->andFilterWhere(['like', 'a.tags', $this->tags])
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

    public function setTimeRange(){
        $tmp=explode('~',$this->add_time);
        $this->add_time_start   =empty($tmp[0])?null:(strtotime($tmp[0])?:null);
        $this->add_time_end     =empty($tmp[1])?null:(strtotime($tmp[1])?:null);
        $tmp=explode('~',$this->edit_time);
        $this->edit_time_start  =empty($tmp[0])?null:(strtotime($tmp[0])?:null);
        $this->edit_time_end    =empty($tmp[1])?null:(strtotime($tmp[1])?:null);
    }

}
