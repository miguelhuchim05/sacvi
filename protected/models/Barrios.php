<?php

/**
 * This is the model class for table "barrios".
 *
 * The followings are the available columns in table 'barrios':
 * @property integer $ID_BARRIO
 * @property integer $ID_LOCALIDAD
 * @property string $NOMBRE
 *
 * The followings are the available model relations:
 * @property Localidades $iDLOCALIDAD
 * @property Clientes[] $clientes
 * @property Clientes[] $clientes1
 */
class Barrios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'barrios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_LOCALIDAD,NOMBRE', 'required'),
			array('ID_LOCALIDAD', 'numerical', 'integerOnly'=>true),
			array('NOMBRE', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_BARRIO, ID_LOCALIDAD, NOMBRE', 'safe', 'on'=>'search'),
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
			'iDLOCALIDAD' => array(self::BELONGS_TO, 'Localidades', 'ID_LOCALIDAD'),
			'clientes' => array(self::HAS_MANY, 'Clientes', 'ID_BARRIO'),
			'clientes1' => array(self::HAS_MANY, 'Clientes', 'ID_LOCALIDAD'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_BARRIO' => 'Id Barrio',
			'ID_LOCALIDAD' => 'Id Localidad',
			'NOMBRE' => 'Nombre',
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

		$criteria->compare('ID_BARRIO',$this->ID_BARRIO);
		$criteria->compare('ID_LOCALIDAD',$this->ID_LOCALIDAD);
		$criteria->compare('NOMBRE',$this->NOMBRE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Barrios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	//PK composite
	/*public function primaryKey()
	{
	        return array('ID_BARRIO', 'ID_LOCALIDAD');
	}*/
}
