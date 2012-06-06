<h2 style="text-align: center;"><?php echo ucfirst($contenido->getTitulo()) ?></h2>
<br></br>
<div>
    <p>
        
        <?php echo html_entity_decode(ucfirst(strtolower($contenido->getContenido())), ENT_COMPAT , 'UTF-8'); ?>
        
        
        
        
    </p>
    
    
</div>

