<script type="text/javascript">
	$(document).ready(
		function() {
			jd_Menu_init();
                       // Attach an event for testing purposes
                            $('.jd_menu > li').mouseover(
				function() {
                                    var id = $(this).attr('id');
					if ($('> ul', this).size() < 1) {
						$("#content").load(id);
					}
				});
		});
                
                function ver(url){
                   $(document).ready(function() {
                       $("#content").slideUp(function(){
                            $("#content").load(url,function(){
                                $("#content").slideDown(1500);
                            });
                       });
                   });
            }
              
   setTimeout("$('.flash_notice').slideUp(1000);", 2000);
   setTimeout("$('.flash_error').slideUp(1000);", 2000);

</script>

<div id="menu-principal">
<!--<h2>Menú Principal</h2>-->
<a style="color: #FFF;margin-left: 350px;
text-decoration: none;
background: #000;
font: small-caps normal 20px Verdana, Arial, Helvetica, sans-serif;" title="Click para mostrar" id="menuTarget" onclick="jd_Menu_show('#exampleMenu', true);">Mostrar Menú</a>
<ul id="exampleMenu" class="jd_menu" attachto="menuTarget" menuposition="relative bottom left" style="margin-top: 4px;">
	<!-- menuposition may be (relative|absolute) (mb mt ml mr) (bottom left top right) -->
        <li id="<?php echo url_for('usuario/index'); ?>">Usuarios</li>
        <li id="<?php echo url_for('perfil/index'); ?>">Grupos</li>
        <li id="<?php echo url_for('permiso/index'); ?>">Permisos</li>
        <li id="<?php echo url_for('contenido/index'); ?>">Contenido</li>
	<li id="<?php echo url_for('categoriaContenido/index'); ?>">Categorias de contenido</li>
        <li id="<?php echo url_for('categoria/index'); ?>">Categorias Palabras</li>
        <li id="<?php echo url_for('subCategoria/index'); ?>">Subcategorias Palabras</li>
	<li id="<?php echo url_for('default/index'); ?>">Palabras y definiciones</li>
</ul></div>
    
