<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'domain'); ?>
		<?php echo $form->textField($model,'domain',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'domain'); ?>
        <div class="hint">the domain that will be used via REST (ie: mehesz.net)</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
        <div class="hint">the title for the image hover</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'goto_link'); ?>
		<?php echo $form->textField($model,'goto_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'goto_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

    <?php echo CHtml::activeLabelEx($model,'startdate'); ?>
    <?php echo CHtml::activeTextField($model,'startdate',array("id"=>"startdate", 'value' => $model->startdate == '' ? date( 'm/d/Y', time() ) : date('m/d/Y',$model->startdate))); ?>
    <?php $this->widget('application.extensions.calendar.SCalendar',
            array(
                'inputField'=>'startdate',
                'ifFormat'=>'%m/%d/%Y',
                ));
    ?>

    <?php echo CHtml::activeLabelEx($model,'enddate'); ?>
    <?php echo CHtml::activeTextField($model,'enddate',array("id"=>"enddate", 'value' => $model->enddate == '' ? date( 'm/d/Y', time() ) : date('m/d/Y',$model->enddate))); ?>
    <?php $this->widget('application.extensions.calendar.SCalendar',
            array(
                'inputField'=>'enddate',
                'ifFormat'=>'%m/%d/%Y',
                ));
    ?>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score', array( 'value' => $model->score == '' ? 0 : $model->score ) ); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
