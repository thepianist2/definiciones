<h1 style="text-align: center;">Albumes</h1>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo album', 'album/new', array('title' => 'Nuevo album')) ?>
</div>
<br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $albums, 'action' => $action)) ?>
<br></br>


<div>
    
        <?php foreach ($albums as $album):  ?>
    
    <?php  $foto=$album->getImagen(); ?>
    <div id="albumes">
        <h1><?php echo 'Album: '.$album->getDescripcion(); ?></h1>
	<?php if($foto[0]->getImagen()){ ?>
    <a href="<?php echo url_for('album/show?id='.$album->getId()) ?>"><img class="postimg" src="<?php echo '/uploads/'.$foto[0]->getImagen() ?>" alt=""></a>
<?php }else{ ?>
        <a href="<?php echo url_for('album/show?id='.$album->getId()) ?>"><img class="postimg" src="<?php echo '/images/album.jpg' ?>" alt=""></a>

    <?php } ?>
        <br>
        <?php echo link_to(image_tag('iconos/editar.png').'Editar', 'album/edit?id='.$album->getId(), array('title' => 'Editar')) ?>

    </div>
    <?php endforeach; ?>
<br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $albums, 'action' => $action)) ?>
<br></br>       
</div>




