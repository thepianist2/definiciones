<h1>Listado de grupos</h1>

<table>
  <thead>
    <tr>
      <th colspan="3">Acciones</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sf_guard_groups as $sf_guard_group): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'perfil/show?id='.$sf_guard_group->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'perfil/edit?id='.$sf_guard_group->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'perfil/delete?id='.$sf_guard_group->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>
      <td><?php echo $sf_guard_group->getName() ?></td>
      <td><?php echo $sf_guard_group->getDescription() ?></td>
      <td><?php echo $sf_guard_group->getCreatedAt() ?></td>
      <td><?php echo $sf_guard_group->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'perfil/new', array('title' => 'Nuevo')) ?>
</div>
