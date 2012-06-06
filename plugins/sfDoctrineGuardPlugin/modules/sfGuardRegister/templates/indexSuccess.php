<?php use_helper('I18N') ?>
<br></br><br></br>
<h1 style="text-align: center;"><?php echo __('Registro', null, 'sf_guard') ?></h1>
<br></br>
<div style="margin-left: 200px;">
<?php echo get_partial('sfGuardRegister/form', array('form' => $form)) ?>
</div>