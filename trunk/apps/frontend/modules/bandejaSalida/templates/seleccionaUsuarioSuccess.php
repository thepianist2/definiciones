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
<a title="<?php echo $usuario->getUserName() ?>" href="<?php echo url_for('usuario/show?id='.$usuario->getId()) ?>"><h1><?php echo $usuario->obtenerTextoCortoUsuario() ?></h1></a>
<?php if($usuario->getImagenPerfil()){ ?>
<a target="_blank" href="<?php echo '/uploads/'.$usuario->getImagenPerfil(); ?>"><img  style="width: 100px; height: 100px;" src="<?php echo '/uploads/'.$usuario->getImagenPerfil(); ?>"></img></a>
<?php }else{ ?>
<img style="width: 100px; height: 100px;" src="<?php echo '/images/imagenPerfil.jpg'; ?>"></img>

<?php } ?>
<div class="title">
    <label style="color: white;">Nombres:</label><?php echo ucfirst(strtolower($usuario->getFirstName())) ?><br></br>
    <label style="color: white;">Apellidos:</label><?php echo ucfirst(strtolower($usuario->getLastName())) ?><br></br>
    
</div>
            <?php echo link_to(image_tag('iconos/pencil.png').'Enviar mensaje', 'bandejaSalida/new?idUsuario='.$usuario->id) ?><br>
            
                    
         <?php if(Doctrine_Core::getTable('sfGuardUser')->saberEsAmigo($sf_user->getGuardUser()->getId(), $usuario->id)){ ?>
    <?php echo link_to(image_tag('iconos/pencil.png').'Que le dicen', 'publicacionMuro/indexEntrarMuro?idPerfil='.$usuario->id) ?>

    <?php } ?>
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