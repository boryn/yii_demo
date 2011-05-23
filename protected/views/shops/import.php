<?php
$this->breadcrumbs=array(
	'Shops'=>array('/shops'),
	'Import',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
  'enableAjaxValidation'=>false,
         'htmlOptions'=>array('enctype'=>'multipart/form-data'),
         )); ?>

 <p class="note">Fields with <span class="required">*</span> are required.</p>

 <?php echo CHtml::errorSummary($model); ?>

 <div class="row">
  <?php echo $form->labelEx($model, 'csv'); ?>
  <?php echo $form->fileField($model, 'csv'); ?>
 </div>

 <div class="row buttons">
  <?php echo CHtml::submitButton('Import'); ?>
 </div>

<?php $this->endWidget(); ?>

</div><!-- form -->