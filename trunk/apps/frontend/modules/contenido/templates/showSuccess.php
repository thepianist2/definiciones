<h2 style="text-align: center;"><?php echo ucfirst($contenido->getTitulo()) ?></h2>
<br></br>
<div>
    <p>
        
        <?php echo nl2br(html_entity_decode($contenido->getContenido(), ENT_COMPAT , 'UTF-8')); ?>
        
        
        
        
    </p>
    
    
</div>

