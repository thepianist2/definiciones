<table>
  <tbody>
    <tr>
      <th>Enviado a:</th>
      <td><?php echo $mensaje->getIdUsuarioReceptor() ?></td>
    </tr>
     <tr>
      <th></th>
      <td><p><?php echo html_entity_decode(ucfirst(strtolower($mensaje->getMensaje())), ENT_COMPAT , 'UTF-8'); ?></p></td>
    </tr>
    <tr>
      <th>Enviado en:</th>
      <td><?php echo $mensaje->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'mensaje/index', array('title' => 'Volver')) ?>
</div><br></br>
