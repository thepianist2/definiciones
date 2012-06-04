<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script language="javascript">
        //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
jQuery.noConflict();
 jQuery(document).ready(function(){
   jQuery(".check_todos").click(function(event){
     if(jQuery(this).is(":checked")) {
	 	jQuery(".ck:checkbox:not(:checked)").attr("checked", "checked");
	 }else{
		 jQuery(".ck:checkbox:checked").removeAttr("checked");
	 }
   });
 });
</script>
<h1 style="text-align: center;">Primero configura tu test</h1>
<br></br>
<div style="text-align: center; font-size: 20px;">Selecciona las palabras que quieres estudiar.</div>
<br></br>
<div style="margin-left: 200px;">
<form action="<?php echo url_for('estudiar/accionSeleccionados')?>">
<p><input name="Todos" type="checkbox" value="1" class="check_todos"/>Todas las palabras</p>
<p>
    <?php foreach ($palabras as $palabra) { ?>
          <input name="palabra[<?php echo $palabra->id ?>]" type="checkbox" value="1" class="ck"/><?php echo $palabra->getTextoPalabra(); ?><br />

   <?php  } ?>

</p>

<button type="submit">Hacer test</button>
</form>
    <br></br>
    
</div>