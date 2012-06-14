

<h1 style="text-align: center;">Historial de test realizados</h1>
<br></br>
<div style="text-align: center;">
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'estudiar/index', array('title' => 'Volver')) ?>
</div>
<br></br>
<br></br>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $tests, 'action' => $action)) ?>
<br></br>
<?php if(count($tests)>0){ ?>
<div style="margin-left: 350px">
<table>
  <thead>
    <tr>
      <th>Ver detalle</th>     
      <th>Fecha y hora</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tests as $test): ?>
    <tr>
        <td style="text-align: center;"><a class="ver" href="javascript:void(0)" id="<?php echo $test->id ?>"><img src="/images/iconos/vistaPrevia.png"></a></td>  
      <td><?php echo $test->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<br></br>
<!--<div id="ver" style="display: none; color: white; background-color: #3399ff; border: 1px solid #3399ff; width: 540px;float: right;"></div>-->
<div id="ver" style="display: none;"></div>
        <br/>
    <?php include_component('bloque', 'bloquePaginador', array('pager' => $tests, 'action' => $action)) ?>
<br></br>
<div style="text-align: center;">
         <?php echo link_to(image_tag('iconos/atras.png').'Volver atras', 'estudiar/index', array('title' => 'Volver')) ?>
</div>
<br></br>
<?php }else{ ?>
    
<p style="text-align: center;">No has realizado ningún test</p>
    
    
  <?php  } ?>
<script type="text/javascript">
        //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
    //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
jQuery.noConflict();
          jQuery('.ver').click(function() {
        var id = jQuery(this).attr('id');
        dialog = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('test/show?id=') ?>'+id,
            async: false
        }).responseText;
        jQuery('#ver').html(dialog);
        jQuery("#ver").dialog({
            resizable: false,
            width: 900,
            modal: true,
            title: "<?php echo 'Ver test'; ?>"
        });
    }); 
//    jQuery(document).ready(function() {
//    jQuery("#ver").show();
//});

//function ver(url){
//                   jQuery(document).ready(function() {
//                       jQuery("#ver").slideUp(function(){
//                            jQuery("#ver").load(url,function(){
//                                jQuery("#ver").slideDown(1500);
//                            });
//                       });
//                   });
//            }
//            
//            
//       function cerrar(){
//                   jQuery(document).ready(function() {
//                        jQuery("#ver").slideUp(1500);
//                   });
//            }     

</script>
