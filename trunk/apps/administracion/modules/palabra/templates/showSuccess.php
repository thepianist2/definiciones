<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $palabra->getId() ?></td>
    </tr>
    <tr>
      <th>Id usuario:</th>
      <td><?php echo $palabra->getIdUsuario() ?></td>
    </tr>
    <tr>
      <th>Texto:</th>
      <td><?php echo $palabra->getTexto() ?></td>
    </tr>
    <tr>
      <th>Imagen:</th>
      <td><?php echo $palabra->getImagen() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $palabra->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $palabra->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('palabra/edit?id='.$palabra->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('palabra/index') ?>">List</a>
