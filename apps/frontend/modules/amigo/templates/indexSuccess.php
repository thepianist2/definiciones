   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Tu lista de amigos</h1>
<?php } ?>
<br>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/grupo.png').'Ver quien te ha agregado', 'amigo/solicitudes', array('title' => 'Ver quien te he agregado')) ?>
    
  <?php echo link_to(image_tag('iconos/mundo.png').'Buscar amigos en la red', 'amigo/indexTodos', array('title' => 'Buscar amigos en la red')) ?>
</div>
<br></br>
<?php include_partial('amigo/buscador', array('query' => $query)); ?>
<br></br>
<br></br>
<?php if(count($sf_guard_users)>0){ ?>


<br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $sf_guard_users, 'action' => $action)) ?>
       <br></br>
<div id="mason-content" class="clearfix masonry" style="min-height: 800px; height: 100%; width: 100%; ">


    <?php foreach ($sf_guard_users as $usuario): ?>

    <div class="caja">
    <div title="Eliminar" style="color: #0A246A;" id="cruz"><?php echo link_to('X', 'amigo/delete?id='.$usuario->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro que deseas borrar a tu amigo: '.$usuario->getUserName().'?')) ?></div>

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