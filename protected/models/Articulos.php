<?php

/**
 * This is the model class for table "articulos".
 *
 * The followings are the available columns in table 'articulos':
 * @property integer $ID_ARTICULO
 * @property string $DESCRIPCION
 * @property string $MODELO
 * @property string $MARCA
 * @property string $COLOR
 * @property double $PR_COSTO
 * @property double $PORCENT_UTILIDAD
 * @property double $PR_VENTA
 *
 * The followings are the available model relations:
 * @property DtVentas[] $dtVentases
 */
class Articulos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articulos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PORCENT_UTILIDAD', 'required'),
			array('PR_COSTO, PORCENT_UTILIDAD, PR_VENTA', 'numerical'),
			array('DESCRIPCION', 'length', 'max'=>80),
			array('MODELO, MARCA', 'length', 'max'=>25),
			array('COLOR', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ARTICULO, DESCRIPCION, MODELO, MARCA, COLOR, PR_COSTO, PORCENT_UTILIDAD, PR_VENTA', 'safe', 'on'=>'search'),
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
			'dtVentases' => array(self::HAS_MANY, 'DtVentas', 'ID_ARTICULO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ARTICULO' => 'Id Articulo',
			'DESCRIPCION' => 'Descripcion',
			'MODELO' => 'Modelo',
			'MARCA' => 'Marca',
			'COLOR' => 'Color',
			'PR_COSTO' => 'Pr Costo',
			'PORCENT_UTILIDAD' => 'Porcent Utilidad',
			'PR_VENTA' => 'Pr Venta',
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

		$criteria->compare('ID_ARTICULO',$this->ID_ARTICULO);
		$criteria->compare('DESCRIPCION',$this->DESCRIPCION,true);
		$criteria->compare('MODELO',$this->MODELO,true);
		$criteria->compare('MARCA',$this->MARCA,true);
		$criteria->compare('COLOR',$this->COLOR,true);
		$criteria->compare('PR_COSTO',$this->PR_COSTO);
		$criteria->compare('PORCENT_UTILIDAD',$this->PORCENT_UTILIDAD);
		$criteria->compare('PR_VENTA',$this->PR_VENTA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articulos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
