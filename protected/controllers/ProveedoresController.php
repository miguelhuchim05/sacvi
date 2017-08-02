<?php

class ProveedoresController extends Controller
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
'actions'=>array('create','update', 'reports'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
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

public function actionReports(){
	if(isset($_GET['gen'])){
		$dataProvider = new CActiveDataProvider('Proveedores',array(
			'pagination' => false,
			'sort' => false,
			));

		$mPDF1 = Yii::app()->ePdf->mpdf('utf-8','LETTER','','',15,15,25,12,5,7);
		$mPDF1->SetHTMLHeader('
			<table width="100%" style="border-bottom: 1px solid #000000;vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: normal;"><tr>
			<td width="33%">
				<figure><img class="logo" src="'.Yii::app()->basePath.'/../img/logo_pdf.jpg" alt=""></figure>
			</td>
			<td width="33%" align="center" style="font-weight: bold; font-style: normal;">
			<h2>ELECTROHOGAR DINORA</h2>
			<h3>Proveedores</h3>
			</td>
			<td width="33%" style="text-align: right; ">'.date('d/M/Y').'</td>
			</tr></table>');	
		$mPDF1->SetHTMLFooter('
			<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;"><tr>
			<td width="33%"></td>
			<td width="33%" align="center" style="font-weight: bold; font-style: italic;"></td>
			<td width="33%" style="text-align: right; ">Pág. {PAGENO}/{nbpg}</td>
			</tr></table>');
		$mPDF1->packTableData = true;
		$mPDF1->WriteHTML($this->renderPartial('pdf', array('model' => $dataProvider), true));
		$mPDF1->Output('Proveedores.pdf','I');
	}
	$this->render('reportes');
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Proveedores;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Proveedores']))
{
$model->attributes=$_POST['Proveedores'];
if($model->save())
$this->redirect(array('view','id'=>$model->ID_PROVEEDOR));
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

if(isset($_POST['Proveedores']))
{
$model->attributes=$_POST['Proveedores'];
if($model->save())
$this->redirect(array('view','id'=>$model->ID_PROVEEDOR));
}

$this->render('update',array(
'model'=>$model,
));
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
$dataProvider=new CActiveDataProvider('Proveedores');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Proveedores('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Proveedores']))
$model->attributes=$_GET['Proveedores'];

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
$model=Proveedores::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='proveedores-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
