<?php use_helper('Date') ?>

<?php echo link_to(image_tag('iconos/respuesta.png').'Categorias', 'categoria/index', array('title' => 'Categorias')) ?>
<?php echo link_to(image_tag('iconos/respuesta.png').'Sub Categorías', 'subCategoria/index', array('title' => 'Sub Categorias')) ?>

<h1>Listado de Palabras</h1>

<table>
  <thead>
    <tr>
      <th colspan="3">Acciones</th>
      <th>Texto palabra</th>
      <th>Sub categoria</th>
      <th>Borrado</th>
      <th>Activo</th>
      <th>Imagen</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($palabras->getResults() as $palabra): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'default/show?id='.$palabra->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'default/edit?id='.$palabra->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'default/delete?id='.$palabra->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>
      <td><?php echo $palabra->getTextoPalabra() ?></td>
      <td><?php echo $palabra->getSubCategoria()->getTexto() ?></td>
      <td><?php echo $palabra->getBorrado()? "Si": "No" ?></td>
      <td><?php echo $palabra->getActivo()? "Si": "No" ?></td>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$palabra->getImagen() ?>"></td>
      <td><?php echo format_date($palabra->getCreatedAt(), 'p') ?></td>
      <td><?php echo format_date($palabra->getUpdatedAt(), 'p') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $palabras, 'action' => $action)) ?>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'default/new', array('title' => 'Nuevo')) ?>
</div>
