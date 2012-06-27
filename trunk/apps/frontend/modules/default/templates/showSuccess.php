<script type="text/javascript" src="http://vozme.com/get_text.js"></script>

<h1 style="text-align: center;"><?php echo $palabra->getTextoPalabra() ?></h1>
<div style="font-size: 15px;">
    
    <label style="color: #003366;">Palabra: </label><?php echo $palabra->getTextoPalabra() ?> <br></br>
    
    <label style="color: #003366;">Categoría: </label><?php echo $palabra->getSubCategoria()->getCategoria()->getTexto(); ?> <br></br> 
            
   <label style="color: #003366;">Sub Categoría: </label><?php echo $palabra->getSubCategoria()->getTexto(); ?> <br></br> 
 
            
    
    <label style="color: #003366;">Definición: </label><p><?php echo $palabra->getTextoDefinicion() ?></p><br></br>   
    
    
    
	<?php if($palabra->getImagen()){ ?>
    <a target="_blank" href="<?php echo '/uploads/'.$palabra->getImagen() ?>"> <img style="width: 200px; height: 200px; margin-left: 200px;" src="<?php echo '/uploads/'.$palabra->getImagen() ?>" alt=""></a>
<?php }else{ ?>
    <a target="_blank" href="/images/estudiando.png"><img style="width: 200px; height: 200px; margin-left: 200px;" src="<?php echo '/images/estudiando.png' ?>" alt=""></a>

    <?php } ?>
</div>
<div id="ajax-favoritos"></div>
<br></br>
<button style="background:#ddeeff 
 url(http://vozme.com/img/paper_sound32x32.gif) 
 no-repeat left center; 
 min-height: 35px; 
 font-size:100%; padding:4px 4px 4px 35px;" 
 onclick="get_selection('es','ml');">
Selecciona un texto y<br/>clica aquí para oírlo</button>
<br></br><br></br><br></br><br></br>

<?php if ($sf_user->isAuthenticated() and $palabra->getIdUsuario()!=$sf_user->getGuardUser()->getId()){ ?>


        		<?php

					$imagen_fav = '<a id="icono_favorito_' . $palabra->id . '" href="javascript:void()" ';

					if ($palabra->getIdUsuario()==$sf_user->getGuardUser()->getId()) {
						$imagen_fav .= '>';
						$imagen_fav .= image_tag('/images/iconos/icono_favorito.png', array("id" => 'imagen_fav_' . $palabra->id));
					} else {
						$imagen_fav .= ' onmouseover=document.getElementById("imagen_fav_' . $palabra->id . '").src="' . image_path('iconos/icono_anadir-favorito.png') . '"';
						$imagen_fav .= ' onmouseout=document.getElementById("imagen_fav_' . $palabra->id . '").src="' . image_path('iconos/icono_no-favorito.png') . '"';
						$imagen_fav .= '>';
						$imagen_fav .= image_tag('/images/iconos/icono_no-favorito.png', array("alt" => 'Añadir a favoritos',
                                        "id" => "imagen_fav_" . $palabra->id,
                                        "title" => 'Añadir a favoritos',
                                        "class" => 'favoritos',            
                                        "onclick" => 'javascript:addFavorito("' . url_for('default/addFavorito?palabra_id=' . $palabra->id . '&usuario_id=' . $sf_user->getGuardUser()->getId()) . '","' . image_path('/images/iconos/icono_favorito.png') . '",' . $palabra->id . ')',
						));
					}
					$imagen_fav .= '</a>';
					echo $imagen_fav;
				
				?>


<?php } ?>



<?php if ($sf_user->isAuthenticated() and $palabra->getIdUsuario()==$sf_user->getGuardUser()->getId()){ ?>
<div style="text-align: center;" >
<?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'default/index', array('title' => 'Volver')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'default/edit?id='.$palabra->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/pdf.png').'Exportar a pdf', 'default_exportarPdf', $palabra, array('title' => 'Exportar a PDF', 'target'=>'_blank')) ?>
</div><br></br>
<?php } ?>


<script type="text/javascript">
function addFavorito(url,imagen,id_inmueble)
{
    if( jQuery('#imagen_fav_'+id_inmueble).attr('src') != imagen) {
        if (confirm("¿Desea añadir esta palabra a sus palabras?")) {
            jQuery('#ajax-favoritos').load(url,{},function() {
                jQuery('#imagen_fav_'+id_inmueble).attr('src',imagen);
                jQuery('#icono_favorito_'+id_inmueble).attr('onmouseover','');
                jQuery('#icono_favorito_'+id_inmueble).attr('onmouseout','');
            });
        }      
    }
}



    
</script>