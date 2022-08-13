<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form of `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdEmpresa'], 'integer'],
            [['NombreEmpresa', 'NombreJuridico', 'Direccion', 'Telefono', 'Nit', 'Ruc', 'RepresentanteLegal', 'DuiRepresentante'], 'safe'],
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
        $query = Empresa::find();

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
            'IdEmpresa' => $this->IdEmpresa,
        ]);

        $query->andFilterWhere(['like', 'NombreEmpresa', $this->NombreEmpresa])
            ->andFilterWhere(['like', 'NombreJuridico', $this->NombreJuridico])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Nit', $this->Nit])
            ->andFilterWhere(['like', 'Ruc', $this->Ruc])
            ->andFilterWhere(['like', 'RepresentanteLegal', $this->RepresentanteLegal])
            ->andFilterWhere(['like', 'DuiRepresentante', $this->DuiRepresentante]);

        return $dataProvider;
    }
}
