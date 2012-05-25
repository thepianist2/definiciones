   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Selecciona a quien se lo envias</h1>
<?php } ?>
<?php if(count($sf_guard_users)>0){ ?>
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
    <?php }
