<table>
  <tbody>
    <tr>
      <th>Nombre: </th>
      <td><?php echo $sf_guard_group->getName() ?></td>
    </tr>
    <tr>
      <th>Descripción: </th>
      <td><?php echo $sf_guard_group->getDescription() ?></td>
    </tr>
    <tr>
      <th>Creado en: </th>
      <td><?php echo $sf_guard_group->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Actualizado en: </th>
      <td><?php echo $sf_guard_group->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('perfil/edit?id='.$sf_guard_group->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('perfil/index') ?>">Volver a la lista</a>
