<table>
  <tbody>
    <tr>
      <th>Texto:</th>
      <td><?php echo $categoria->getTexto() ?></td>
    </tr>
    <tr>
      <th>Imagen:</th>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$categoria->getImagen() ?>"></td>
    </tr>
    <tr>
      <th>Creado en:</th>
      <td><?php echo $categoria->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Actualizado en:</th>
      <td><?php echo $categoria->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'categoria/edit?id='.$categoria->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/atras.png').'Volver a la lista', 'categoria/index', array('title' => 'Volver a la lista')) ?>
