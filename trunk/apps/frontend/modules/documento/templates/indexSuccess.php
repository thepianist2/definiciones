<?php use_helper('Date') ?>
<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.17.custom.min.js"></script>
<!--<link rel="stylesheet" type="text/css" media="screen" href="/css/listado.css">-->

   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Documentos</h1>
<?php } ?>
<?php if(count($documentos)>0){ ?>
<br></br>

<table>
  <thead>
    <tr>
      <th colspan="4">Acciones</th>   
      <th>Título</th>
      <th>Imagen de portada</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($documentos as $documento): ?>
    <tr>
        <td><a class="ver" href="javascript:void(0)" id="<?php echo $documento->id ?>"><img src="/images/iconos/vistaPrevia.png"></a></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'documento/edit?id='.$documento->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'documento/delete?id='.$documento->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>   
      <td><?php echo link_to(image_tag('iconos/pdf.png'), 'documento_exportarPdf', $documento, array('title' => 'Exportar a pdf', 'target'=>'_blank')) ?></td>      
      <td><?php echo $documento->getTitulo() ?></td>
      <?php if($documento->getImagen()){ ?>
      <td><img id="imagenIndex" src="<?php echo '/uploads/'.$documento->getImagen() ?>"></td>
     <?php }else{ ?>
            <td><img id="imagenIndex" src="<?php echo '/images/documento.jpg' ?>"></td>
      
      <?php } ?>      
            
      <td><?php echo format_date($documento->getCreatedAt(), 'p') ?></td>
      <td><?php echo format_date($documento->getUpdatedAt(), 'p') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="ver" style="display: none;"></div>
<br></br>
<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'default/index', array('title' => 'Volver')) ?>

  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'documento/new', array('title' => 'Nuevo')) ?>
</div>
<br></br>
    <?php }else{   ?>
    <?php if ($sf_user->isAuthenticated()){ ?>
<div style="text-align: center;" ><br></br><br></br>
        <?php echo link_to(image_tag('iconos/documento.gif','class=imageMenuEstudiar').'<br>Añadir nuevo documento', 'documento/new', array('title' => 'Agregar nuevo documento')) ?>   <br></br> 

        
        
        
</div>
    
    <?php } } ?>
<script type="text/javascript">
    //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
jQuery.noConflict();
          jQuery('.ver').click(function() {
        var id = jQuery(this).attr('id');
        dialog = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('documento/show?id=') ?>'+id,
            async: false
        }).responseText;
        jQuery('#ver').html(dialog);
        jQuery("#ver").dialog({
            resizable: false,
            width: 900,
            modal: true,
            title: "<?php echo 'Vista previa'; ?>"
        });
    }); 
    
//    $(document).ready(function() {
//    $("#ver").show();
//});
//
//function ver(url){
//                   $(document).ready(function() {
////                       $("#estado").innerHTML="Cargando...";
//                       $("#ver").slideUp(function(){
//                            $("#ver").load(url,function(){
//                                $("#ver").slideDown(1500);
//                            });
//                       });
//                   });
//            }

</script>
