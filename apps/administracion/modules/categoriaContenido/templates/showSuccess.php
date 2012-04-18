<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $categoria_contenido->getId() ?></td>
    </tr>
    <tr>
      <th>Texto:</th>
      <td><?php echo $categoria_contenido->getTexto() ?></td>
    </tr>
    <tr>
      <th>Imagen:</th>
      <td><?php echo $categoria_contenido->getImagen() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $categoria_contenido->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $categoria_contenido->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('categoriaContenido/edit?id='.$categoria_contenido->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('categoriaContenido/index') ?>">List</a>
