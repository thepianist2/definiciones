    <script type="text/javascript">
	$(document).ready(function() {
	
		jQuery('#acc-menu2').AccordionImageMenu({
		  'border' : 1,
		  'duration': 400,
		  'position': 'vertical',
		  'openDim': 310,
		  'closeDim': 160,
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
    <a href="<?php echo url_for('documento/index') ?>"><span>Documentos</span><img id="imagenMenu" src="/images/documentoff.png" alt="" /></a>   
    <a href="<?php echo url_for('usuario/index') ?>"><span>Usuario</span><img id="imagenMenu" src="/images/usuarioff.png" alt="" /></a>
<!--    <a href="<?php echo url_for('album/index') ?>"><span>Albumes</span><img id="imagenMenu" src="/images/galeriaff.png" alt="" /></a>    -->
</div>    


<style type="text/css">
    #imagenMenu{
    position: absolute;
    width: 150px;
    height: 225px;
}

    
</style>