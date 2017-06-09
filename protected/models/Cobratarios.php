<?php

/**
 * This is the model class for table "cobratarios".
 *
 * The followings are the available columns in table 'cobratarios':
 * @property integer $ID_COBRATARIO
 * @property string $NOMBRE
 * @property string $DIRECCION
 * @property string $TELEFONO
 * @property string $CELULAR
 * @property string $FECHA_INGRESO
 * @property double $SUELDO
 *
 * The followings are the available model relations:
 * @property Rutas[] $rutases
 */
class Cobratarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cobratarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SUELDO', 'numerical'),
			array('NOMBRE, DIRECCION', 'length', 'max'=>80),
			array('TELEFONO, CELULAR', 'length', 'max'=>20),
			array('FECHA_INGRESO', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_COBRATARIO, NOMBRE, DIRECCION, TELEFONO, CELULAR, FECHA_INGRESO, SUELDO', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'rutases' => array(self::HAS_MANY, 'Rutas', 'ID_COBRATARIO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_COBRATARIO' => 'Id Cobratario',
			'NOMBRE' => 'Nombre',
			'DIRECCION' => 'Direccion',
			'TELEFONO' => 'Telefono',
			'CELULAR' => 'Celular',
			'FECHA_INGRESO' => 'Fecha Ingreso',
			'SUELDO' => 'Sueldo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_COBRATARIO',$this->ID_COBRATARIO);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('DIRECCION',$this->DIRECCION,true);
		$criteria->compare('TELEFONO',$this->TELEFONO,true);
		$criteria->compare('CELULAR',$this->CELULAR,true);
		$criteria->compare('FECHA_INGRESO',$this->FECHA_INGRESO,true);
		$criteria->compare('SUELDO',$this->SUELDO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cobratarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
