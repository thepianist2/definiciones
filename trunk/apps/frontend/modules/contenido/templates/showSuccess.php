<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $contenido->getId() ?></td>
    </tr>
    <tr>
      <th>Id usuario:</th>
      <td><?php echo $contenido->getIdUsuario() ?></td>
    </tr>
    <tr>
      <th>Id categoria contenido:</th>
      <td><?php echo $contenido->getIdCategoriaContenido() ?></td>
    </tr>
    <tr>
      <th>Titulo:</th>
      <td><?php echo $contenido->getTitulo() ?></td>
    </tr>
    <tr>
      <th>Contenido:</th>
      <td><?php echo $contenido->getContenido() ?></td>
    </tr>
    <tr>
      <th>Borrado:</th>
      <td><?php echo $contenido->getBorrado() ?></td>
    </tr>
    <tr>
      <th>Activo:</th>
      <td><?php echo $contenido->getActivo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $contenido->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $contenido->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('contenido/edit?id='.$contenido->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('contenido/index') ?>">List</a>
