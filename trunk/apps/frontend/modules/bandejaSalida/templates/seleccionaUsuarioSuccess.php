   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Selecciona a quien se lo envias</h1>
<?php } ?>
<br></br>
<?php include_partial('bandejaSalida/buscador', array('query' => $query)); ?>
<br></br>
<div style="text-align: center;">
<?php echo link_to(image_tag('iconos/atras.png').'Volver', 'mensaje/index', array('title' => 'Volver')) ?>
</div> 
<br></br>
<?php if(count($sf_guard_users)>0){ ?>
<br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $sf_guard_users, 'action' => $action)) ?>
       <br></br>
<div id="mason-content" class="clearfix masonry" style="min-height: 800px; height: 100%; width: 100%; ">


    <?php foreach ($sf_guard_users as $usuario): ?>

<div class="caja">
<h1><?php echo $usuario->getUserName() ?></h1>

<div class="title">
    <label style="color: white;">Nombres:</label><?php echo ucfirst(strtolower($usuario->getFirstName())) ?><br></br>
    <label style="color: white;">Apellidos:</label><?php echo ucfirst(strtolower($usuario->getLastName())) ?><br></br>
    
</div>
            <?php echo link_to(image_tag('iconos/pencil.png').'Enviar mensaje', 'bandejaSalida/new?idUsuario='.$usuario->id) ?>

</div>
<div class="clear"></div>

    <?php endforeach; ?>

</div>
       <br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $sf_guard_users, 'action' => $action)) ?>
       <br></br>
    <?php }else{ ?>
       
       <p style="text-align: center;">No se ha encontrado ningún usuario</p>
       <?php } ?>

<br></br>
<div style="text-align: center;">
<?php echo link_to(image_tag('iconos/atras.png').'Volver', 'mensaje/index', array('title' => 'Volver')) ?>
</div> 
<br></br>