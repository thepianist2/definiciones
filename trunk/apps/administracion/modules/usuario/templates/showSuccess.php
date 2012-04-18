<table>
  <tbody>
    <tr>
      <th>Id Usuario: </th>
      <td><?php echo $sf_guard_user->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre: </th>
      <td><?php echo $sf_guard_user->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Apellidos: </th>
      <td><?php echo $sf_guard_user->getLastName() ?></td>
    </tr>
    <tr>
      <th>Email: </th>
      <td><?php echo $sf_guard_user->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th>Login: </th>
      <td><?php echo $sf_guard_user->getUsername() ?></td>
    </tr>
    <tr>
      <th>Activo: </th>
      <td><?php echo $sf_guard_user->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Es Super admin:</th>
      <td><?php echo $sf_guard_user->getIsSuperAdmin() ?></td>
    </tr>
    <tr>
      <th>Último login:</th>
      <td><?php echo $sf_guard_user->getLastLogin() ?></td>
    </tr>
    <tr>
      <th>Creade en:</th>
      <td><?php echo $sf_guard_user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Actualizado en:</th>
      <td><?php echo $sf_guard_user->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('usuario/edit?id='.$sf_guard_user->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('usuario/index') ?>">Volver a la lista</a>
