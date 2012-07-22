<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<h1 style="text-align: center;">Imágenes del piso</h1>

					<div class="tabla_imagenes">
					<?php foreach($imagen_pisos as $imagen_piso): ?>
						<div class="caja-imagen" style="">
                                                    <div onclick="javascript:eliminarImagen('<?php echo url_for('imagenPiso/delete?id='.$imagen_piso->id) ?>',<?php echo $imagen_piso->id ?>)"
								style="position: absolute; top: 0px; right: 0px; display: none; color: red; background-color: white;">
								<?php echo image_tag('/images/iconos/cross.png',array('style' => 'float: right;'))?>
								<span
									style="padding-top: 3px; padding-left: 5px; display: block; float: right;">Eliminar</span>
							</div>
							<?php echo image_tag('/uploads/'.$imagen_piso->getImagen(),array('width' => '200', 'id'=> $imagen_piso->id,'class'=>'imagenPiso')); ?>
						</div>
						<?php endforeach ?>
					</div>
<br></br><br></br><br></br><br></br><br></br><br></br>




<div id="eliminar-comen" style="display: none;"></div><br></br><br></br><br></br>
<form action="<?php echo url_for('imagenPiso/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
          <td style="text-align: right;" colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Subir imágen" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <td>
          <?php echo $form['idPiso']->renderError() ?>
          <?php echo $form['idPiso'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descripcion']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion']->renderError() ?>
          <?php echo $form['descripcion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['imagen']->renderLabel() ?></th>
        <td>
          <?php echo $form['imagen']->renderError() ?>
          <?php echo $form['imagen'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
<br></br><br></br><br></br>
<div style="text-align: right;">
    <a href="<?php echo url_for('piso/show?id='.$idPiso) ?>"><button style="font-size: 18px;">Finalizar y visualizar</button></a>
</div>
<br></br>
  <script type="text/javascript">
	$(document).ready(function() {
		$('.caja-imagen').each(function() {
			$(this).hover(function() {
				$(this).addClass('hover-borrar-imagen');
				$(this).children('div').show();
			}, function() {
				$(this).removeClass('hover-borrar-imagen');
				$(this).children('div').hide();
			});
		});
		
	});
        
        
            function eliminarImagen(url,idImagen){
                if (confirm("¿Desea eliminar esta imágen?")) {
           $('#eliminar-comen').load(url,{},function() {  
               $('#'+idImagen).hide("slow");
              
        }); 
        
   }
 }

</script>

