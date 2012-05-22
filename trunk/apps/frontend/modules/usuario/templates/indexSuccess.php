<h1 style="text-align: center;">Panel de usuario</h1>

<br></br><br></br>
<div style="text-align: center;">
    
<?php echo link_to(image_tag('iconos/perfil.gif','class=imageMenuEstudiar').'<br>Editar usuario', 'usuario/editarUsuario', array('title' => 'Editar Usuario')) ?>   <br></br> 
<?php echo link_to(image_tag('iconos/mensaje.gif','class=imageMenuEstudiar').'<br>Ver mensajes', 'mensaje/index', array('title' => 'Mensajes')) ?>

</div>