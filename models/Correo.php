<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "correo".
 *
 * @property int $IdCorreo
 * @property string $Host
 * @property string $Username
 * @property string $Password
 * @property string $Port
 * @property string $SetFrom
 * @property string $SetFromName
 * @property string $AddAddress
 * @property string $AddAddressName
 * @property string $Addcc
 * @property string $Titulo
 * @property string $Cuerpo
 */
class Correo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Host', 'Username', 'Password', 'Port', 'SetFrom', 'SetFromName', 'AddAddress', 'AddAddressName', 'Addcc'], 'string', 'max' => 45],
            [['Titulo'], 'string', 'max' => 100],
            [['Cuerpo'], 'string', 'max' => 600],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdCorreo' => 'Id Correo',
            'Host' => 'Host',
            'Username' => 'Username',
            'Password' => 'Password',
            'Port' => 'Port',
            'SetFrom' => 'Set From',
            'SetFromName' => 'Set From Name',
            'AddAddress' => 'Add Address',
            'AddAddressName' => 'Add Address Name',
            'Addcc' => 'Addcc',
            'Titulo' => 'Titulo',
            'Cuerpo' => 'Cuerpo',
        ];
    }
}
