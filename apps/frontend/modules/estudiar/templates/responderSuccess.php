<script type="text/javascript" src="http://vozme.com/get_text.js"></script>

<form action="<?php echo url_for('estudiar/responder') ?>" method="post" enctype="multipart/form-data">
<h1 style="text-align: center;">Exámen</h1>
<div style="font-size: 15px;">
           <?php echo form_tag('estudiar/responder') ?>
    <label style="color: #003366;">Definición: </label><p id="definicion"><?php echo $palabras[$i]->getTextoDefinicion() ?></p><br></br>   

	<?php if($palabras[$i]->getImagen()){ ?>
   <img style="width: 200px; height: 200px; text-align: center;" src="<?php echo '/uploads/'.$palabras[$i]->getImagen() ?>" alt="">
<?php } ?>
   <br></br>
<a href="javascript:void(0);" 
onclick="get_id('definicion','es','ml');">
Escucha esta definición</a>
   <br></br><br></br>
   <div style="text-align: center;">
    <label for="palabra">Escribe la palabra correspondiente:</label><br/>
        <input type="text" name="palabraTexto" id="palabraTexto"><br/><br>
        <input type="submit" value="Responder">
        </div>
</div>
</form>