<h1>Categorias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Texto</th>
      <th>Imagen</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
      <td><a href="<?php echo url_for('categoria/show?id='.$categoria->getId()) ?>"><?php echo $categoria->getId() ?></a></td>
      <td><?php echo $categoria->getTexto() ?></td>
      <td><?php echo $categoria->getImagen() ?></td>
      <td><?php echo $categoria->getCreatedAt() ?></td>
      <td><?php echo $categoria->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('categoria/new') ?>">New</a>
