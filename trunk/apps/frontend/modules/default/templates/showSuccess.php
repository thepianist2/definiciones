<script type="text/javascript" src="http://vozme.com/get_text.js"></script>

<h1 style="text-align: center;"><?php echo $palabra->getTextoPalabra() ?></h1>
<div style=" font-family: Wingdings, 'Zapf Dingbats', sans-serif; font-size: 15px;">
    
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
<button style="background:#ddeeff 
 url(http://vozme.com/img/paper_sound32x32.gif) 
 no-repeat left center; 
 min-height: 35px; 
 font-size:100%; padding:4px 4px 4px 35px;" 
 onclick="get_selection('es','ml');">
Selecciona un texto y<br/>clica aquí para oírlo</button>
<br></br><br></br><br></br><br></br>
<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'default/index', array('title' => 'Volver')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'default/edit?id='.$palabra->getId(), array('title' => 'Editar')) ?>
</div><br></br>