<?php use_helper('Date') ?>
<table>
  <tbody>
    <tr>
      <th>Sub categoria:</th>
      <td><?php echo $palabra->getSubCategoria()->getTexto() ?></td>
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
      <th>Borrado:</th>
      <td><?php echo $palabra->getBorrado() ?></td>
    </tr>
    <tr>
      <th>Activo:</th>
      <td><?php echo $palabra->getActivo() ?></td>
    </tr>
    <tr>
      <th>Imagen:</th>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$palabra->getImagen() ?>"></td>
    </tr>
    <tr>
      <th>Creado en:</th>
      <td><?php echo format_date($palabra->getCreatedAt(), 'p') ?></td>
    </tr>
    <tr>
      <th>Actualizado en:</th>
      <td><?php echo format_date($palabra->getUpdatedAt(), 'p') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'default/edit?id='.$palabra->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/atras.png').'Volver a la lista', 'default/index', array('title' => 'Volver a la lista')) ?>
