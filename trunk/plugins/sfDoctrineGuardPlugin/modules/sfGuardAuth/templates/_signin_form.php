<?php use_helper('I18N') ?>

<form style="width: 330px; margin-left: 220px; margin-top: 60px;" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
            <input style="color: #003366;" type="submit" value="<?php echo __('Entrar', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a style="color: blue;" href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('<br></br><input style="color:green;" type="button" value="Recordar contraseña" />', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a style="color: #EE0000; " href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('<br></br><input style="color:red;" type="button" value="Registrate aquí en 1 minuto" />', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>