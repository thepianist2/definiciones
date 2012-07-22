   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Amigos de la red</h1>
<?php } ?>
<br>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/atras.png').'Volver a mis amigos', 'amigo/index', array('title' => 'Volver a mis amigos')) ?>

</div>
<br></br>
<?php include_partial('amigo/buscadorTodos', array('query' => $query)); ?>
<br></br>
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
    <div style="text-align: right;">
            <?php

					$imagen_fav = '<a id="icono_favorito_' . $usuario->id . '" href="javascript:void()" ';

					if (Doctrine_Core::getTable('sfGuardUser')->saberEsAmigo($sf_user->getGuardUser()->getId(), $usuario->id)) {
						$imagen_fav .= '>';
						$imagen_fav .= image_tag('/images/iconos/no-amigo.png', array("id" => 'imagen_fav_' . $usuario->id, "class" => 'favoritos'));
					} else {
						$imagen_fav .= ' onmouseover=document.getElementById("imagen_fav_' . $usuario->id . '").src="' . image_path('iconos/amigo.png') . '"';
						$imagen_fav .= ' onmouseout=document.getElementById("imagen_fav_' . $usuario->id . '").src="' . image_path('iconos/no-amigo.png') . '"';
						$imagen_fav .= '>';
						$imagen_fav .= image_tag('/images/iconos/no-amigo.png', array("alt" => 'Añadir a amigos',
                                        "id" => "imagen_fav_" . $usuario->id,
                                        "title" => 'Añadir a amigos',
                                        "class" => 'favoritos',            
                                        "onclick" => 'javascript:addAmigo("' . url_for('amigo/addAmigo?usuario_id=' . $usuario->id . '&usuario_id_uno=' . $sf_user->getGuardUser()->getId()) . '","' . image_path('/images/iconos/amigo-si.png') . '",' . $usuario->id . ')',
						));
					}
					$imagen_fav .= '</a>';
					echo $imagen_fav;
				
				?>
</div>

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
<div id="ajax-favoritos"></div>
<script type="text/javascript">
function addAmigo(url,imagen,id_inmueble)
{
    if( jQuery('#imagen_fav_'+id_inmueble).attr('src') != imagen) {
        if (confirm("¿Lo deseas añadir como amigo?")) {
            jQuery('#ajax-favoritos').load(url,{},function() {
                jQuery('#imagen_fav_'+id_inmueble).attr('src',imagen);
                jQuery('#icono_favorito_'+id_inmueble).attr('onmouseover','');
                jQuery('#icono_favorito_'+id_inmueble).attr('onmouseout','');
            });
        }      
    }
}



    
</script>