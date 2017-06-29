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
 * @property double $EXISTENCIAS
 * @property double $PR_COSTO
 * @property double $PR_CONTADO1
 * @property double $PR_CONTADO2
 * @property integer $NO_PAGOS
 * @property double $PAGO_INICIAL
 * @property double $ABONOS
 * @property double $PR_CREDITO
 * @property integer $NO_PAGOS2
 * @property double $PAGO_INICIAL2
 * @property double $ABONOS2
 * @property double $PR_CREDITO2
 * @property double $PR_CREDICONTADO
 *
 * The followings are the available model relations:
 * @property DtCompras[] $dtComprases
 * @property HdDevoluciones[] $hdDevoluciones
 * @property HdVentas[] $hdVentases
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
			array('ID_ARTICULO', 'required'),
			array('ID_ARTICULO, NO_PAGOS, NO_PAGOS2', 'numerical', 'integerOnly'=>true),
			array('EXISTENCIAS, PR_COSTO, PR_CONTADO1, PR_CONTADO2, PAGO_INICIAL, ABONOS, PR_CREDITO, PAGO_INICIAL2, ABONOS2, PR_CREDITO2, PR_CREDICONTADO', 'numerical'),
			array('DESCRIPCION', 'length', 'max'=>80),
			array('MODELO, MARCA', 'length', 'max'=>25),
			array('COLOR', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ARTICULO, DESCRIPCION, MODELO, MARCA, COLOR, EXISTENCIAS, PR_COSTO, PR_CONTADO1, PR_CONTADO2, NO_PAGOS, PAGO_INICIAL, ABONOS, PR_CREDITO, NO_PAGOS2, PAGO_INICIAL2, ABONOS2, PR_CREDITO2, PR_CREDICONTADO', 'safe', 'on'=>'search'),
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
			'dtComprases' => array(self::HAS_MANY, 'DtCompras', 'ID_ARTICULO'),
			'hdDevoluciones' => array(self::MANY_MANY, 'HdDevoluciones', 'dt_devoluciones(ID_ARTICULO, ID_DEVOLUCION)'),
			'hdVentases' => array(self::MANY_MANY, 'HdVentas', 'dt_ventas(ID_ARTICULO, ID_VENTA)'),
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
			'EXISTENCIAS' => 'Existencias',
			'PR_COSTO' => 'Pr Costo',
			'PR_CONTADO1' => 'Pr Contado1',
			'PR_CONTADO2' => 'Pr Contado2',
			'NO_PAGOS' => 'No Pagos',
			'PAGO_INICIAL' => 'Pago Inicial',
			'ABONOS' => 'Abonos',
			'PR_CREDITO' => 'Pr Credito',
			'NO_PAGOS2' => 'No Pagos2',
			'PAGO_INICIAL2' => 'Pago Inicial2',
			'ABONOS2' => 'Abonos2',
			'PR_CREDITO2' => 'Pr Credito2',
			'PR_CREDICONTADO' => 'Pr Credicontado',
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
		$criteria->compare('EXISTENCIAS',$this->EXISTENCIAS);
		$criteria->compare('PR_COSTO',$this->PR_COSTO);
		$criteria->compare('PR_CONTADO1',$this->PR_CONTADO1);
		$criteria->compare('PR_CONTADO2',$this->PR_CONTADO2);
		$criteria->compare('NO_PAGOS',$this->NO_PAGOS);
		$criteria->compare('PAGO_INICIAL',$this->PAGO_INICIAL);
		$criteria->compare('ABONOS',$this->ABONOS);
		$criteria->compare('PR_CREDITO',$this->PR_CREDITO);
		$criteria->compare('NO_PAGOS2',$this->NO_PAGOS2);
		$criteria->compare('PAGO_INICIAL2',$this->PAGO_INICIAL2);
		$criteria->compare('ABONOS2',$this->ABONOS2);
		$criteria->compare('PR_CREDITO2',$this->PR_CREDITO2);
		$criteria->compare('PR_CREDICONTADO',$this->PR_CREDICONTADO);

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
