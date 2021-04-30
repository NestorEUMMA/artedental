<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $IdEmpresa
 * @property string $NombreEmpresa
 * @property string $NombreJuridico
 * @property string $Direccion
 * @property string $Telefono
 * @property string $Nit
 * @property string $Ruc
 * @property string $RepresentanteLegal
 * @property string $DuiRepresentante
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreEmpresa', 'NombreJuridico', 'Direccion', 'Telefono', 'Nit', 'Ruc', 'RepresentanteLegal', 'DuiRepresentante'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdEmpresa' => 'Id Empresa',
            'NombreEmpresa' => 'Nombre Empresa',
            'NombreJuridico' => 'Nombre Juridico',
            'Direccion' => 'Direccion',
            'Telefono' => 'Telefono',
            'Nit' => 'Nit',
            'Ruc' => 'Ruc',
            'RepresentanteLegal' => 'Representante Legal',
            'DuiRepresentante' => 'Dui Representante',
        ];
    }
}
