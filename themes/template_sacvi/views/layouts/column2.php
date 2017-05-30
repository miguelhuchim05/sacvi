<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
	<div class="col-md-2">	
		<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				Operaciones
			</h4>
		</div>
		<?php
		$this->widget(
		    'booster.widgets.TbMenu',
		    array(
		        'type' => 'pills',
		        'stacked'=>true,
		        'items' => $this->menu,
		    )
		);
		?>
		</div>
	</div>
	<div class="col-md-10">
		<?php echo $content; ?>
	</div>
</div>
<?php $this->endContent(); ?>