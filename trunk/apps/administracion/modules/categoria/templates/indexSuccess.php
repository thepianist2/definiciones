<?php use_helper('Date') ?>
<h1>Lista de Categorías de palabras</h1>

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
    <?php foreach ($categorias as $categoria): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'categoria/show?id='.$categoria->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'categoria/edit?id='.$categoria->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'categoria/delete?id='.$categoria->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>
      <td><?php echo $categoria->getTexto() ?></td>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$categoria->getImagen() ?>"></td>
      <td><?php echo format_date($categoria->getCreatedAt(),'p') ?></td>
      <td><?php echo format_date($categoria->getUpdatedAt(),'p') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'categoria/new', array('title' => 'Nuevo')) ?>
</div>
