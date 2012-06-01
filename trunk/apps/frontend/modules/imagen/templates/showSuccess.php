<h1 style="text-align: center;"><?php echo $imagen->getDescripcion()." ".$imagen->getCreatedAt(); ?></h1>


<div>
<a target="_blank" href="<?php echo '/uploads/'.$imagen->getImagen(); ?>"><img style="width: 700px; height: 700px;" src="<?php echo '/uploads/'.$imagen->getImagen(); ?>"></img></a>

</div>


<br></br><br></br><br></br><br></br>
<div style="text-align: center;" >
<?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'album/show?id='.$imagen->getIdAlbum(), array('title' => 'Volver')) ?>

&nbsp;
<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'imagen/edit?id='.$imagen->getId(), array('title' => 'Editar')) ?>
</div><br></br>
