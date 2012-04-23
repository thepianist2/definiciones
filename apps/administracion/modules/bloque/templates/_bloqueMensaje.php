<script type="text/javascript">
              
   setTimeout("$('.flash_notice').slideUp(1000);", 2000);
   setTimeout("$('.flash_error').slideUp(1000);", 2000);

</script>   



     <?php if ($sf_user->hasFlash('mensajeTerminado')): ?>
            <div class="flash_notice"><?php echo $sf_user->getFlash('mensajeTerminado') ?></div>
           <?php $sf_user->setFlash('mensajeTerminado',null); ?>
        <?php endif; ?>
        <?php if ($sf_user->hasFlash('mensajeError')): ?>
            <div class="flash_error"><?php echo $sf_user->getFlash('mensajeError') ?></div>
        <?php $sf_user->setFlash('mensajeError',null); ?>
                    <?php endif; ?>    