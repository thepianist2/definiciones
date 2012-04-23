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
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$categoria_contenido->getImagen() ?>"></td>
    </tr>
    <tr>
      <th>Creado en:</th>
      <td><?php echo $categoria_contenido->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Actualizado en:</th>
      <td><?php echo $categoria_contenido->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'categoriaContenido/edit?id='.$categoria_contenido->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/atras.png').'Volver a la lista', 'categoriaContenido/index', array('title' => 'Volver a la lista')) ?>
