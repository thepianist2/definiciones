<table>
  <tbody>
    <tr>
      <th>Enviado de:</th>
      <td>
      </td>
      
    </tr>
     <tr>
      <th></th>
      <td><p><?php echo html_entity_decode(ucfirst(strtolower($bandeja_entrada->getMensaje())), ENT_COMPAT , 'UTF-8'); ?></p></td>
    </tr>
    <tr>
      <th>Enviado en:</th>
      <td><?php echo $bandeja_entrada->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'bandejaEntrada/index', array('title' => 'Volver')) ?>
</div><br></br>