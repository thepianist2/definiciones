<h1 style="text-align: center;">Panel de estudios</h1>

<br></br><br></br>
<div style="text-align: center;">
    
<?php echo link_to(image_tag('iconos/prueba.gif','class=imageMenuEstudiar').'<br>Realizar exámen', 'estudiar/configurarTest', array('title' => 'Realizar exámen de todas las palabras')) ?>   <br></br> 
<?php echo link_to(image_tag('iconos/estudiar.gif','class=imageMenuEstudiar').'<br>Estudiar', 'estudiar/listado', array('title' => 'Estudiar viendo listado de palabras')) ?><br></br> 
<?php echo link_to(image_tag('iconos/test.gif','class=imageMenuEstudiar').'<br>Test Realizados', 'test/index', array('title' => 'Ver los test')) ?>
<br></br><br></br>
</div>