<?php

/**
 * This is the model class for table "hd_compras".
 *
 * The followings are the available columns in table 'hd_compras':
 * @property integer $ID_COMPRA
 * @property integer $ID_PROVEEDOR
 * @property string $NO_FACTURA
 * @property integer $PLAZO_LIQUIDACION
 * @property string $FECHA
 * @property double $IMPORTE
 * @property double $SALDO
 * @property string $ESTATUS_PAGO
 * @property string $APLICADA
 *
 * The followings are the available model relations:
 * @property AbonosCompras[] $abonosComprases
 * @property DtCompras[] $dtComprases
 * @property Proveedores $iDPROVEEDOR
 */
class HdCompras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hd_compras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_PROVEEDOR, PLAZO_LIQUIDACION', 'numerical', 'integerOnly'=>true),
			array('IMPORTE, SALDO', 'numerical'),
			array('NO_FACTURA, ESTATUS_PAGO', 'length', 'max'=>25),
			array('APLICADA', 'length', 'max'=>1),
			array('FECHA', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_COMPRA, ID_PROVEEDOR, NO_FACTURA, PLAZO_LIQUIDACION, FECHA, IMPORTE, SALDO, ESTATUS_PAGO, APLICADA', 'safe', 'on'=>'search'),
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
			'abonosComprases' => array(self::HAS_MANY, 'AbonosCompras', 'ID_COMPRA'),
			'dtComprases' => array(self::HAS_MANY, 'DtCompras', 'ID_COMPRA'),
			'iDPROVEEDOR' => array(self::BELONGS_TO, 'Proveedores', 'ID_PROVEEDOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_COMPRA' => 'Id Compra',
			'ID_PROVEEDOR' => 'Id Proveedor',
			'NO_FACTURA' => 'No Factura',
			'PLAZO_LIQUIDACION' => 'Plazo Liquidacion',
			'FECHA' => 'Fecha',
			'IMPORTE' => 'Importe',
			'SALDO' => 'Saldo',
			'ESTATUS_PAGO' => 'Estatus Pago',
			'APLICADA' => 'Aplicada',
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

		$criteria->compare('ID_COMPRA',$this->ID_COMPRA);
		$criteria->compare('ID_PROVEEDOR',$this->ID_PROVEEDOR);
		$criteria->compare('NO_FACTURA',$this->NO_FACTURA,true);
		$criteria->compare('PLAZO_LIQUIDACION',$this->PLAZO_LIQUIDACION);
		$criteria->compare('FECHA',$this->FECHA,true);
		$criteria->compare('IMPORTE',$this->IMPORTE);
		$criteria->compare('SALDO',$this->SALDO);
		$criteria->compare('ESTATUS_PAGO',$this->ESTATUS_PAGO,true);
		$criteria->compare('APLICADA',$this->APLICADA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HdCompras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
