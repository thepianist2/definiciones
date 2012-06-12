
<h1 style="text-align: center;"><?php echo $album->getDescripcion()." ".$album->getCreatedAt(); ?></h1>
<br></br>
<div style="text-align: center;" >
<?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'album/index', array('title' => 'Volver')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/editar.png').'Editar Album', 'album/edit?id='.$album->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/guardar.png').'Agregar Imágen', 'imagen/new?idAlbum='.$album->id, array('title' => 'Editar')) ?>
</div>
<br></br>

<?php $imagenes=$album->getImagen(); ?>

<?php if(count($imagenes)>0) { ?>

<?php foreach ($imagenes as $imagen) { ?>
    <div id="fotos">
        <h1><?php  echo $imagen->getDescripcion();?></h1>
        <a class="ver" href="javascript:void(0)" id="<?php echo $imagen->id ?>"><img src="<?php echo '/uploads/'.$imagen->getImagen(); ?>" alt="<?php echo $album->getDescripcion(); ?>" title="<?php echo $album->getDescripcion(); ?>" style="width: 150px; height: 150px;"></img></a>    
    <br>
<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'imagen/edit?id='.$imagen->getId(), array('title' => 'Editar')) ?>

    </div>
<?php } ?>

</div>

<?php }else{ ?>


<br></br><br></br><br></br>
<div style="text-align: center;">Este album no tiene imágenes</div>

<?php } ?>
<div id="ver" style="display: none;"></div>


<script type="text/javascript">
    //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
jQuery.noConflict();
          jQuery('.ver').click(function() {
        var id = jQuery(this).attr('id');
        dialog = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('imagen/show?id=') ?>'+id,
            async: false
        }).responseText;
        jQuery('#ver').html(dialog);
        jQuery("#ver").dialog({
            resizable: true,
            width: 900,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Ver imágen'; ?>"
        });
    }); 
    
</script>
