<table>
  <tbody>
    <tr>
      <th>Nombre: </th>
      <td><?php echo $sf_guard_permission->getName() ?></td>
    </tr>
    <tr>
      <th>Descripción: </th>
      <td><?php echo $sf_guard_permission->getDescription() ?></td>
    </tr>
    <tr>
      <th>Creado en: </th>
      <td><?php echo $sf_guard_permission->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Actualizado en: </th>
      <td><?php echo $sf_guard_permission->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('permiso/edit?id='.$sf_guard_permission->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('permiso/index') ?>">Volver a la lista</a>
