<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>

<br></br>
<form id="buscador-eventos" action="<?php echo url_for('estudiar/buscar') ?>" method="post">
	<h2 class="titulo" style="margin-left:10px; margin-top:2px; margin-right:10px; float:left;">Buscador</h2>
            		
		<input size="35" type="text" name="query"
			value="<?php echo $query ?>"
			id="campo_busqueda" />
                          <SELECT NAME="filtro" SIZE="1" style="width: 100px;">
                        <OPTION VALUE="2" <?php echo ($filtro == 2 ? 'selected' : '')?> >Palabra</OPTION>
                        <OPTION VALUE="3" <?php echo ($filtro == 3 ? 'selected' : '')?> >Definición</OPTION>

                </SELECT>
                <input class="boton" id="enviar-busqueda" style="margin-left:5px;" type="image" src="/images/iconos/buscar.png" value="Buscar" />
        

	
</form>

<script  type="text/javascript">

    
    
    jQuery("input#campo_busqueda").keyup(function () {
        
              setTimeout("buscar()",1500)
              
            });
            
            
               function buscar(){
                document.forms[0].submit();
                    

            }
            
            

</script>
