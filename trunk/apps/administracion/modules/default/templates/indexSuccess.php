<?php use_helper('Date') ?>

<?php echo link_to(image_tag('iconos/respuesta.png').'Categorias', 'categoria/index', array('title' => 'Categorias')) ?>
<?php echo link_to(image_tag('iconos/respuesta.png').'Sub Categorías', 'subCategoria/index', array('title' => 'Sub Categorias')) ?>

<h1>Listado de Palabras</h1>

<table>
  <thead>
    <tr>
      <th colspan="3">Acciones</th>
      <th>Texto palabra</th>
      <th>Texto definicion</th>
      <th>Borrado</th>
      <th>Activo</th>
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
      <td><?php echo $palabra->getTextoDefinicion() ?></td>
      <td><?php echo $palabra->getBorrado() ?></td>
      <td><?php echo $palabra->getActivo() ?></td>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$palabra->getImagen() ?>"></td>
      <td><?php echo $palabra->getCreatedAt() ?></td>
      <td><?php echo $palabra->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'default/new', array('title' => 'Nuevo')) ?>
</div>
