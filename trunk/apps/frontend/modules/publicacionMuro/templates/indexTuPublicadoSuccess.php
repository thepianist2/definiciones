<?php
$acumulador=0;
foreach ($publicacion_muros as $publicacion) { 
$acumulador+= strlen($publicacion->getPublicacion())+15;
} ?>

<!--<div id="ajax-favoritos">-->
<style>

ol {
	margin: 0;
	padding: 0;
	list-style: none;
}

.comentario {
	float: left; /* float contenedor */
	width: 580px;
	margin: 0 0 20px 0;
	
}

.comentario-meta {
	float: left;
	width: 100px;
	font-size: 84%;
	text-align: center;
	text-shadow: 1px 1px 0 hsla(0,0%,0%,.9);
}

.comentario-meta img {
-moz-transform: rotate(-5deg);
-o-transform: rotate(-5deg);
-webkit-transform: rotate(-5deg);
transform: rotate(-5deg);
}

h4 {
	margin: 0;
	font-size: 100%;
	color:#FF3;
	font-weight: bold;
	line-height: 1;
}

.comentario-meta span {
	font-size: 84%;
	color: #fff;
	font-weight:bold;
}

blockquote {
	position: relative;
	min-height: 42px;
	margin: 0 0 0 112px;
	padding: 10px 15px 5px 15px;
	-moz-border-radius: 20px;
	-webkit-border-radius: 20px;
	border-radius: 20px;
	border-top: 1px solid #fff;
	background-color: hsla(39, 90%, 50%, .5);
	background-image: -moz-linear-gradient(hsla(0,0%,100%,.6),hsla(0,0%,100%,0) 30px );
	background-image: -webkit-gradient(linear,0 0, 0 30,from(hsla(0,0%,100%,.6)),to(hsla(0,0%,100%,0)));
	-moz-box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);
    -webkit-box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);
    box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);		
	word-wrap:break-word;
		
}

blockquote p {
	margin: 0;
	padding: 0 0 10px 0;
}

blockquote:hover {
top: -2px;
left: -2px;
-moz-box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
-webkit-box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
text-shadow: 3px 1px 1px hsla(0,0%,100%,.8);
}

#elm1{
    width: 600px;
}
.comentario-meta :hover{
    	-moz-transform: scale(1.8, 1.8);
	-webkit-transform: scale(1.8, 1.8);
	-o-transform: scale(1.8, 1.8);
}

#noHover :hover{
    	-moz-transform: scale(0.5, 0.5);
	-webkit-transform: scale(0.5, 0.5);
	-o-transform: scale(0.5, 0.5);
}

#noHover img {
-moz-transform: rotate(-1deg);
-o-transform: rotate(-1deg);
-webkit-transform: rotate(-1deg);
transform: rotate(-1deg);
}

blockquote:after {
	content: "\00a0";
	display: block;
	position: absolute;
	top: 20px;
	left: -20px;
    width: 0;
    height: 0;
	border-width: 10px 20px 10px 0;
	border-style: solid;
	border-color: transparent hsla(39, 90%, 50%, .5); transparent transparent;  
}
</style>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
        
               //cargamos el mapa
$(document).ready(function() {
        
});
        
            </script>


<h1 style="text-align: center">Que dices a los demás</h1>
<div style="text-align: center;">
      <?php echo link_to(image_tag('iconos/respuesta.png').'Que te dicen', 'publicacionMuro/index', array('title' => 'Lo que te han publicado')) ?>
      <?php echo link_to(image_tag('iconos/mundo.png').'Que dicen tus amigos', 'publicacionMuro/indexAmigos', array('title' => 'Publicaciones amigos')) ?>

</div>
<?php include_partial('publicacionMuro/buscadorTuPublicado', array('fecha'=> $fecha, 'query' => $query)); ?>

<br></br><br></br>

    <?php include_component('bloque', 'bloquePaginador', array('pager' => $publicacion_muros, 'action' => $action)) ?>



<div id="eliminar-comen"></div>
   
