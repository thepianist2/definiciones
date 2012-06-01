<h1 style="text-align: center;">Editar Album</h1>

<?php include_partial('form', array('form' => $form)) ?>

<?php echo link_to(image_tag('iconos/nuevo.png').'Agregar imagen', 'imagen/new?idAlbum='.$form->getObject()->id, array('title' => 'Volver a la lista')) ?>

