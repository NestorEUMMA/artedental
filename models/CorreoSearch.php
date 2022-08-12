<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Correo;

/**
 * CorreoSearch represents the model behind the search form of `app\models\Correo`.
 */
class CorreoSearch extends Correo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdCorreo'], 'integer'],
            [['Host', 'Username', 'Password', 'Port', 'SetFrom', 'SetFromName', 'AddAddress', 'AddAddressName', 'Addcc', 'Titulo', 'Cuerpo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Correo::find();

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
            'IdCorreo' => $this->IdCorreo,
        ]);

        $query->andFilterWhere(['like', 'Host', $this->Host])
            ->andFilterWhere(['like', 'Username', $this->Username])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'Port', $this->Port])
            ->andFilterWhere(['like', 'SetFrom', $this->SetFrom])
            ->andFilterWhere(['like', 'SetFromName', $this->SetFromName])
            ->andFilterWhere(['like', 'AddAddress', $this->AddAddress])
            ->andFilterWhere(['like', 'AddAddressName', $this->AddAddressName])
            ->andFilterWhere(['like', 'Addcc', $this->Addcc])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Cuerpo', $this->Cuerpo]);

        return $dataProvider;
    }
}
