<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<form style="margin-left: 200px;" action="<?php echo url_for('default/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2" style="text-align: center; margin-top: 200px;">
            <br></br><br></br>
          &nbsp;<?php echo link_to(image_tag('iconos/atras.png').'Volver a la lista', 'default/index', array('title' => 'Volver a la lista')) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to(image_tag('iconos/borrar.png').'Borrar', 'default/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>             
                    <br />
                    <?php echo $form['idUsuario'] ?>
                    <div class="clear"></div>                    
                    <br />

                    
            <label for="categoria_palabra"><?php echo 'Categoría    '; ?></label>
            <select id="categoria_palabra">
                <option value="">-- Seleccionar --</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option <?php if (!$form->isNew() && $categoria->getId() == $form->getObject()->getSubCategoria()->getIdCategoria()) echo 'selected="selected"'; ?>
                        value="<?php echo $categoria->getId(); ?>"><?php echo $categoria->getTexto(); ?></option>
                    <?php endforeach; ?>
            </select><br></br>
            <div class="clear"></div>

            <?php echo $form['idSubCategoria']->renderLabel('Sub Categoría *') ?>
            <?php echo $form['idSubCategoria']->renderError() ?>
            <?php if ($form->isNew()): ?>
                <select name="palabra[idSubCategoria]" id="palabra_idSubCategoria">
                    <option value="">-- <?php echo 'Selecciona primero una categoría'; ?> --</option>
                </select>
            <?php else: ?>
                <?php echo $form['idSubCategoria']; ?>
            <?php endif; ?>
            <div class="clear"></div><br></br>
            
            
            
            
            
                    <?php echo $form['textoPalabra']->renderError() ?>
                    <?php echo $form['textoPalabra']->renderLabel() ?>
                    <?php echo $form['textoPalabra'] ?>
                    <div class="clear"></div>                    
                    <br />
                    <?php echo $form['textoDefinicion']->renderError() ?>
                    <?php echo $form['textoDefinicion']->renderLabel() ?><br></br>
                    <?php echo $form['textoDefinicion'] ?>
                   
                    <?php echo $form['activo'] ?>
                                        <div class="clear"></div>                    
                    <br />
                    <?php echo $form['imagen']->renderError() ?>
                    <?php echo $form['imagen']->renderLabel() ?>
                    <?php echo $form['imagen'] ?>
                    
                    <?php echo $form['_csrf_token'] ?>
    </tbody>
  </table>
</form>

<script type="text/javascript">

    $('select[id^=categoria]').change(function() {
        var idCategoria = $(this).val();
        subCategorias = $.ajax({
            type: 'GET',
            url: '<?php echo url_for('default/getSubCategoriasOptions') ?>'+'?id='+idCategoria,
            async: false
        }).responseText;      
            $('#palabra_idSubCategoria').html(subCategorias);
    });

</script>
