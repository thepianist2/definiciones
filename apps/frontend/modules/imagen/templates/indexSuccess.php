<h1>Imagens List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id album</th>
      <th>Descripcion</th>
      <th>Imagen</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($imagens as $imagen): ?>
    <tr>
      <td><a href="<?php echo url_for('imagen/show?id='.$imagen->getId()) ?>"><?php echo $imagen->getId() ?></a></td>
      <td><?php echo $imagen->getIdAlbum() ?></td>
      <td><?php echo $imagen->getDescripcion() ?></td>
      <td><?php echo $imagen->getImagen() ?></td>
      <td><?php echo $imagen->getCreatedAt() ?></td>
      <td><?php echo $imagen->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('imagen/new') ?>">New</a>
