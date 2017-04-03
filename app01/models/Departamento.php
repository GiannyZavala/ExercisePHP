<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app01.departamento".
 *
 * @property integer $departamento_id
 * @property string $nombre_departamento
 *
 * @property App01Empleados[] $app01Empleados
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app01.departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_departamento'], 'required'],
            [['nombre_departamento'], 'string', 'max' => 100],
            [['nombre_departamento'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departamento_id' => 'Departamento ID',
            'nombre_departamento' => 'Nombre Departamento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApp01Empleados()
    {
        return $this->hasMany(App01Empleados::className(), ['departamento_id' => 'departamento_id']);
    }

    /**
     * @inheritdoc
     * @return DepartamentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartamentoQuery(get_called_class());
    }
}
