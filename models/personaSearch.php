<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\persona;

/**
 * personaSearch represents the model behind the search form about `app\models\persona`.
 */
class personaSearch extends persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedulaPersona', 'edad', 'TipoIdentificacion_idTipoIdentificacion', 'NivelInstruccion_idNivelInstruccion', 'EstadosCiviles_idEstadosCiviles', 'Cargo_idCargo', 'ConsejoComunal_idConsejoComunal', 'Persona_cedulaPersona'], 'integer'],
            [['primerNombre', 'segundoNombre', 'primerApellido', 'segundoApelllido', 'fechaNacimiento', 'sexo', 'direccion', 'incapacidad', 'pensionado'], 'safe'],
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
        $query = persona::find();

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
            'cedulaPersona' => $this->cedulaPersona,
            'fechaNacimiento' => $this->fechaNacimiento,
            'edad' => $this->edad,
            'TipoIdentificacion_idTipoIdentificacion' => $this->TipoIdentificacion_idTipoIdentificacion,
            'NivelInstruccion_idNivelInstruccion' => $this->NivelInstruccion_idNivelInstruccion,
            'EstadosCiviles_idEstadosCiviles' => $this->EstadosCiviles_idEstadosCiviles,
            'Cargo_idCargo' => $this->Cargo_idCargo,
            'ConsejoComunal_idConsejoComunal' => $this->ConsejoComunal_idConsejoComunal,
            'Persona_cedulaPersona' => $this->Persona_cedulaPersona,
        ]);

        $query->andFilterWhere(['like', 'primerNombre', $this->primerNombre])
            ->andFilterWhere(['like', 'segundoNombre', $this->segundoNombre])
            ->andFilterWhere(['like', 'primerApellido', $this->primerApellido])
            ->andFilterWhere(['like', 'segundoApelllido', $this->segundoApelllido])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'incapacidad', $this->incapacidad])
            ->andFilterWhere(['like', 'pensionado', $this->pensionado]);

        return $dataProvider;
    }
}
