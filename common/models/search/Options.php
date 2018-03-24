<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\Options as OptionsModel;
use common\components\events\SearchEvent;

/**
 * Options represents the model behind the search form of `common\models\data\Options`.
 */
class Options extends OptionsModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'input_type', 'autoload', 'sort'], 'integer'],
            [['name', 'value', 'tips'], 'safe'],
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
        $query = OptionsModel::find();

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
            'type' => $this->type,
            'input_type' => $this->input_type,
            'autoload' => $this->autoload,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'tips', $this->tips]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
