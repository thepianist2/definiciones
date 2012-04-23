<table>
  <tbody>
    <tr>
      <th>Id categoria:</th>
      <td><?php echo $sub_categoria->getIdCategoria() ?></td>
    </tr>
    <tr>
      <th>Texto:</th>
      <td><?php echo $sub_categoria->getTexto() ?></td>
    </tr>
    <tr>
      <th>Imagen:</th>
      <td><?php echo $sub_categoria->getImagen() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $sub_categoria->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $sub_categoria->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('subCategoria/edit?id_categoria='.$sub_categoria->getIdCategoria()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('subCategoria/index') ?>">List</a>
