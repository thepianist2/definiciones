<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Administración Definiciones</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
    <script type="text/javascript">
$(document).ready(function() {
    $('.cerrar-sesion').mouseover(function() {
    $('#header').next().fadeToggle(1000);
  });
  
    $('.cerrar-sesion').mouseout(function() {
        $('#header').next().fadeIn('slow');
  });
});
    </script>
    
    
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1>
          <a href="<?php echo url_for('homepage') ?>">
              <img src="/images/logo.jpg" alt="Definiciones" title="Definiciones" />
          </a>  
        </h1>
          <?php if ($sf_user->isAuthenticated()){ ?>
          <div style="float: left; color: #cd0a0a;"><?php echo "Bienvenido ".$sf_user->getUserName() ?></div>
          <div style="float: right;"><?php echo link_to(image_tag('iconos/desconectar.png', array('class' => 'cerrar-sesion', 'title' => 'Cerrar sesión')), 'sf_guard_signout', array()) ?></div><br></br>
          <div><?php include_component('bloque', 'menuPrincipal'); ?></div>
          <?php } ?>
          
      </div>
 <br></br><br></br><br></br><br></br>
 
      <div id="content">
          <?php include_partial('bloque/bloqueMensaje'); ?>
        <?php echo $sf_content ?>
      </div>
 
      <div id="footer">
      </div>
    </div>
  </body>
</html>