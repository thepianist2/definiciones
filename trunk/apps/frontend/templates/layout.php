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

          
<!--          <h1>-->
          <a href="<?php echo url_for('default/index') ?>"><br></br>
              <img style="margin-top: -30px;" src="/images/logo.png" alt="Estudia con seria" title="Home" />
          </a>

          <!--          </h1>-->
<!-- 
          <div id="sub_header">
            <div class="post">
              <h2>Ask for people</h2>
              <div>
                <a href="<?php echo url_for('default/index') ?>">Post a Job</a>
              </div>
            </div>-->
 
<!--            <div class="search">
              <h2>Ask for a job</h2>
              <form action="" method="get">
                <input type="text" name="keywords"
                  id="search_keywords" />
                <input type="submit" value="search" />
                <div class="help">
                  Enter some keywords (city, country, position, ...)
                </div>
              </form>
            </div>-->

        </div>
      </div>

      <div id="content">

               <?php include_partial('bloque/bloqueMensaje'); ?>
        <div class="content">   
            <?php if ($sf_user->isAuthenticated()){ ?>
            <div style="float: right;"><?php echo link_to(image_tag('iconos/desconectar.png', array('class' => 'cerrar-sesion', 'title' => 'Cerrar sesión')), 'sf_guard_signout', array()) ?></div>
           
            <?php if($sf_request->getParameter('action') == 'index' or $sf_request->getParameter('action') == 'show' or $sf_request->getParameter('action') == 'listado' or $sf_request->getParameter('action') == 'editarUsuario' or $sf_request->getParameter('action') == 'seleccionaUsuario'){ ?>
            <div id="menuIzquierdo">
                
        <?php include_component('bloque', 'menuIzquierdo'); ?>
            </div>
            <?php  } ?>
             <?php }else{ ?>
            
             <div style="float: right;"><?php echo link_to(image_tag('iconos/conectar.png', array('class' => 'cerrar-sesion', 'title' => 'Conectarme')), 'sf_guard_signin', array()) ?></div>

            <?php } ?>
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