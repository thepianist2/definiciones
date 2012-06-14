<?php use_helper('I18N') ?>

<h1 style="text-align: center;"><?php echo __('Iniciar sesión', null, 'sf_guard') ?></h1>

<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>