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
      <th>Texto palabra:</th>
      <td><?php echo $palabra->getTextoPalabra() ?></td>
    </tr>
    <tr>
      <th>Texto definicion:</th>
      <td><?php echo $palabra->getTextoDefinicion() ?></td>
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

<a href="<?php echo url_for('default/edit?id='.$palabra->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('default/index') ?>">List</a>