<div id="comentarios" style="min-height: 2000px; margin-bottom: 300px;   height:<?php $alto=$acumulador*2; echo $alto.'px'; ?>">  
<br>
    <?php foreach ($publicacion_muros as $publicacion) { ?>
    
<ol id="<?php echo $publicacion->id ?>">
    <li class="comentario">
        
        <?php if($publicacion->getSfGuardUser()->getId()==$publicacion->getIdUsuarioEscribe()){ ?>
        
       <a href="<?php echo url_for('usuario/show?id='.$publicacion->getSfGuardUser()->getId()) ?>">
           <div class="comentario-meta" title="<?php echo $publicacion->getSfGuardUser()->getUserName(); ?>">
             <?php if($publicacion->getSfGuardUser()->getImagenPerfil()){ ?>
         	<img src="<?php echo '/uploads/'.$publicacion->getSfGuardUser()->getImagenPerfil(); ?>" width="59" height="85" alt="">     
<?php }else{ ?>
           <img src="<?php echo '/images/imagenPerfil.jpg'; ?>" width="59" height="85" alt="">     
<?php } ?>
         
         
 <?php if($publicacion->getSfGuardUser()->id==$sf_user->getGuardUser()->getId()){ ?>
     	<h4><?php echo 'Yo';  ?></h4>
           <?php }else{ ?>
     	<h4><?php echo $publicacion->getSfGuardUser()->getUserName();  ?></h4>
  <?php } ?>
        
     	<span><?php echo $publicacion->getCreatedAt();  ?></span>          
      </div>
       </a>
              <blockquote>
                  <?php if($sf_user->getGuardUser()->getId()==$publicacion->getIdUsuario()){ ?>
          <div title="Eliminar" style="color: #0A246A; float: right;" id="cruz"><a id="<?php echo $publicacion->id ?>" class="borrarComentario" onclick="javascript:eliminarComentario('<?php echo url_for('publicacionMuro/delete?id='.$publicacion->id) ?>',<?php echo $publicacion->id ?>)" href="javascript:void(0);">X</a></div>
          <?php } ?>
         <p><?php echo nl2br(html_entity_decode($publicacion->getPublicacion(), ENT_COMPAT , 'UTF-8')); ?></p>
         <?php if($publicacion->getArchivo()){ ?>
         <a target="_blank" href="<?php echo '/uploads/'.$publicacion->getArchivo(); ?>"><p>Enlace a archivo</p></a>
         <?php } ?>
</blockquote>
        
        <!--visualizar mensaje entre amigos -->
        <?php }else{ ?>
        
               <a href="<?php echo url_for('usuario/show?id='.$publicacion->getSfGuardUser()->getId()) ?>">
           <div class="comentario-meta" title="<?php echo $publicacion->getSfGuardUser()->getUserName(); ?>">
             <?php if($publicacion->getSfGuardUser()->getImagenPerfil()){ ?>
         	<img src="<?php echo '/uploads/'.$publicacion->getSfGuardUser()->getImagenPerfil(); ?>" width="59" height="85" alt="">     
<?php }else{ ?>
           <img src="<?php echo '/images/imagenPerfil.jpg'; ?>" width="59" height="85" alt="">     
<?php } ?>
         
         
 <?php if($publicacion->getSfGuardUser()->id==$sf_user->getGuardUser()->getId()){ ?>
     	<h4><?php echo 'Yo';  ?></h4>
           <?php }else{ ?>
     	<h4><?php echo $publicacion->getSfGuardUser()->getUserName();  ?></h4>
  <?php } ?>
        
     	<span><?php echo $publicacion->getCreatedAt();  ?></span>          
           
        <a href="javascript:void(0);"><div id="noHover" style="float: left; margin-top: 20px; margin-bottom: 20px;"><img title="Escrita a?" src="<?php echo '/images/flecha.png'; ?>" width="60" height="150" alt=""></div>   </a> 

           
           </div>
               </a>
     
        
        
          <blockquote>
                  <?php if($sf_user->getGuardUser()->getId()==$publicacion->getIdUsuario()){ ?>
          <div title="Eliminar" style="color: #0A246A; float: right;" id="cruz"><a id="<?php echo $publicacion->id ?>" class="borrarComentario" onclick="javascript:eliminarComentario('<?php echo url_for('publicacionMuro/delete?id='.$publicacion->id) ?>',<?php echo $publicacion->id ?>)" href="javascript:void(0);">X</a></div>
          <?php } ?>
         <p><?php echo nl2br(html_entity_decode($publicacion->getPublicacion(), ENT_COMPAT , 'UTF-8')); ?></p>
         <?php if($publicacion->getArchivo()){ ?>
         <a target="_blank" href="<?php echo '/uploads/'.$publicacion->getArchivo(); ?>"><p>Enlace a archivo</p></a>
         <?php } ?>
          </blockquote>    
        
        
        
        <?php $usuarioLeEscribe=Doctrine_Core::getTable('sfGuardUser')->obtenerById($publicacion->getIdUsuarioEscribe()); ?>
               <a href="<?php echo url_for('usuario/show?id='.$usuarioLeEscribe->id) ?>">
                   <div class="comentario-meta" style="float: none;" title="<?php echo $usuarioLeEscribe->getUserName(); ?>">
             <?php if($usuarioLeEscribe->getImagenPerfil()){ ?>
         	<img src="<?php echo '/uploads/'.$usuarioLeEscribe->getImagenPerfil(); ?>" width="59" height="85" alt="">     
<?php }else{ ?>
           <img src="<?php echo '/images/imagenPerfil.jpg'; ?>" width="59" height="85" alt="">     
<?php } ?>
         
         
 <?php if($usuarioLeEscribe->id==$sf_user->getGuardUser()->getId()){ ?>
     	<h4><?php echo 'Yo';  ?></h4>
           <?php }else{ ?>
     	<h4><?php echo $usuarioLeEscribe->getUserName();  ?></h4>
  <?php } ?>
        
     	<span><?php echo $publicacion->getCreatedAt();  ?></span>          
      </div>
       </a>
        
        <?php } ?>

   </li>
</ol>
<?php } ?>
<br></br><br></br>
<div style="margin-top: 465px;">
<br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $publicacion_muros, 'action' => $action)) ?>
<br></br>
</div>
</div>

<script type="text/javascript">

    function eliminarComentario(url,idComentario){
                if (confirm("¿Desea eliminar esta publicación?")) {
           $('#eliminar-comen').load(url,{},function() {  
               $('#'+idComentario).css('display','none');
        }); 
        
   }
 }

</script>

