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
<div style="text-align: center;">
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'estudiar/index', array('title' => 'Volver')) ?>
</div>
<br></br>
<form name="categorias" id="buscador-eventos" action="<?php echo url_for('estudiar/buscarCategoria') ?>" method="post">
	<h2 class="titulo" style="margin-left:10px; margin-top:2px; margin-right:10px; float:left;">Selecciona por categoria</h2>

               <SELECT NAME="filtro" SIZE="1" style="width: 100px; " onChange="javascript:abreSitio()">
                <OPTION VALUE="0">Todas</OPTION>
   
        <?php foreach ($categorias as $categoria) { ?>
                      <OPTION VALUE="<?php echo $categoria->id; ?>" <?php echo ($filtro == $categoria->id ? 'selected' : '')?>><?php echo $categoria->getTexto(); ?></OPTION>
                           <?php   } ?>
                              

                </SELECT>
        

	
</form>


<div style="margin-left: 200px;">
    <?php if(count($palabras)>0){ ?>
<form action="<?php echo url_for('estudiar/accionSeleccionados')?>">
<p><input name="Todos" type="checkbox" value="1" class="check_todos"/>Todas las palabras</p>
<p>
    <?php foreach ($palabras as $palabra) { ?>
<div style="float: left;"><input name="palabra[<?php echo $palabra->id ?>]" type="checkbox" value="1" class="ck"/><?php echo $palabra->getTextoPalabra(); ?></div>

                      
   <?php  } ?>

</p>
<br></br><br></br><br></br><br></br><br></br><br></br>
<button style="float: right;" type="submit">Comenzar test</button>
</form>
    <br></br>
    
    <?php }else{ ?>
    <p style="font-size: 15px;; text-align: center;">No se han encontrado palabras</p>
    <?php } ?>
    
</div>
<div style="text-align: center;">
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'estudiar/index', array('title' => 'Volver')) ?>
</div>
<script  type="text/javascript">

    
    function abreSitio(){
//var web = document.categorias.filtro.options[document.categorias.filtro.selectedIndex].value;
document.categorias.submit();
}
    
//    
//    jQuery("input#campo_busqueda").keyup(function () {
//        
//              setTimeout("buscar()",1500)
//              
//            });
//            
//            
//               function buscar(){
//                document.forms[0].submit();
//                    
//
//            }
//            
//            

</script>