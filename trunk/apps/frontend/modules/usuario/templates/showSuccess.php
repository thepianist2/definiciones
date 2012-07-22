<h1 style="text-align: center;"><?php echo $sf_guard_user->getUserName() ?></h1>
<br></br>
<div style="text-align: center;"><a href="javascript:history.back(1)"><img src="/images/iconos/atras.png">Volver atrás</img></a></div>
<br></br>
<div>
    <?php if($sf_guard_user->getImagenPerfil()){ ?>
    <div style="text-align: center;"><a target="_blank" href="<?php echo '/uploads/'.$sf_guard_user->getImagenPerfil(); ?>"><img  style="width: 300px; height: 300px;" src="<?php echo '/uploads/'.$sf_guard_user->getImagenPerfil(); ?>"></img></a></div>
<?php }else{ ?>
<div style="text-align: center;"><img style="width: 300px; height: 300px;" src="<?php echo '/images/imagenPerfil.jpg'; ?>"></img></div>

<?php } ?><br>
<div style="margin-left: 320px; font-size: 15px;">
    <label>Nombres: </label><?php echo ucfirst(strtolower($sf_guard_user->getFirstName()." ".$sf_guard_user->getLastName())) ?><br></br>

    <label>Nombre de usuario: </label><?php echo ucfirst(strtolower($sf_guard_user->getUserName())) ?><br></br>

    <label>Email: </label><?php echo ucfirst(strtolower($sf_guard_user->getEmailAddress())) ?><br></br>

    <label>Último login: </label><?php echo ucfirst(strtolower($sf_guard_user->getLastLogin())) ?><br></br>

    <label>Nº de Palabras aportadas: </label><?php echo count($sf_guard_user->getPalabra()) ?><br></br>
    <label>Nº de Test Realizados: </label><?php echo count($sf_guard_user->getTest()) ?><br></br>
    <label>Nº de Documentos: </label><?php echo count($sf_guard_user->getDocumento()) ?><br></br>
     <div style="text-align: right;">
         
         <?php if(Doctrine_Core::getTable('sfGuardUser')->saberEsAmigo($sf_user->getGuardUser()->getId(), $sf_guard_user->id)){ ?>
             <div style="text-align: left;">
        <?php if($sf_guard_user->id==$sf_user->getGuardUser()->getId()){ ?>
                 <a title="Entrar a mi muro"  style="color: black;"  href="<?php echo url_for('publicacionMuro/index') ?>"><img style="width: 90px; height: 90px;" src="<?php echo '/images/iconos/exclamacion.png' ?>"></img><br>Mira que te dicen</a>
    
        
        <?php }else{ ?>
                 <?php if(Doctrine_Core::getTable('sfGuardUser')->saberEsAmigo($sf_user->getGuardUser()->getId(), $sf_guard_user->id)){ ?>

                 <a title="Entrar al muro" style="color: black;"  href="<?php echo url_for('publicacionMuro/indexEntrarMuro?idPerfil='.$sf_guard_user->id) ?>"><img style="width: 90px; height: 90px;" src="<?php echo '/images/iconos/exclamacion.png' ?>"></img>Mira que le dicen<br></a>
                        <?php } ?>
        <?php } ?>
    </div>
         <?php } ?>
         
            <?php

            if($sf_guard_user->id!=$sf_user->getGuardUser()->getId()){
					$imagen_fav = '<a title="Ya es tu amigo" id="icono_favorito_' . $sf_guard_user->id . '" href="javascript:void()" ';

					if (Doctrine_Core::getTable('sfGuardUser')->saberEsAmigo($sf_user->getGuardUser()->getId(), $sf_guard_user->id)) {
						$imagen_fav .= '>';
						$imagen_fav .= image_tag('/images/iconos/amigo.png', array("id" => 'imagen_fav_' . $sf_guard_user->id));
					} else {
						$imagen_fav .= ' onmouseover=document.getElementById("imagen_fav_' . $sf_guard_user->id . '").src="' . image_path('iconos/amigo.png') . '"';
						$imagen_fav .= ' onmouseout=document.getElementById("imagen_fav_' . $sf_guard_user->id . '").src="' . image_path('iconos/no-amigo.png') . '"';
						$imagen_fav .= '>';
						$imagen_fav .= image_tag('/images/iconos/no-amigo.png', array("alt" => 'Añadir a amigos',
                                        "id" => "imagen_fav_" . $sf_guard_user->id,
                                        "title" => 'Añadir a amigos',
                                            
                                        "onclick" => 'javascript:addAmigo("' . url_for('amigo/addAmigo?usuario_id=' . $sf_guard_user->id . '&usuario_id_uno=' . $sf_user->getGuardUser()->getId()) . '","' . image_path('/images/iconos/amigo-si.png') . '",' . $sf_guard_user->id . ')',
						));
					}
					$imagen_fav .= '</a>';
					echo $imagen_fav;
				
            }
				?>
         
         
</div>   

    
</div>
</div>
<div id="ajax-favoritos"></div>
<br></br>
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
