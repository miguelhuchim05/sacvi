<?php

class BarriosController extends Controller
{
	public $layout='//layouts/column2';
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Barrios');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actionView($id,$id_)
	{
	$this->render('view',array(
	'model'=>$this->loadModel($id,$id_),
	));
	}
	public function actionCreate($id){
		$model = new Barrios();
		$localidad = $this->loadLocalidad($id);

		if(isset($_POST['Barrios']))
		{
		$model->attributes=$_POST['Barrios'];		
		if($model->save())			
		$this->redirect(array('view','id'=>$model->ID_BARRIO,'id_'=>$model->ID_LOCALIDAD));
		}

		$this->render('create',array(
			'model' => $model,
			'localidad' => $localidad,
			));
	}
	public function actionDelete($id,$id_){
		if(Yii::app()->request->isPostRequest)
		{
		// we only allow deletion via POST request
		$this->loadModel($id,$id_)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	public function actionUpdate($id,$id_){
		$model=$this->loadModel($id,$id_);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Barrios']))
		{
		$model->attributes=$_POST['Barrios'];
		if($model->save())
		$this->redirect(array('view','id'=>$model->ID_BARRIO,'id_'=>$model->ID_LOCALIDAD));
		}

		$this->render('update',array(
		'model'=>$model,
		));
	}
	public function actionAdmin($id){
		$model=new Barrios('search');
		$model->unsetAttributes();  // clear any default values
		$model->ID_LOCALIDAD=$id;
		if(isset($_GET['Barrios']))
		$model->attributes=$_GET['Barrios'];
		
		$this->render('admin',array(
		'model'=>$model,
		));
	}
	//carga de datos a travez de model
	public function loadLocalidad($id)
	{
		$model=Localidades::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModel($pk_1,$pk_2)
	{
	$model=Barrios::model()->findByPk(
		array(
			'ID_BARRIO' => $pk_1,
			'ID_LOCALIDAD' => $pk_2,
			)
		);
	if($model===null)
	throw new CHttpException(404,'The requested page does not exist.');
	return $model;
	}
}