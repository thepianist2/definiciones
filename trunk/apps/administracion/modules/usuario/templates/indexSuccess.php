<?php use_helper('Date') ?>
<h1>Lista de usuarios</h1>

<table>
  <thead>
    <tr>
      <th colspan="3">Acciones</th>
      <th>Primer Nombre</th>
      <th>Segundo Nombre</th>
      <th>Email</th>
      <th>Nombre Usuario</th>
      <th title="activo">Act.</th>
      <th title="Administrador">Admin</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sf_guard_users as $sf_guard_user): ?>
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'usuario/show?id='.$sf_guard_user->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'usuario/edit?id='.$sf_guard_user->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'usuario/delete?id='.$sf_guard_user->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>
      <td><?php echo $sf_guard_user->getFirstName() ?></td>
      <td><?php echo $sf_guard_user->getLastName() ?></td>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
      <td><?php echo $sf_guard_user->getIsActive() ? 'Si' : 'No' ?></td>
      <td><?php echo $sf_guard_user->getIsSuperAdmin() ? 'Si' : 'No' ?></td>
      <td><?php echo format_date($sf_guard_user->getCreatedAt(), 'p') ?></td>
      <td><?php echo format_date($sf_guard_user->getUpdatedAt(), 'p') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'usuario/new', array('title' => 'Nuevo')) ?>
</div>