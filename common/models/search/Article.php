<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\Article as ArticleModel;
use common\components\events\SearchEvent;

/**
 * Article represents the model behind the search form of `common\models\data\Article`.
 */
class Article extends ArticleModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'cate_id', 'sort', 'content_id', 'remain', 'auth', 'commit', 'view', 'collection', 'thumbup', 'publish', 'status', 'add_time', 'edit_time', 'level', 'score'], 'integer'],
            [['title', 'author', 'cover', 'abstract', 'tag_id'], 'safe'],
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
        $query = ArticleModel::find();

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
            'user_id' => $this->user_id,
            'cate_id' => $this->cate_id,
            'sort' => $this->sort,
            'content_id' => $this->content_id,
            'remain' => $this->remain,
            'auth' => $this->auth,
            'commit' => $this->commit,
            'view' => $this->view,
            'collection' => $this->collection,
            'thumbup' => $this->thumbup,
            'publish' => $this->publish,
            'status' => $this->status,
            'add_time' => $this->add_time,
            'edit_time' => $this->edit_time,
            'level' => $this->level,
            'score' => $this->score,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'abstract', $this->abstract])
            ->andFilterWhere(['like', 'tag_id', $this->tag_id]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
