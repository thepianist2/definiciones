   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Tus definiciones</h1>
<?php } ?>
<?php if(count($palabras)>0){ ?>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nueva palabra', 'default/new', array('title' => 'Nueva palabra')) ?>
  <?php echo link_to(image_tag('iconos/datos.png').'Administrar palabras', 'default/listado', array('title' => 'Listar palabras')) ?>
</div>
<div id="mason-content" class="clearfix masonry" style="min-height: 800px; height: 100%; width: 100%; ">


    <?php foreach ($palabras as $palabra): ?>

<div class="box rounded masonry-brick">
    <div title="Eliminar" style="color: #0A246A;" id="cruz"><?php echo link_to('X', 'default/delete?id='.$palabra->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro que deseas borrar la palabra '.$palabra->getTextoPalabra().'?')) ?></div>
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
<!--<span class="comm"><a href="http://www.allel.es/2012/04/25/programa-de-estudio-de-definiciones-y-test-aleatorio-de-palabras/#comments" title="Comentarios en Definiciones 2.0">1 Comment</a></span>-->
<a class="plusmore" href="<?php echo url_for('default/show?id='.$palabra->getId()) ?>"></a>
</div>
<div class="clear"></div>

    <?php endforeach; ?>

</div>
    <?php }else{   ?>
    <?php if ($sf_user->isAuthenticated()){ ?>
<div style="text-align: center;" ><br></br><br></br>
        <?php echo link_to(image_tag('iconos/administrar.gif','class=imageMenuEstudiar').'<br>Añadir nueva definición', 'default/new', array('title' => 'Agregar nueva palabra definición')) ?>   <br></br> 

        
        
        
</div>
    
    <?php } } ?>
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
    
</script>

