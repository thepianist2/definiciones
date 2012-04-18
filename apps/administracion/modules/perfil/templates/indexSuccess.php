<h1>Listado de grupos</h1>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sf_guard_groups as $sf_guard_group): ?>
    <tr>
      <td><a href="<?php echo url_for('perfil/show?id='.$sf_guard_group->getId()) ?>"><?php echo $sf_guard_group->getName() ?></a></td>
      <td><?php echo $sf_guard_group->getDescription() ?></td>
      <td><?php echo $sf_guard_group->getCreatedAt() ?></td>
      <td><?php echo $sf_guard_group->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('perfil/new') ?>">Nuevo</a>
