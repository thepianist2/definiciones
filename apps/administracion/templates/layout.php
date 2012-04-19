<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Administración Definiciones</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
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
          <div style="float: right;"><?php echo link_to('Desconectarse', 'sf_guard_signout') ?></div>
          <div style="text-align: center;"><?php include_component('bloque', 'menuPrincipal'); ?></div>
          <?php } ?>
      </div>
 
 
      <div id="content">
        <?php echo $sf_content ?>
      </div>
 
      <div id="footer">
      </div>
    </div>
  </body>
</html>