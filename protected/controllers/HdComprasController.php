<?php

class HdComprasController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete', 'aplicar', 'abonos'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
//parte de modeldt
$model=new DtCompras();
$model->unsetAttributes();  // clear any default values
$model->ID_COMPRA = $id;
//fin parte modeldt
$this->render('view',array(
'model'=>$this->loadModel($id),
'modeldtFilter'=>$this->loadModelDt($id),
'modeldt'=>$model,
));
}
public function actionAbonos($id){
	$this->render('abonos',array(
		'model' => $this->loadModel($id),
		'modelacFilter'=>$this->loadModelAc($id),
		));
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new HdCompras;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['HdCompras']))
{
$model->attributes=$_POST['HdCompras'];
if($model->save())
$this->redirect(array('view','id'=>$model->ID_COMPRA));
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['HdCompras']))
{
$model->attributes=$_POST['HdCompras'];
if($model->save())
$this->redirect(array('view','id'=>$model->ID_COMPRA));
}

$this->render('update',array(
'model'=>$model,
));
}
public function actionAplicar(){
	if($_POST['pk']){
		$model=$this->loadModel($_POST['pk']);
		$model->APLICADA=$_POST['value'];
		if($model->update()){
			echo CJSON::encode(array('success' => true));
		}else{
			echo CJSON::encode(array('success' => false));
		}
	}
}
/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$criteria=new CDbCriteria;
$criteria->order= 'ID_COMPRA DESC';
$dataProvider=new CActiveDataProvider('HdCompras', array(
			'criteria'=>$criteria,
		));
$this->render('index',array(
'model'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new HdCompras('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['HdCompras']))
$model->attributes=$_GET['HdCompras'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=HdCompras::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}
public function loadModelDt($id)
{
$dataProvider = new CActiveDataProvider('DtCompras',array(
	'criteria' => array(
		'condition'=>'ID_COMPRA='.$id,
		)
	));
if($dataProvider===null){
	throw new CHttpException(404,'The requested page does not exist.');
}
return $dataProvider;
}
public function loadModelAC($id)
{
$dataProvider = new CActiveDataProvider('AbonosCompras',array(
	'criteria' => array(
		'condition'=>'ID_COMPRA='.$id,
		'order' => 'NO_ABONO ASC',
		)
	));
if($dataProvider===null){
	throw new CHttpException(404,'The requested page does not exist.');
}
return $dataProvider;
}
/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='hd-compras-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
