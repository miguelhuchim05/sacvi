<?php

/**
 * This is the model class for table "dt_compras".
 *
 * The followings are the available columns in table 'dt_compras':
 * @property integer $ID_DTCOMPRAS
 * @property integer $ID_COMPRA
 * @property integer $ID_ARTICULO
 * @property integer $CANTIDAD
 * @property double $PR_COSTO
 * @property double $IMPORTE
 *
 * The followings are the available model relations:
 * @property HdCompras $iDCOMPRA
 * @property Articulos $iDARTICULO
 */
class DtCompras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dt_compras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_COMPRA, ID_ARTICULO', 'required'),
			array('ID_COMPRA, ID_ARTICULO, CANTIDAD', 'numerical', 'integerOnly'=>true),
			array('PR_COSTO, IMPORTE', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_DTCOMPRAS, ID_COMPRA, ID_ARTICULO, CANTIDAD, PR_COSTO, IMPORTE', 'safe', 'on'=>'search'),
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
			'iDCOMPRA' => array(self::BELONGS_TO, 'HdCompras', 'ID_COMPRA'),
			'iDARTICULO' => array(self::BELONGS_TO, 'Articulos', 'ID_ARTICULO'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_DTCOMPRAS' => 'Id Dtcompras',
			'ID_COMPRA' => 'Id Compra',
			'ID_ARTICULO' => 'Id Articulo',
			'CANTIDAD' => 'Cantidad',
			'PR_COSTO' => 'Pr Costo',
			'IMPORTE' => 'Importe',
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

		$criteria->compare('ID_DTCOMPRAS',$this->ID_DTCOMPRAS);
		$criteria->compare('ID_COMPRA',$this->ID_COMPRA);
		$criteria->compare('ID_ARTICULO',$this->ID_ARTICULO);
		$criteria->compare('CANTIDAD',$this->CANTIDAD);
		$criteria->compare('PR_COSTO',$this->PR_COSTO);
		$criteria->compare('IMPORTE',$this->IMPORTE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DtCompras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
