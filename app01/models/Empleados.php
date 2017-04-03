<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app01.empleados".
 *
 * @property integer $empleado_id
 * @property string $nombre
 * @property string $apellido
 * @property integer $departamento_id
 *
 * @property App01Departamento $departamento
 */
class Empleados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app01.empleados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departamento_id'], 'required'],
            [['departamento_id'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 80],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['departamento_id' => 'departamento_id']],
            [['nombre', 'apellido'], 'capitalizedName']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'empleado_id' => 'Empleado ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'departamento_id' => 'Departamento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['departamento_id' => 'departamento_id']);
    }

    /**
     * @inheritdoc
     * @return EmpleadosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpleadosQuery(get_called_class());
    }

    public function capitalizedName($atribute, $params) {
        $pattern = '/^[A-Z][a-z]+(\s[A-Z][a-z]+)*$/';
        if (!preg_match($pattern, $this->$atribute)) {
            $this->addError($atribute, 'This value should be capitalized');
        }
    }

}
