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
        
        
        
        
        <a title="Agregar a mis definiciones" href="<?php echo url_for('default/addFavorito?palabra_id=' . $palabra->id . '&usuario_id=' . $sf_user->getGuardUser()->getId()) ?>"><img onmouseout="this.src='/images/iconos/icono_favorito_no.png';" onmouseover="this.src='/images/iconos/icono_anadir-favorito.png';" style="height: 20px; width: 20px;" src="/images/iconos/icono_favorito_no.png"></img></a>
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
<div id="ver" style="display: none;"></div>

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
    

    
</script>

