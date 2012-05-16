<?php use_helper('Date') ?>
<link rel="stylesheet" type="text/css" media="screen" href="/css/listado.css">
<h1 style="text-align: center;">Listado de Palabras</h1>
<br></br>
<table>
  <thead>
    <tr>
      <th colspan="3">Acciones</th>
      <th>Texto palabra</th>
      <th>Sub categoria</th>
      <th>Imagen</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($palabras as $palabra): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'default/show?id='.$palabra->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'default/edit?id='.$palabra->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'default/delete?id='.$palabra->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>
      <td><?php echo $palabra->getTextoPalabra() ?></td>
      <td><?php echo $palabra->getSubCategoria()->getTexto() ?></td>
      
      <?php if($palabra->getImagen()){ ?>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$palabra->getImagen() ?>"></td>
     <?php }else{ ?>
            <td><img id="imagenIndex" src="<?php echo '/images/estudiando.png' ?>"></td>
      
      <?php } ?>
      
      <td><?php echo format_date($palabra->getCreatedAt(), 'p') ?></td>
      <td><?php echo format_date($palabra->getUpdatedAt(), 'p') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'default/index', array('title' => 'Volver')) ?>

  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nueva', 'default/new', array('title' => 'Nuevo')) ?>
</div>
