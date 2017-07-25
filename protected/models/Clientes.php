<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $ID_CLIENTE
 * @property integer $ID_BARRIO
 * @property integer $ID_LOCALIDAD
 * @property string $NOMBRE
 * @property string $DIRECCION
 * @property string $FECHA_CREACION
 * @property double $SALDO
 * @property double $EFECTIVIDAD
 *
 * The followings are the available model relations:
 * @property Barrios $iDBARRIO
 * @property Barrios $iDLOCALIDAD
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE, ID_BARRIO, ID_LOCALIDAD, DIRECCION', 'required'),
			array('SALDO, EFECTIVIDAD', 'numerical'),
			array('NOMBRE, DIRECCION', 'length', 'max'=>80),
			array('FECHA_CREACION','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			array('FECHA_CREACION', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_CLIENTE, ID_BARRIO, ID_LOCALIDAD, NOMBRE, DIRECCION, FECHA_CREACION, SALDO, EFECTIVIDAD', 'safe', 'on'=>'search'),
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
			'iDBARRIO' => array(self::BELONGS_TO, 'Barrios', 'ID_BARRIO'),
			'iDLOCALIDAD' => array(self::BELONGS_TO, 'Barrios', 'ID_LOCALIDAD'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CLIENTE' => '#',
			'ID_BARRIO' => 'Barrio',
			'ID_LOCALIDAD' => 'Localidad',
			'NOMBRE' => 'Nombre',
			'DIRECCION' => 'Direccion',
			'FECHA_CREACION' => 'Fecha de creacion',
			'SALDO' => 'Saldo',
			'EFECTIVIDAD' => 'Efectividad',
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

		$criteria->order= 'ID_CLIENTE DESC';
		$criteria->compare('ID_CLIENTE',$this->ID_CLIENTE);
		$criteria->compare('ID_BARRIO',$this->ID_BARRIO);
		$criteria->compare('ID_LOCALIDAD',$this->ID_LOCALIDAD);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('DIRECCION',$this->DIRECCION,true);
		$criteria->compare('FECHA_CREACION',$this->FECHA_CREACION,true);
		$criteria->compare('SALDO',$this->SALDO);
		$criteria->compare('EFECTIVIDAD',$this->EFECTIVIDAD);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
