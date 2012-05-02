<h1>Listado de sub categorias de palabras</h1>

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
    <?php foreach ($sub_categorias as $sub_categoria): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'subCategoria/show?id='.$sub_categoria->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'subCategoria/edit?id='.$sub_categoria->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'subCategoria/delete?id='.$sub_categoria->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>        
      <td><?php echo $sub_categoria->getTexto() ?></td>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$sub_categoria->getImagen() ?>"></td>
      <td><?php echo $sub_categoria->getCreatedAt() ?></td>
      <td><?php echo $sub_categoria->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'subCategoria/new', array('title' => 'Nuevo')) ?>
</div>
