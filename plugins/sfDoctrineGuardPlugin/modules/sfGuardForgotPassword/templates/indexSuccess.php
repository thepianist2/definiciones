<?php use_helper('I18N') ?>
<br></br><br></br><br></br>
<h2 style="text-align: center;"><?php echo __('¿Olvidaste tu contraseña?', null, 'sf_guard') ?></h2>

<p>
  <?php echo __('No se preocupe, podemos ayudarlo a que vuelva a su cuenta de forma segura!', null, 'sf_guard') ?>
  <?php echo __('Llena el siguiente formulario para solicitar un e-mail con información sobre cómo restablecer la contraseña.', null, 'sf_guard') ?>
</p>

<form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot><tr><td><input type="submit" name="change" value="<?php echo __('Enviar', null, 'sf_guard') ?>" /></td></tr></tfoot>
  </table>
</form>