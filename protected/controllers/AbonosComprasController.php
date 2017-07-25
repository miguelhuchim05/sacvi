<?php

class AbonosComprasController extends Controller
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
'actions'=>array('admin','delete','aply'),
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
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate(){
	$n = $_POST['PLAZO_LIQUIDACION'];
	$fecha = $_POST['FECHA_RECEPCION'];
	$importe = empty($_POST['SALDO'])?0:$_POST['SALDO']/$n;
	try{
		$connection = Yii::app()->db;
		$transaction=$connection->beginTransaction();
		for ($i=1; $i <= $n; $i++) {
			$nuevafecha = strtotime ('next month' , strtotime($fecha));
			$nuevafecha = date ('Y-m-d',$nuevafecha);

			$sql = "insert into abonos_compras (ID_COMPRA, NO_ABONO, FECHA, IMPORTE) values(:ID_COMPRA, :NO_ABONO, :FECHA, :IMPORTE)";
			$command=$connection->createCommand($sql);
			$command->bindParam(":ID_COMPRA", $_POST['ID_COMPRA'],PDO::PARAM_STR);
			$command->bindParam(":NO_ABONO", $i,PDO::PARAM_STR);
			$command->bindParam(":FECHA", $nuevafecha,PDO::PARAM_STR);
			$command->bindParam(":IMPORTE", $importe,PDO::PARAM_STR);
			$command->execute();

			$fecha = $nuevafecha;
		}		
		$transaction->commit();
	}catch(Exception $e){
		$transaction->rollback();		
	}
}
//aplicar abono de factura
public function actionAply($id){
	if(Yii::app()->request->isPostRequest){
		/*aplicar 
		1. restar al saldo la cantidad enviada. primary key compra,.
		2. cambiar el estatus del abono a pagado. primary key abono 
		algoritmo 
		1. cargar abono (listo)
		2. cargar compra.
		3. actualizar saldo compra.
		4. actuaizar estatus de abono.*/
		$model = $this->loadModel($id);
		$compra = $this->loadModelHdC($model->ID_COMPRA);
		try{
			$connection = Yii::app()->db;
			$transaction=$connection->beginTransaction();			
			$command = $connection->createCommand();

			$nuevo_saldo = $compra->SALDO - $model->IMPORTE;			
			$command->update('hd_compras',
				array(
					'SALDO' => $nuevo_saldo,
					),
				'ID_COMPRA=:id', 
				array(':id' => $model->ID_COMPRA)
				);
			$command->update('abonos_compras',
				array(
					'STATUS' => 'PAGADA'
					),
				'ID_ABONO=:id', 
				array(':id' => $id)
				);
			if($nuevo_saldo==0){
				$command->update('hd_compras',
					array(
						'ESTATUS_PAGO' => 'PAGADA',
						),
					'ID_COMPRA=:id', 
					array(':id' => $model->ID_COMPRA)
					);
			}
			$transaction->commit();			
		}catch(Exception $e){
			$transaction->rollback();
			echo $e->getMessage();
		}
		$send = Yii::app()->db->createCommand()
		->select('SALDO')
		->from('hd_compras')		
		->where('ID_COMPRA=:id', array(':id'=>$model->ID_COMPRA))
		->queryRow();
		header('Content-Type: application/json; charset="UTF-8"');
		echo CJSON::encode($send);
	}	
}
public function actionCreate_original()
{
$model=new AbonosCompras;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['AbonosCompras']))
{
$model->attributes=$_POST['AbonosCompras'];
if($model->save())
$this->redirect(array('view','id'=>$model->ID_ABONO));
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

if(isset($_POST['AbonosCompras']))
{
$model->attributes=$_POST['AbonosCompras'];
if($model->save())
$this->redirect(array('view','id'=>$model->ID_ABONO));
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
$dataProvider=new CActiveDataProvider('AbonosCompras');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new AbonosCompras('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['AbonosCompras']))
$model->attributes=$_GET['AbonosCompras'];

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
$model=AbonosCompras::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}
public function loadModelHdC($id)
{
$model=HdCompras::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='abonos-compras-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
