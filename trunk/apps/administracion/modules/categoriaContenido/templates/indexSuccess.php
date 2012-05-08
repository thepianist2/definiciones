<?php use_helper('Date') ?>
<h1>Lista de Categorias de Contenido</h1>

<table>
  <thead>
    <tr>
      <th colspan="3">Acciones</th>
      <th>Texto</th>
      <th>Imagen</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categoria_contenidos as $categoria_contenido): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'categoriaContenido/show?id='.$categoria_contenido->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'categoriaContenido/edit?id='.$categoria_contenido->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'categoriaContenido/delete?id='.$categoria_contenido->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>
      <td><?php echo $categoria_contenido->getTexto() ?></td>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$categoria_contenido->getImagen() ?>"></td>
      <td><?php echo format_date($categoria_contenido->getCreatedAt(), 'p') ?></td>
      <td><?php echo format_date($categoria_contenido->getUpdatedAt(), 'p') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'categoriaContenido/new', array('title' => 'Nuevo')) ?>
</div>
