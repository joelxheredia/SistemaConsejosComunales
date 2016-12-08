<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solicitudes;

/**
 * SolicitudesSearch represents the model behind the search form about `app\models\Solicitudes`.
 */
class SolicitudesSearch extends Solicitudes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSolicitudes', 'Persona_cedulaPersona', 'ConsejoComunal_idConsejoComunal', 'TipoSolicitud_idTipoSolicitud'], 'integer'],
            [['fechaRealizacion', 'codReferecia'], 'safe'],
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
        $query = Solicitudes::find();

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
            'idSolicitudes' => $this->idSolicitudes,
            'fechaRealizacion' => $this->fechaRealizacion,
            'Persona_cedulaPersona' => $this->Persona_cedulaPersona,
            'ConsejoComunal_idConsejoComunal' => $this->ConsejoComunal_idConsejoComunal,
            'TipoSolicitud_idTipoSolicitud' => $this->TipoSolicitud_idTipoSolicitud,
        ]);

        $query->andFilterWhere(['like', 'codReferecia', $this->codReferecia]);

        return $dataProvider;
    }
}
