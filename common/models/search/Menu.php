<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\Menu as MenuModel;
use common\components\events\SearchEvent;

/**
 * Menu represents the model behind the search form of `common\models\data\Menu`.
 */
class Menu extends MenuModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'app_type', 'position', 'parent_id', 'is_absolute_url', 'is_display', 'add_time', 'edit_time', 'top_id'], 'integer'],
            [['sign', 'name', 'url', 'icon', 'target'], 'safe'],
            [['sort'], 'number'],
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
        $query = MenuModel::find();

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
            'app_type' => $this->app_type,
            'position' => $this->position,
            'parent_id' => $this->parent_id,
            'sort' => $this->sort,
            'is_absolute_url' => $this->is_absolute_url,
            'is_display' => $this->is_display,
            'add_time' => $this->add_time,
            'edit_time' => $this->edit_time,
            'top_id' => $this->top_id,
        ]);

        $query->andFilterWhere(['like', 'sign', $this->sign])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'target', $this->target]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
