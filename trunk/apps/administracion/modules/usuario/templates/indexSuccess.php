<?php use_helper('Date') ?>
<h1>Lista de usuarios</h1>

<table>
  <thead>
    <tr>
      <th>Id Usuario</th>
      <th>Primer Nombre</th>
      <th>Segundo Nombre</th>
      <th>Email</th>
      <th>Nombre Usuario</th>
      <th title="activo">Act.</th>
      <th title="Administrador">Admin</th>
      <th>Último Login</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sf_guard_users as $sf_guard_user): ?>
    <tr>
      <td><a href="<?php echo url_for('usuario/show?id='.$sf_guard_user->getId()) ?>"><?php echo $sf_guard_user->getId() ?></a></td>
      <td><?php echo $sf_guard_user->getFirstName() ?></td>
      <td><?php echo $sf_guard_user->getLastName() ?></td>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
      <td><?php echo $sf_guard_user->getIsActive() ? 'Si' : 'No' ?></td>
      <td><?php echo $sf_guard_user->getIsSuperAdmin() ? 'Si' : 'No' ?></td>
      <td><?php echo $sf_guard_user->getLastLogin() ?></td>
      <td><?php echo format_date($sf_guard_user->getCreatedAt(), 'p') ?></td>
      <td><?php echo format_date($sf_guard_user->getUpdatedAt(), 'p') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('usuario/new') ?>">Nuevo</a>
