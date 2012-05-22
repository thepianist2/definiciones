<script type="text/javascript" src="http://vozme.com/get_text.js"></script>

<br></br><br></br><br></br>
<div id="textoDocumento">
<table>
  <tbody>
    <tr>
        <th>Titulo:</th>
      <td><h2><?php echo $documento->getTitulo() ?></h2></td>
    </tr>
    <tr>
      <th></th>
      <td><p><?php echo html_entity_decode(ucfirst(strtolower($documento->getTexto())), ENT_COMPAT , 'UTF-8'); ?></p></td>
    </tr>

  </tbody>
  
</table>
    
    </div>
<br></br>
<button style="float: right; background:#ddeeff 
 url(http://vozme.com/img/paper_sound32x32.gif) 
 no-repeat left center; 
 min-height: 35px; 
 font-size:100%; padding:4px 4px 4px 35px;" 
 onclick="get_selection('es','ml');">
Selecciona un texto y<br/>clica aquí para oírlo</button>
<br></br><br></br><br></br><br></br>
<br></br>
<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'documento/index', array('title' => 'Volver')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'documento/edit?id='.$documento->getId(), array('title' => 'Editar')) ?>
</div><br></br>
