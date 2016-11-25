<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * BuscarConsejoForm is the model behind the contact form.
 */
class BuscarConsejoForm extends Model
{
    public $estado ='';
    public $municipio ='';
    public $parroquia ='';
    public $buscar = '';


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            /*
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
            */
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'estado' => 'Estado',
            'municipio' => 'Municipio',
            'parroquia' => 'Parroquia',
            'buscar' => 'Por nombre',
        ];
    }

}
