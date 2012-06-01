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
<h1 style="text-align: center;">Configura tu test</h1>
<br></br>
<div style="margin-left: 200px;">
<form>
<p><input name="Todos" type="checkbox" value="1" class="check_todos"/>Todas las palabras</p>
<p>
  <input name="elemento1" type="checkbox" value="1" class="ck"/>elemento 1<br />
  <input name="elemento2" type="checkbox" value="2" class="ck"/>elemento 2<br />
  <input name="elemento3" type="checkbox" value="3" class="ck"/>elemento 3<br />
  <input name="elemento4" type="checkbox" value="4" class="ck"/>elemento 4<br />
  <input name="elemento5" type="checkbox" value="5" class="ck"/>elemento 5</p>
<p>El siguiente check no se verá afectado</p>
	<input name="elemento5" type="checkbox" value="5" />elemento n
</form>
    
</div>