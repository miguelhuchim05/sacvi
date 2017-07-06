<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $ID_USUARIO
 * @property string $FULL_NAME
 * @property string $USER_NAME
 * @property string $PASSWORD_
 * @property string $DIRECCION
 * @property string $CELULAR
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('USER_NAME,PASSWORD_', 'required'),
			array('ID_USUARIO', 'numerical', 'integerOnly'=>true),
			array('FULL_NAME, DIRECCION', 'length', 'max'=>80),
			array('USER_NAME', 'length', 'max'=>15),
			array('PASSWORD_', 'length', 'max'=>32),
			array('CELULAR', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_USUARIO, FULL_NAME, USER_NAME, PASSWORD_, DIRECCION, CELULAR', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_USUARIO' => 'Id Usuario',
			'FULL_NAME' => 'Full Name',
			'USER_NAME' => 'User Name',
			'PASSWORD_' => 'Password',
			'DIRECCION' => 'Direccion',
			'CELULAR' => 'Celular',
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

		$criteria->compare('ID_USUARIO',$this->ID_USUARIO);
		$criteria->compare('FULL_NAME',$this->FULL_NAME,true);
		$criteria->compare('USER_NAME',$this->USER_NAME,true);
		$criteria->compare('PASSWORD_',$this->PASSWORD_,true);
		$criteria->compare('DIRECCION',$this->DIRECCION,true);
		$criteria->compare('CELULAR',$this->CELULAR,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	//verificación de md5
	public function validatePassword($password){
		return $this->hashPassword($password)===$this->PASSWORD_;
	}
	public function hashPassword($password){
		return md5($password);
	}
}
