<?php use_helper('Date') ?>
<table>
  <tbody>
    <tr>
      <th>Categoria:</th>
      <td><?php echo $sub_categoria->geCategoria()->getTexto() ?></td>
    </tr>
    <tr>
      <th>Texto:</th>
      <td><?php echo $sub_categoria->getTexto() ?></td>
    </tr>
    <tr>
      <th>Imagen:</th>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$sub_categoria->getImagen() ?>"></td>    </tr>
    <tr>
      <th>Creado en:</th>
      <td><?php echo format_date($sub_categoria->getCreatedAt(), 'p') ?></td>
    </tr>
    <tr>
      <th>Actualizado en:</th>
      <td><?php echo format_date($sub_categoria->getUpdatedAt(), 'p') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('subCategoria/edit?id_categoria='.$sub_categoria->getIdCategoria()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('subCategoria/index') ?>">List</a>
