<script type="text/javascript" src="http://vozme.com/get_text.js"></script>
<h1 style="text-align: center;">Estudiar las palabras</h1>
<div id="buscador">
<?php include_partial('estudiar/buscador', array('filtro' => $filtro, 'query' => $query)); ?>
    <br></br>
</div>

<?php if(count($palabras)>0){ ?>
<?php foreach ($palabras->getResults() as $palabra): ?>


<h1 style="text-align: center;"><?php echo $palabra->getTextoPalabra() ?></h1>
<div style="font-size: 15px;">
    
    <label style="color: #003366;">Palabra: </label><?php echo $palabra->getTextoPalabra() ?> <br></br>
    
    <label style="color: #003366;">Categoría: </label><?php echo $palabra->getSubCategoria()->getCategoria()->getTexto(); ?> <br></br> 
            
   <label style="color: #003366;">Sub Categoría: </label><?php echo $palabra->getSubCategoria()->getTexto(); ?> <br></br> 
 
            
    
    <label style="color: #003366;">Definición: </label><p><?php echo $palabra->getTextoDefinicion() ?></p><br></br>   
    

    
	<?php if($palabra->getImagen()){ ?>
    <img style="width: 200px; height: 200px; margin-left: 200px;" src="<?php echo '/uploads/'.$palabra->getImagen() ?>" alt="">
<?php }else{ ?>
<img style="width: 200px; height: 200px; margin-left: 200px;" src="<?php echo '/images/estudiando.png' ?>" alt="">

    <?php } ?>
<br></br>
<button style="background:#ddeeff 
 url(http://vozme.com/img/paper_sound32x32.gif) 
 no-repeat left center; 
 min-height: 35px; 
 font-size:100%; padding:4px 4px 4px 35px;" 
 onclick="get_selection('es','ml');">
Selecciona un texto y<br/>clica aquí para oírlo</button>
<br></br>
    <?php endforeach; ?>

    <?php include_component('bloque', 'bloquePaginador', array('pager' => $palabras, 'action' => $action)) ?>

<?php }else{ ?>

<p style="text-align: center;">No se han encontrado resultados</p>

<?php } ?>
