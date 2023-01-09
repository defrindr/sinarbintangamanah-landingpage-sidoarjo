<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BookingData;

/**
 * BookingDataSearch represents the model behind the search form about `app\models\BookingData`.
 * Modified By Defri Indras
 */
class BookingDataSearch extends BookingData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jumlah_penumpang'], 'integer'],
            [['type', 'jenis_layanan', 'tanggal_kedatangan', 'jam_kedatangan', 'nama_perusahaan', 'nama_penanggungjawab', 'nomor_penerbangan', 'nomor_telepon', 'email', 'creatad_at'], 'safe'],
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
        $query = BookingData::find();

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
            'jam_kedatangan' => $this->jam_kedatangan,
            'jumlah_penumpang' => $this->jumlah_penumpang,
        ]);

        // filter by date range
        if (!empty($this->tanggal_kedatangan)) {
            $date_explode = explode(" - ", $this->tanggal_kedatangan);
            $query->andFilterWhere(['between', 'tanggal_kedatangan', $date_explode[0], $date_explode[1]]);
        }

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'jenis_layanan', $this->jenis_layanan])
            ->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
            ->andFilterWhere(['like', 'nama_penanggungjawab', $this->nama_penanggungjawab])
            ->andFilterWhere(['like', 'nomor_penerbangan', $this->nomor_penerbangan])
            ->andFilterWhere(['like', 'nomor_telepon', $this->nomor_telepon])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
