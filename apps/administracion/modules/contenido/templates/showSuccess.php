<table>
  <tbody>
    <tr>
      <th>Creado por</th>
      <td><?php echo $contenido->getSfGuardUser()->getUserName() ?></td>
    </tr>
    <tr>
      <th>Categoría contenido:</th>
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
      <td><?php echo $contenido->getBorrado()? "Si" : "No" ?></td>
    </tr>
    <tr>
      <th>Activo:</th>
      <td><?php echo $contenido->getActivo()? "Si" : "No" ?></td>
    </tr>
    <tr>
      <th>Creado en:</th>
      <td><?php echo $contenido->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Actualizado en:</th>
      <td><?php echo $contenido->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'contenido/edit?id='.$contenido->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/atras.png').'Volver a la lista', 'contenido/index', array('title' => 'Volver a la lista')) ?>
