<h1 style="text-align: center;">Panel de mensajes</h1>

<br></br><br></br>
<div style="text-align: center;">
    
<?php echo link_to(image_tag('iconos/enviar.gif','class=imageMenuEstudiar').'<br>Enviar mensaje', 'bandejaSalida/seleccionaUsuario', array('title' => 'Enviar mensaje')) ?> <br></br> 
<?php echo link_to(image_tag('iconos/bandejaEntrada.gif','class=imageMenuEstudiar').'<br>Bandeja de entrada', 'bandejaEntrada/index', array('title' => 'Bandeja de entrada')) ?>   <br></br> 
<?php echo link_to(image_tag('iconos/bandejaSalida.gif','class=imageMenuEstudiar').'<br>Bandeja de salida', 'bandejaSalida/index', array('title' => 'Bandeja de salida')) ?>    

</div>
<!--<br></br><br></br><br></br>
<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver', 'usuario/index', array('title' => 'Volver')) ?>
</div>-->