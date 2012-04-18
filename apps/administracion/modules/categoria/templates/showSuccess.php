<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $categoria->getId() ?></td>
    </tr>
    <tr>
      <th>Texto:</th>
      <td><?php echo $categoria->getTexto() ?></td>
    </tr>
    <tr>
      <th>Imagen:</th>
      <td><?php echo $categoria->getImagen() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $categoria->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $categoria->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('categoria/edit?id='.$categoria->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('categoria/index') ?>">List</a>
