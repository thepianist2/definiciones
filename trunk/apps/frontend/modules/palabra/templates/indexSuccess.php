<h1>Palabras List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id usuario</th>
      <th>Texto</th>
      <th>Imagen</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($palabras as $palabra): ?>
    <tr>
      <td><a href="<?php echo url_for('palabra/show?id='.$palabra->getId()) ?>"><?php echo $palabra->getId() ?></a></td>
      <td><?php echo $palabra->getIdUsuario() ?></td>
      <td><?php echo $palabra->getTexto() ?></td>
      <td><?php echo $palabra->getImagen() ?></td>
      <td><?php echo $palabra->getCreatedAt() ?></td>
      <td><?php echo $palabra->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('palabra/new') ?>">New</a>
