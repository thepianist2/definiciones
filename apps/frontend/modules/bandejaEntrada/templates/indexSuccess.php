
   <?php if ($sf_user->isAuthenticated()){ ?>
<h1 style="text-align: center;">Bandeja de Entrada</h1>
<?php } ?>
<br></br>

<?php if(count($bandeja_entradas)>0){ ?>
<table>
  <thead>
    <tr>
      <th colspan="2">Acciones</th>   
      <th>De</th>
      <th>Enviado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bandeja_entradas as $mensaje): ?>
    <tr>
      <td><a class="ver" href="javascript:void(0)" id="<?php echo $mensaje->id ?>"><img src="/images/iconos/vistaPrevia.png"></a></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'bandejaEntrada/delete?id='.$mensaje->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>   
      
      <td><?php $usuario= $mensaje->obtenerUserNamePorId($mensaje->getIdUsuarioRemitente());
      echo $usuario; ?></td>
      <td><?php echo $mensaje->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br></br>
<div id="ver" style="display: none;"></div>
<br></br>
<?php }else{ ?>
<p style="text-align: center;">No se han encontrado mensajes</p>

<?php } ?>

<div style="text-align: center;" >
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'mensaje/index', array('title' => 'Volver')) ?>
</div>
<script type="text/javascript">
    //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
jQuery.noConflict();
          jQuery('.ver').click(function() {
        var id = jQuery(this).attr('id');
        dialog = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('bandejaEntrada/show?id=') ?>'+id,
            async: false
        }).responseText;
        jQuery('#ver').html(dialog);
        jQuery("#ver").dialog({
            resizable: false,
            width: 900,
            modal: true,
            title: "<?php echo 'Ver mensaje'; ?>"
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
