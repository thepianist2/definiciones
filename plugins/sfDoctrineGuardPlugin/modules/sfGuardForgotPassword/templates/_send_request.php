<?php use_helper('I18N') ?>
<?php echo __('Hola %first_name%', array('%first_name%' => $user->getFirstName()), 'sf_guard') ?>,<br/><br/>

<?php echo __('Este e-mail ha sido enviado, ya que solicitó información sobre cómo restablecer la contraseña.', null, 'sf_guard') ?><br/><br/>

<?php echo __('Usted puede cambiar su contraseña haciendo clic en el enlace de debajo de la cual sólo es válido durante 24 horas:', null, 'sf_guard') ?><br/><br/>

<?php echo link_to(__('Click para cambiar la contraseña', null, 'sf_guard'), '@sf_guard_forgot_password_change?unique_key='.$forgot_password->unique_key, 'absolute=true') ?>