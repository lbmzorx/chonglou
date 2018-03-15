<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\ArticleCommit;
use common\components\events\SearchEvent;

/**
 * Commit represents the model behind the search form of `common\models\data\ArticleCommit`.
 */
class Commit extends ArticleCommit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'article_id', 'user_id', 'commit_id', 'status', 'add_time'], 'integer'],
            [['content'], 'safe'],
            [['add_time'],'string'],
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
        $query = ArticleCommit::find();

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
            'article_id' => $this->article_id,
            'user_id' => $this->user_id,
            'commit_id' => $this->commit_id,
            'status' => $this->status,
            'add_time' => $this->add_time,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
