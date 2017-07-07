<?php

class DtComprasController extends Controller
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
'actions'=>array('admin','delete', 'recordCU'),
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
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}
/**
* Creates or update a particular model.
*/
public function actionrecordCU(){
	header('Content-Type: application/json; charset="UTF-8"');
	$send = array();
	
	if(isset($_POST['DtCompras']) && $_POST['DtCompras']['ID_DTCOMPRAS']!=null){
		$model = $this->loadModel($_POST['DtCompras']['ID_DTCOMPRAS']);
		$model->attributes=$_POST['DtCompras'];
		$send[0] = "Actualizado";
	}else{
		$model=new DtCompras;
		if(isset($_POST['DtCompras'])){
			$model->attributes=$_POST['DtCompras'];
			$send[0] = "Creado";
		}
	}
	//respuesta 
	if($model->save()){
		$data = $this->getSumImporte($model->ID_COMPRA);
		if($this->updateCompra($model->ID_COMPRA, $data)){
			$send[1] = $data;
		}else{
			$send[1] = 'Error: saldo o importe no actualizado';
		}
		echo CJSON::encode($send);
	}
}
public function updateCompra($pk, $data){
	$model=$this->loadModelHdCompras($pk);
	$model->IMPORTE=$data;
	$model->SALDO=$data;
	if($model->save()){
		return true;
	}
	return false;
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new DtCompras;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DtCompras']))
{
$model->attributes=$_POST['DtCompras'];
if($model->save())
$this->redirect(array('view','id'=>$model->ID_DTCOMPRAS));
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
header('Content-Type: application/json; charset="UTF-8"');
echo CJSON::encode($model);
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
header('Content-Type: application/json; charset="UTF-8"');
$send = array();
// we only allow deletion via POST request
$articulo = $this->loadModel($id);
$articulo->delete();
$data = $this->getSumImporte($articulo->ID_COMPRA);
if($this->updateCompra($articulo->ID_COMPRA, $data)){
	$send[0] = $data;
}else{
	$send[0] = 'Error: saldo o importe no actualizado';
}
echo CJSON::encode($send);
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
$dataProvider=new CActiveDataProvider('DtCompras');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new DtCompras('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['DtCompras']))
$model->attributes=$_GET['DtCompras'];

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
$model=DtCompras::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}
public function loadModelHdCompras($id)
{
$model = HdCompras::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}
/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='dt-compras-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
//operaciones matematicas by Miguel
protected function getSumImporte($id){
	$criteria = new CDbCriteria;
	$criteria->select = array('round(sum(IMPORTE),2) AS IMPORTE');
	$criteria->condition= 'ID_COMPRA = :total';
	$criteria->params=(array(':total'=>$id));

	$model=DtCompras::model()->findAll($criteria);
	if($model===null)
	throw new CHttpException(404,'The requested page does not exist.');
	return $model[0]->IMPORTE;
}
}//end class