   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Todas las definiciones de seria y sus usuarios</h1>
<br>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/atras.png').'Volver a mis palabras', 'default/index', array('title' => 'Volver a mis palabras')) ?>

</div>
<?php } ?>
<?php if(count($palabras)>0){ ?>
<div id="buscador">
<?php include_partial('default/buscador', array('filtro' => $filtro, 'query' => $query)); ?>
    <div class="clear"></div>
</div>
       <br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $palabras, 'action' => $action)) ?>

<div id="mason-content" class="clearfix masonry" style="min-height: 800px; height: 100%; width: 100%; ">


    <?php foreach ($palabras as $palabra): ?>

    <div class="box rounded masonry-brick" id="<?php echo $palabra->id ?>">
	<h1><?php echo $palabra->obtenerTextoCortoPalabra() ?></h1> 

	<?php if($palabra->getImagen()){ ?>
    <a class="ver" href="javascript:void(0)" id="<?php echo $palabra->id ?>"><img class="postimg" src="<?php echo '/uploads/'.$palabra->getImagen() ?>" alt=""></a>
<?php }else{ ?>
        <a class="ver" href="javascript:void(0)" id="<?php echo $palabra->id ?>"><img class="postimg" src="<?php echo '/images/estudiando.png' ?>" alt=""></a>

    <?php } ?>
<div class="title">
	<h2><a class="ver" href="javascript:void(0)" id="<?php echo $palabra->id ?>"><?php echo $palabra->obtenerTextoCortoPalabra(); ?></a></h2>
</div>

<div class="entry">
    <p style="color: white;"><?php echo $palabra->obtenerTextoCorto()  ?><a class="rmore" href="<?php echo url_for('default/show?id='.$palabra->getId()) ?>">&nbsp;&nbsp; Leer más ...</a></p><div class="clear"></div>
</div>
        
        
        		<?php
				if ($sf_user->isAuthenticated()) {
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
				}
				?>
        
	</div>
<div class="clear"></div>

    <?php endforeach; ?>

</div>
    <?php }else{ ?>

<div id="buscador">
<?php include_partial('default/buscador', array('filtro' => $filtro, 'query' => $query)); ?>
    <div class="clear"></div>
</div>
<p style="text-align: center; font-size: 15px;">No se han encontrado definiciones de otros usuarios</p>

<?php } ?>

        <br/>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $palabras, 'action' => $action)) ?>
<br></br>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/atras.png').'Volver a mis palabras', 'default/index', array('title' => 'Volver a mis palabras')) ?>

</div><br></br>
<div id="ver" style="display: none;"></div>
<div id="ajax-favoritos"></div>
<script type="text/javascript">
    //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
jQuery.noConflict();
          jQuery('.ver').click(function() {
        var id = jQuery(this).attr('id');
        dialog = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('default/show?id=') ?>'+id,
            async: false
        }).responseText;
        jQuery('#ver').html(dialog);
        jQuery("#ver").dialog({
            resizable: true,
            width: 900,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Ver definición'; ?>"
        });
    }); 
    
    
jQuery('.ver').mouseover(function() {
        var id = jQuery(this).attr('id');
        id="#"+id;
    jQuery(id).css({backgroundColor: "deepskyblue" });
    });
    
    jQuery('.ver').mouseout(function() {
        var id = jQuery(this).attr('id');
        id="#"+id;
    jQuery(id).css({backgroundColor: "darkCyan" });
    });    
    


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

