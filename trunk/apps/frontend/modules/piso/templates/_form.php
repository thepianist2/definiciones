<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    //cargamos el mapa
$(document).ready(function() {
    load_map();
});

var initialLocation;
var browserSupportFlag =  new Boolean();
//contador para array de marcadores
var k=0;  
//variable mapa
var map;
//array para guardar las direcciones que se marcan en el checkbox, y recorrerlas poniendo un marcador.
var direcciones = new Array();
//variable para guardar todos los marcadores
var marcadores = new Array();
 //funcion para cargar el mapa
function load_map() {
     //coordenadas de inicio de mapa       
//    var myLatlng = new google.maps.LatLng(40.396764,-3.713379);
    //opciones para el nuevo mapa.
    var myOptions = {
        //opcion de zoom al iniciar el mapa
        zoom: 4,
        //opcion que nos dice las coordenadas del centro del mapa
//        center: myLatlng,
        //opcion que nos dice que tipo de mapa será, aspecto estan, ROADMAP, SATELLITE, HYBRID, TERRAIN
        mapTypeId: google.maps.MapTypeId.HYBRID
    };
    //se carga el mapa en el id del div, con las opciones
    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    //mapa 45 grados
//    map.setTilt(45);
    // Try W3C Geolocation (Preferred)
  if(navigator.geolocation) {
    browserSupportFlag = true;
    navigator.geolocation.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      map.setCenter(initialLocation);
    }, function() {
      handleNoGeolocation(browserSupportFlag);
    });
  // Try Google Gears Geolocation
  } else if (google.gears) {
    browserSupportFlag = true;
    var geo = google.gears.factory.create('beta.geolocation');
    geo.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
      map.setCenter(initialLocation);
    }, function() {
      handleNoGeoLocation(browserSupportFlag);
    });
  // Browser doesn't support Geolocation
  } else {
    browserSupportFlag = false;
    handleNoGeolocation(browserSupportFlag);
  }
  
  function handleNoGeolocation(errorFlag) {
    if (errorFlag == true) {
      load_mapSinUbicacion();
      initialLocation = newyork;
    } else {
      load_mapSinUbicacion();
      initialLocation = siberia;
    }
    map.setCenter(initialLocation);
  }

}


function load_mapSinUbicacion() {
     //coordenadas de inicio de mapa       
    var myLatlng = new google.maps.LatLng(40.396764,-3.713379);
    //opciones para el nuevo mapa.
    var myOptions = {
        //opcion de zoom al iniciar el mapa
        zoom: 4,
        //opcion que nos dice las coordenadas del centro del mapa
        center: myLatlng,
        //opcion que nos dice que tipo de mapa será, aspecto estan, ROADMAP, SATELLITE, HYBRID, TERRAIN
        mapTypeId: google.maps.MapTypeId.HYBRID
    };
    //se carga el mapa en el id del div, con las opciones
    map = new google.maps.Map($("#map_canvas").get(0), myOptions);
    //mapa 45 grados
//    map.setTilt(45);
}

$('#search').live('click', function() {
    load_map();
    // Obtenemos la dirección y la asignamos a una variable
    var address = $('#address').val();
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
});

 
function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {

        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);

        //crea un marcador y lo guarda en el mapa, le pasamos las coordenadas, y la direccion formateada
        crearMarcador(results[0].geometry.location,results[0].formatted_address);
    
    }
//else {
//        // En caso de no haber resultados o que haya ocurrido un error
//        // lanzamos un mensaje con el error
//        alert("Geocoding no tuvo éxito debido a: " + status);
//    }
}
//esta funcion se encarga de crear un marcador y añadirlo al mapa
function crearMarcador(localizacion,direccion) {
    
             // Creamos un marcador y lo posicionamos en el mapa
     var marcador = new google.maps.Marker({
         //indica la posicion donde se crea el marcador, con coordenadas
        position: localizacion,
        //indica a que mapa pertenece este marcador
        map: map,
        //indica el texto que se ve al hacercar el ratón al marcador
        title: direccion,
        //indica el icono del marcador hotel home administration
        icon: 'http://google-maps-icons.googlecode.com/files/hotel.png'
        });
        
        $('#piso_direccion').val(direccion);
        $('#piso_coordenadaX').val(localizacion.lat());
        $('#piso_coordenadaY').val(localizacion.lng());
        //evento click para el marcador
        google.maps.event.addListener(marcador, 'click', function() {
          //hacerca el zoom a 19 en el mapa
          map.setZoom(19);
          //centra al mapa en la posicion del marcador
          map.setCenter(marcador.getPosition());
        });
        
}

</script>
<style>
#piso_direccion{
        width: 380px;
    }
#address{
        width: 380px;
    }   
</style>
<form action="<?php echo url_for('piso/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'piso/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>

          
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['pais']->renderLabel() ?></th>
        <td>
          <?php echo $form['pais']->renderError() ?>
          <?php echo $form['pais'] ?>
        </td>
      </tr>
      <tr>
          <th><?php echo 'Primero Localiza la dirección' ?></th>
        <td>
            <input width="400" type="text" maxlength="200" id="address" placeholder="calle, número, localidad, ciudad" /> <input style="color: red;" type="button" id="search" value="Localizar dirección" /><br/>

        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']->renderError() ?>
          <?php echo $form['direccion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['coordenadaX']->renderLabel() ?></th>  
        <td>
          <?php echo $form['coordenadaX']->renderError() ?>
          <?php echo $form['coordenadaX'] ?>
        </td>
      </tr>
       <tr>
        <th><?php echo $form['coordenadaY']->renderLabel() ?></th>
           <td>
          <?php echo $form['coordenadaY']->renderError() ?>
          <?php echo $form['coordenadaY'] ?>
        </td>
      </tr>
      <tr>
          <th><label>Visualización del mapa</label></th>
        <td>
<div id='map_canvas' style="width:400px; height:400px;"></div><br></br>

        </td>
      </tr>
      <tr>
        <th><?php echo $form['contacto']->renderLabel() ?></th>
        <td>
          <?php echo $form['contacto']->renderError() ?>
          <?php echo $form['contacto'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['caracteristicasPrecio']->renderLabel() ?></th>
        <td>
          <?php echo $form['caracteristicasPrecio']->renderError() ?>
          <?php echo $form['caracteristicasPrecio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dormitorios']->renderLabel() ?></th>
        <td>
          <?php echo $form['dormitorios']->renderError() ?>
          <?php echo $form['dormitorios'] ?>
        </td>
      </tr>      
      <tr>
        <th><?php echo $form['banios']->renderLabel() ?></th>
        <td>
          <?php echo $form['banios']->renderError() ?>
          <?php echo $form['banios'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['precio']->renderLabel() ?></th>
        <td>
          <?php echo $form['precio']->renderError() ?>
          <?php echo $form['precio'] ?>
        </td>
      </tr>      
    </tbody>
  </table>
<br></br><br></br>

<div style="text-align: right;">
<input type="submit" value="Guardar y subir fotos" />
</div>
<br></br>
</form>


          
