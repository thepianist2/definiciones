<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div style="margin-left: 200px;">
<form action="<?php echo url_for('album/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2" style="text-align: center; margin-top: 200px;">
            <br></br><br></br>
          &nbsp;<?php echo link_to(image_tag('iconos/atras.png').'Volver a los albumes', 'album/index', array('title' => 'Volver a la lista')) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to(image_tag('iconos/borrar.png').'Borrar', 'album/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
</div>