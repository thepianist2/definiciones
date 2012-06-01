<a href="javascript:void(0)"><div title="Cerrar" style="color: #000;" onclick="cerrar()" id="cruz">X</div></a>


<?php $respuestas=$test->getRespuesta(); ?>


<?php if(count($respuestas)>0){ ?>
<table>

  <tbody>
    <?php foreach ($respuestas as $respuesta) {
    
 ?>
    <tr>
      <th>Palabra:</th>
      <td><?php echo $respuesta->getTextoPalabra() ?></td>
    </tr>
    <tr>
      <th>Respuesta:</th>
      <td><?php echo $respuesta->getTextoRespuesta() ?></td>
    </tr>
    <tr>
      <th>Es correcta:</th>
      <td><?php echo $respuesta->getRespuestaCorrecta()? "Si" : "No" ?></td>
    </tr>
    <tr>
      <th>Fecha hora respuesta:</th>
      <td><?php echo $respuesta->getUpdatedAt() ?></td>
    </tr>
      <?php } ?>
  </tbody>


</table>

<?php }else{  echo "Sin detalle, no he respondido las respuestas en este test." ?>

    

<?php } ?>




