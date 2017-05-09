<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<!-- <h1>Login</h1> -->

<!-- <p>Please fill out the following form with your login credentials:</p> -->

<div class="form">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'type' => 'inline'
)); ?>

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<div style="margin-bottom: 25px">
		<?php echo $form->textFieldGroup(
			$model,
			'username',
			array(
				'prepend' => '<i class="glyphicon glyphicon-user"></i>'
				)				
			);?>
		<?php //echo $form->labelEx($model,'username'); ?>
		<?php //echo $form->textField($model,'username'); ?>
		<?php //echo $form->error($model,'username'); ?>
	</div>

	<div style="margin-bottom: 25px">
		<?php echo $form->passwordFieldGroup(
			$model,
			'password',
			array(
				'prepend' => '<i class="glyphicon glyphicon-lock"></i>'
				)				
			);?>
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php //echo $form->passwordField($model,'password'); ?>
		<?php //echo $form->error($model,'password'); ?>
		<!-- <p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p> -->
	</div>

	<!-- <div class="row rememberMe"> -->
		<?php //echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	<!-- </div> -->
	
	<?php
		$this->widget(
			'booster.widgets.TbButton',
			array('buttonType' => 'submit', 'context' => 'success', 'label' => 'Login')
			);
	?>		

<?php $this->endWidget(); ?>
</div><!-- form -->
