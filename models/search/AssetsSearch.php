<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Assets;

/**
 * AssetsSearch represents the model behind the search form about `app\models\Assets`.
 * Modified By Defri Indras
 */
class AssetsSearch extends Assets{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['page', 'positiion', 'uri'], 'safe'],
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
        $query = Assets::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'page', $this->page])
            ->andFilterWhere(['like', 'positiion', $this->positiion])
            ->andFilterWhere(['like', 'uri', $this->uri]);

        return $dataProvider;
    }
}