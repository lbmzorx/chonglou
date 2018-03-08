<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\ArticleCate;
use common\components\events\SearchEvent;

/**
 * AritcleCate represents the model behind the search form of `common\models\data\ArticleCate`.
 */
class AritcleCate extends ArticleCate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'level', 'status', 'add_time', 'edit_time'], 'integer'],
            [['name', 'path'], 'safe'],
        ];
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
        $query = ArticleCate::find();

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
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'level' => $this->level,
            'status' => $this->status,
            'add_time' => $this->add_time,
            'edit_time' => $this->edit_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'path', $this->path]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
