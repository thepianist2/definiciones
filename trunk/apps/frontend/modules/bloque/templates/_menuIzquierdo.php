    <script type="text/javascript">
	$(document).ready(function() {
	
		jQuery('#acc-menu2').AccordionImageMenu({
		  'border' : 1,
		  'duration': 600,
		  'position': 'vertical',
		  'openDim': 280,
		  'closeDim': 100,
		  'effect': 'easeOutQuint',
		  'fadeInTitle': false,
		  'height':400,
                  'width':150
		});	
		
	});
    </script>
    
    
    
<h1>Menu</h1>

<div id="acc-menu2" style="margin:2px auto">
    <a href="<?php echo url_for('default/index') ?>"><span>Definiciones</span><img id="imagenMenu" src="/images/Definicionesff.png" alt="Definiciones" title="Definiciones" /></a>
    <a href="<?php echo url_for('estudiar/index') ?>"><span>Estudiar</span><img id="imagenMenu" src="/images/estudiarff.png" alt="Estudiar" title="Estudiar" /></a>
    <a href="<?php echo url_for('documento/index') ?>"><span>Documentos</span><img id="imagenMenu" src="/images/documentoff.png" alt="Documentos" /></a>   
    <a href="<?php echo url_for('usuario/editarUsuario') ?>"><span>Usuario</span><img id="imagenMenu" src="/images/usuarioff.png" alt="Configuracion usuario" /></a>
    <a href="<?php echo url_for('mensaje/index') ?>"><span>Mensajes</span><img id="imagenMenu" src="/images/cartff.png" alt="Mensajes" /></a>
    <a href="<?php echo url_for('amigo/index') ?>"><span>Amigos</span><img id="imagenMenu" src="/images/amigosff.png" alt="Amigos" /></a>
    <a href="<?php echo url_for('publicacionMuro/index') ?>"><span>Muro</span><img id="imagenMenu" src="/images/comunicarff.png" alt="Muro" /></a>
    <a href="<?php echo url_for('piso/index') ?>"><span>Alquiler viviendas</span><img id="imagenMenu" src="/images/pisosff.png" alt="Alquiler viviendas" /></a>

<!--    <a href="<?php echo url_for('album/index') ?>"><span>Albumes</span><img id="imagenMenu" src="/images/galeriaff.png" alt="" /></a>    -->
</div>    


<style type="text/css">
    #imagenMenu{
    position: absolute;
    width: 150px;
    height: 225px;
}

    
</style>