<?php

/**
 * This is the model class for table "rutas".
 *
 * The followings are the available columns in table 'rutas':
 * @property integer $ID_RUTA
 * @property string $NOMBRE
 * @property integer $ID_COBRATARIO
 *
 * The followings are the available model relations:
 * @property HdVentas[] $hdVentases
 * @property Cobratarios $iDCOBRATARIO
 */
class Rutas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rutas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_COBRATARIO', 'numerical', 'integerOnly'=>true),
			array('NOMBRE', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_RUTA, NOMBRE, ID_COBRATARIO', 'safe', 'on'=>'search'),
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
			'hdVentases' => array(self::HAS_MANY, 'HdVentas', 'ID_RUTA'),
			'iDCOBRATARIO' => array(self::BELONGS_TO, 'Cobratarios', 'ID_COBRATARIO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_RUTA' => 'Id Ruta',
			'NOMBRE' => 'Nombre de ruta',
			'ID_COBRATARIO' => 'Cobratario',
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

		$criteria->compare('ID_RUTA',$this->ID_RUTA);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);
		$criteria->compare('ID_COBRATARIO',$this->ID_COBRATARIO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rutas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
