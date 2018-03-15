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


    public function attributes()
    {
        return array_merge(parent::attributes(),['user.name','cate.name']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'cate_id', 'sort', 'content_id', 'remain', 'auth', 'commit', 'view', 'collection', 'thumbup', 'publish', 'status', 'add_time', 'edit_time', 'level', 'score'], 'integer'],
            [['title', 'author', 'cover', 'abstract', 'tag','cate.name','user.name'], 'safe'],
            [['add_time','edit_time',],'string'],
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
            'a.user_id' => $this->user_id,
            'a.cate_id' => $this->cate_id,
            'a.sort' => $this->sort,
            'a.content_id' => $this->content_id,
            'a.remain' => $this->remain,
            'a.auth' => $this->auth,
            'a.commit' => $this->commit,
            'a.view' => $this->view,
            'a.collection' => $this->collection,
            'a.thumbup' => $this->thumbup,
            'a.publish' => $this->publish,
            'a.status' => $this->status,
            'a.add_time' => $this->add_time,
            'a.edit_time' => $this->edit_time,
            'a.level' => $this->level,
            'a.score' => $this->score,
        ]);

        $query->andFilterWhere(['like', 'a.title', $this->title])
            ->andFilterWhere(['like', 'a.author', $this->author])
            ->andFilterWhere(['like', 'a.cover', $this->cover])
            ->andFilterWhere(['like', 'a.abstract', $this->abstract])
            ->andFilterWhere(['like', 'a.tag', $this->tag])
            ->with('user')->with('cate');
        $query->join('INNER JOIN',\common\models\data\ArticleCate::tableName().' c','c.id = a.cate_id');
        $query->andFilterWhere(['like','c.name',$this->getAttribute('user.name')]);
        $query->join('LEFT JOIN',\common\models\data\User::tableName().' u','u.id = a.user_id');
        $query->andFilterWhere(['like','u.name',$this->getAttribute('cate.name')]);

        $dataProvider->sort->attributes['user.name'] =
            [
                'asc'=>['a.user_id'=>SORT_ASC],
                'desc'=>['a.user_id'=>SORT_DESC],
            ];
        $dataProvider->sort->attributes['cate.name'] =
            [
                'asc'=>['a.cate_id'=>SORT_ASC],
                'desc'=>['a.cate_id'=>SORT_DESC],
            ];
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
