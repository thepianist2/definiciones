<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Estudia con seria</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header" >

          <a href="<?php echo url_for('default/index') ?>"><br></br>
              <img style="margin-top: -30px;" src="/images/logo.png" alt="Estudia con seria" title="Home" />
          </a>

        </div>
      </div>
      

      <div id="content" ><?php if (!$sf_user->isAuthenticated()){ ?></br>
               
            <?php include_component('bloque', 'bloqueMenus'); ?>
                
              <?php  }?>
               <?php include_partial('bloque/bloqueMensaje'); ?>
        <div class="content">   
            <?php if ($sf_user->isAuthenticated()){ ?>
            <div style="float: right;"><?php echo link_to(image_tag('iconos/desconectar.png', array('class' => 'cerrar-sesion', 'title' => 'Cerrar sesión')), 'sf_guard_signout', array()) ?></div>
           
            <?php if($sf_request->getParameter('action') == 'index' or $sf_request->getParameter('action') == 'show' or $sf_request->getParameter('action') == 'listado' or $sf_request->getParameter('action') == 'editarUsuario' or $sf_request->getParameter('action') == 'seleccionaUsuario' or $sf_request->getParameter('action') == 'configurarTest'){ ?>
            <div id="menuIzquierdo">
                
        <?php include_component('bloque', 'menuIzquierdo'); ?>
            </div>
            <?php  } ?>
             <?php }else{ ?>
            

             <?php if($sf_request->getParameter('action') == 'index' and $sf_request->getParameter('module') == 'default' ){ ?>
        <?php include_component('bloque', 'bloqueCarrusel'); ?>
            <?php include_component('bloque', 'bloqueDefiniciones'); ?>
            <?php } } ?>
          <?php echo $sf_content ?>
            
        </div>
      </div>
 
      <div id="footer">
        <div class="content">
            <?php $ano=date('Y') ?> 
            Copyright © <?php echo $ano ?> <a style="color: green;" target="_blank" href="http://www.allel.es" title="Allel Software Free">Allel Software Free</a> - Desarrollo de programas grátis.    
            
        </div>
      </div>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<!--<script type="text/javascript">var plugChatInTheme = "dot-luv";</script>
<script type="text/javascript" src="http://static.plugchat.in/js/plugchatin-en.min.js"></script>-->
  </body>
</html>