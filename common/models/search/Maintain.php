<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\Maintain as MaintainModel;
use common\components\events\SearchEvent;

/**
 * Maintain represents the model behind the search form of `common\models\data\Maintain`.
 */
class Maintain extends MaintainModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'options_id', 'show_type','sort', 'add_time', 'edit_time','status'], 'integer'],
            [['name', 'value', 'sign', 'url', 'info'], 'safe'],
            [['add_time','edit_time'],'string'],
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
        $query = MaintainModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'sort' => SORT_ASC,
                    'id' => SORT_DESC,
                ]
            ]
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
            'options_id' => $this->options_id,
            'status' => $this->status,
            'show_type' => $this->show_type,
            'add_time' => $this->add_time,
            'edit_time' => $this->edit_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'sign', $this->sign])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'info', $this->info]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
