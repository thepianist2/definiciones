<h1 style="text-align: center;"><?php echo $palabra->getTextoPalabra() ?></h1>
<div style=" font-family: Wingdings, 'Zapf Dingbats', sans-serif; font-size: 15px;">
    
    <label style="color: #003366;">Palabra: </label><?php echo $palabra->getTextoPalabra() ?> <br></br>
    
    <label style="color: #003366;">Categoría: </label><?php echo $palabra->getSubCategoria()->getCategoria()->getTexto(); ?> <br></br> 
            
   <label style="color: #003366;">Sub Categoría: </label><?php echo $palabra->getSubCategoria()->getTexto(); ?> <br></br> 
 
            
    
    <label style="color: #003366;">Definición: </label><p><?php echo $palabra->getTextoDefinicion() ?></p><br></br>   
    
    
    
	<?php if($palabra->getImagen()){ ?>
    <img style="width: 200px; height: 200px; margin-left: 200px;" src="<?php echo '/uploads/'.$palabra->getImagen() ?>" alt="">
<?php }else{ ?>
<img style="width: 200px; height: 200px; margin-left: 200px;" src="<?php echo '/images/estudiando.png' ?>" alt="">

    <?php } ?>


<br></br><br></br><br></br><br></br>
<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'default/index', array('title' => 'Volver')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'default/edit?id='.$palabra->getId(), array('title' => 'Editar')) ?>
</div>