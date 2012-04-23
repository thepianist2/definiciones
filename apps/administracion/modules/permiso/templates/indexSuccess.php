<h1>Lista de permisos</h1>

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
    <?php foreach ($sf_guard_permissions as $sf_guard_permission): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'permiso/show?id='.$sf_guard_permission->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'permiso/edit?id='.$sf_guard_permission->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'permiso/delete?id='.$sf_guard_permission->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>  
      <td><?php echo $sf_guard_permission->getName() ?></td>
      <td><?php echo $sf_guard_permission->getDescription() ?></td>
      <td><?php echo $sf_guard_permission->getCreatedAt() ?></td>
      <td><?php echo $sf_guard_permission->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'permiso/new', array('title' => 'Nuevo')) ?>
</div>
