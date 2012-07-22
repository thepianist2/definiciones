<script type="text/javascript">

    jQuery(window).load(function () {
  document.forms[0].query.focus();
  document.forms[0].query.selectionStart=jQuery("#campo_busqueda").get(0).value.length;

});
</script>

<br></br>
<form title="Puedes buscar por fecha, por dia, o por los dos" id="buscador-eventos" action="<?php echo url_for('publicacionMuro/buscarMuroAmigos') ?>" method="post">
            		
		<input size="35" type="text" x-webkit-speech name="query"
			value="<?php echo $query ?>"
			id="campo_busqueda" />
                <input value="<?php echo $fecha ?>" name="fecha" type="date">
                <input class="boton" title="buscar" id="enviar-busqueda" style="margin-left:5px;" type="image" src="/images/iconos/buscar.png" value="Buscar" />
        

	
</form>

