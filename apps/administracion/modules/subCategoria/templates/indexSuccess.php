<h1>Sub categorias List</h1>

<table>
  <thead>
    <tr>
      <th>Id categoria</th>
      <th>Texto</th>
      <th>Imagen</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sub_categorias as $sub_categoria): ?>
    <tr>
      <td><a href="<?php echo url_for('subCategoria/show?id_categoria='.$sub_categoria->getIdCategoria()) ?>"><?php echo $sub_categoria->getIdCategoria() ?></a></td>
      <td><?php echo $sub_categoria->getTexto() ?></td>
      <td><?php echo $sub_categoria->getImagen() ?></td>
      <td><?php echo $sub_categoria->getCreatedAt() ?></td>
      <td><?php echo $sub_categoria->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('subCategoria/new') ?>">New</a>
