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
        <?php if ($sf_user->hasFlash('mensajeTerminado')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('mensajeTerminado') ?>
          </div>
        <?php endif; ?>
 
        <?php if ($sf_user->hasFlash('mensajeError')): ?>
          <div class="flash_error">
            <?php echo $sf_user->getFlash('mensajeError') ?>
          </div>
        <?php endif; ?>
 
        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>
 
      <div id="footer">
        <div class="content">
            <?php $ano=date('Y') ?> 
            Copyright © <?php echo $ano ?> <a style="color: green;" target="_blank" href="http://www.allel.es" title="Allel Software Free">Allel Software Free</a> - Desarrollo de programas grátis.    
            
        </div>
      </div>

  </body>
</html>