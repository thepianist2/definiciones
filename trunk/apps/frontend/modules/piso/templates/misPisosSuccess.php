<h1 style="text-align: center">Pisos de alquiler</h1>
<br></br>
<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'piso/new', array('title' => 'Nuevo')) ?>
  <?php echo link_to(image_tag('iconos/mundo.png').'Todos los pisos', 'piso/index', array('title' => 'Todos los pisos')) ?>

</div>
<br></br>
<?php 

$paise= array('Afganistán' , 'Albania' , 'Alemania' , 'Andorra' , 'Angola' , 'Antigua y Barbuda' , 'Antillas Holandesas' , 'Arabia Saudí' , 'Argelia' , 'Argentina' , 'Armenia' , 'Aruba' , 'Australia' , 'Austria' , 'Azerbaiyán' , 'Bahamas' , 'Bahrein' , 'Bangladesh' , 'Barbados' , 'Bélgica' , 'Belice' , 'Benín' , 'Bermudas' , 'Bielorrusia' , 'Bolivia' , 'Botswana' , 'Bosnia' , 'Brasil' , 'Brunei' , 'Bulgaria' , 'BurkinaFaso' , 'Burundi' , 'Bután' , 'Cabo Verde' , 'Camboya' , 'Camerún' , 'Canadá' , 'Chad' , 'Chile' , 'China' , 'Chipre' , 'Colombia' , 'Comoras' , 'Congo' , 'Corea del Norte' , 'Corea del Sur' , 'Costa de Marfil' , 'Costa Rica' , 'Croacia' , 'Cuba' , 'Dinamarca' , 'Dominica' , 'Dubai' , 'Ecuador' , 'Egipto' , 'El Salvador' , 'Emiratos Árabes Unidos' , 'Eritrea' , 'Eslovaquia' , 'Eslovenia' , 'España' , 'Estados Unidos de América' , 'Estonia' , 'Etiopía' , 'Fiyi' , 'Filipinas' , 'Finlandia' , 'Francia' , 'Gabón' , 'Gambia' , 'Georgia' , 'Ghana' , 'Grecia' , 'Guam' , 'Guatemala' , 'Guayana Francesa' , 'Guinea-Bissau' , 'Guinea Ecuatorial' , 'Guinea' , 'Guyana' , 'Granada' , 'Haití' , 'Honduras' , 'HongKong' , 'Hungría' , 'Holanda' , 'India' , 'Indonesia' , 'Irak' , 'Irán' , 'Irlanda' , 'Islandia' , 'Islas Caimán' , 'Islas Marshall' , 'Islas Pitcairn' , 'Islas Salomón' , 'Israel' , 'Italia' , 'Jamaica' , 'Japón' , 'Jordania' , 'Kazajstán' , 'Kenia' , 'Kirguistán' , 'Kiribati' , 'Kósovo' , 'Kuwait' , 'Laos' , 'Lesotho' , 'Letonia' , 'Líbano' , 'Liberia' , 'Libia' , 'Liechtenstein' , 'Lituania' , 'Luxemburgo' , 'Macedonia' , 'Madagascar' , 'Malasia' , 'Malawi' , 'Maldivas' , 'Malí' , 'Malta' , 'Marianas del Norte' , 'Marruecos' , 'Mauricio' , 'Mauritania' , 'México' , 'Micronesia' , 'Mónaco' , 'Moldavia' , 'Mongolia' , 'Montenegro' , 'Mozambique' , 'Myanmar' , 'Namibia' , 'Nauru' , 'Nepal' , 'Nicaragua' , 'Níger' , 'Nigeria' , 'Noruega' , 'NuevaZelanda' , 'Omán' , 'OrdendeMalta' , 'Países Bajos' , 'Pakistán' , 'Palestina' , 'Palau' , 'Panamá' , 'Papúa Nueva Guinea' , 'Paraguay' , 'Perú' , 'Polonia' , 'Portugal' , 'Puerto Rico' , 'Qatar' , 'Reino Unido' , 'República Centro africana' , 'República Checa' , 'República del Congo' , 'República Democrática del Congo' , 'República Dominicana' , 'Ruanda' , 'Rumania' , 'Rusia' , 'Sáhara Occidental' , 'SaintKitts-Nevis' , 'Samoa Americana' , 'Samoa' , 'San Marino' , 'Santa Lucía' , 'Santo Tomé y Príncipe' , 'San Vicente y las Granadinas' , 'Senegal' , 'Serbia' , 'Seychelles' , 'SierraLeona' , 'Singapur' , 'Siria' , 'Somalia' , 'SriLanka' , 'Sudáfrica' , 'Sudán' , 'Suecia' , 'Suiza' , 'Suazilandia' , 'Tailandia' , 'Taiwán' , 'Tanzania' , 'Tayikistán' , 'Tíbet' , 'TimorOriental' , 'Togo' , 'Tonga' , 'Trinidad y Tobago' , 'Túnez' , 'Turkmenistán' , 'Turquía' , 'Tuvalu' , 'Ucrania' , 'Uganda' , 'Uruguay' , 'Uzbequistán' , 'Vanuatu' , 'Vaticano' , 'Venezuela' , 'Vietnam' , 'WallisyFutuna' , 'Yemen' , 'Yibuti' , 'Zambia' , 'Zaire' , 'Zimbabue'); 
foreach ($paise as $value) {
    $paises[$value]=$value;
}

?>



<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    
    //cargamos el mapa
$(document).ready(function() {
            //variable acumuladora para el array de marcadores con el objetivo de enfocar todos los marcadores a la vez    
        k=0;
        //array de marcadores, para enfocarlos todos a la vez
        marcadores = new Array();
        //variable acumuladora del array direcciones
        var i=0;
        //array que guarda las direcciones
        direcciones = new Array();
        //variable que guarda todos los check box de nombre direcciones
//variable que guarda todos los check box de nombre direcciones
        var checkboxes = document.getElementById("form1").direcciones;
        if(checkboxes!=null){
        //se realiza un for para recorrer los checkbox y verificar cuales están seleccionados
        for (var x=0; x < checkboxes.length; x++) {
            checkboxes[x].checked=true;
                     //se guarda la dirección en el array
         direcciones[i]=$(checkboxes[x]).val();
         //se suma 1 para guardar en la posicion siguiente
         i+=1;
         }
         
         //cuando se hayan guardado todas las direcciones seleccionadas, se procede a crear los marcadores, recorriendo el array de direcciones
        recorrerDirecciones(direcciones);     
        }
    
    
    
    
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
    // Obtenemos la dirección y la asignamos a una variable
    var address = $('#address').val();
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
});

//esta funcion se encarga de recorrer las direcciones del array, y entregarlas a la funcion entregatDireccion
function recorrerDirecciones(direcciones){
//cargamos nuevamente el mapa para crear un nuevo y asi borrar los marcadores desmarcados en el checkbox
load_mapSinUbicacion();
//verificamos que se han seleccionado mas de 0 direcciones
    if(direcciones.length>0){
     for(j=0;j<direcciones.length;j++){
         //entregamos la variable direccion texto, a la funcion entregarDireccion
         entregarDireccion(direcciones[j]);
         
     }
}else{
    load_map();
}
}


//esta funcion se encarga de recibir una direccion de texto, y llevarla a la funcion que nos crea las coordenadas
function entregarDireccion(direccion)
{
    //variable direccion, contiene texto con la dirección
    var address = direccion;
    // Creamos el Objeto Geocoder
    var geocoder = new google.maps.Geocoder();
    // Hacemos la petición indicando la dirección e invocamos la función
    // geocodeResult enviando todo el resultado obtenido
    geocoder.geocode({ 'address': address}, geocodeResult);
 

}

 
function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {

        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
//        map.fitBounds(results[0].geometry.viewport);

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
        
        
        //evento click para el marcador
        google.maps.event.addListener(marcador, 'click', function() {
          //hacerca el zoom a 19 en el mapa
          map.setZoom(19);
          //centra al mapa en la posicion del marcador
          map.setCenter(marcador.getPosition());
        });
        
     //guardamos la localizacion en el array de marcadores
     marcadores[k] = localizacion;
     //le sumamos 1 al acumulador del array de marcadores
     k+=1;  
     //creamos la variable limites para en ella guardar todas las coordenadas de los marcadores
     var limites = new google.maps.LatLngBounds ();
     //  hacemos el for para recorrer el array de marcadores, obtener las coordenadas, y guardalas en la variable limites
     for (var i = 0; i < marcadores.length; i++) {
    //  guardamos en limites la nueva coordenada
     limites.extend (marcadores[i]);
     }
    //  acercará el mapa con el zoom adecuado de acuerdo a lo buscado, en este caso a todos los bounds, fija los limites
    map.fitBounds (limites);

}
    
  //se activa la funcion al momento de cargar el documento
     $(document).ready(function(){
        //esta funcion se encarga de capturar el evento click del checkbox clase ck
        $("input.ck").click(function () {
        //variable acumuladora para el array de marcadores con el objetivo de enfocar todos los marcadores a la vez    
        k=0;
        //array de marcadores, para enfocarlos todos a la vez
        marcadores = new Array();
        //variable acumuladora del array direcciones
        var i=0;
        //array que guarda las direcciones
        direcciones = new Array();
        //variable que guarda todos los check box de nombre direcciones
        var checkboxes = document.getElementById("form1").direcciones;
        if(checkboxes!=null){
        //se realiza un for para recorrer los checkbox y verificar cuales están seleccionados
        for (var x=0; x < checkboxes.length; x++) {
         //si está seleccionado se guarda en el array y se suma 1 al acumulador (i)
         if (checkboxes[x].checked) {
         //se guarda la dirección en el array
         direcciones[i]=$(checkboxes[x]).val();
         //se suma 1 para guardar en la posicion siguiente
         i+=1;
         }
        }
        //cuando se hayan guardado todas las direcciones seleccionadas, se procede a crear los marcadores, recorriendo el array de direcciones
        recorrerDirecciones(direcciones);    }  
            });
    });
    
    function cargarMarcadores(){
        
                desmarcarTodos();
        //variable acumuladora para el array de marcadores con el objetivo de enfocar todos los marcadores a la vez    
        k=0;
        //array de marcadores, para enfocarlos todos a la vez
        marcadores = new Array();
        //variable acumuladora del array direcciones
        var i=0;
        //array que guarda las direcciones  
              direcciones = new Array();                          
//        document.form1.submit();
var checkboxes = document.getElementById("form1").direcciones;
var pais = $('#pais option:selected').val();
if(pais!='Todos'){
if(checkboxes!=null){
  for (var x=0; x < checkboxes.length; x++) {
      
      if($(checkboxes[x]).attr('title')==pais){
          checkboxes[x].checked=true;
                   //se guarda la dirección en el array
         direcciones[i]=$(checkboxes[x]).val();
         //se suma 1 para guardar en la posicion siguiente
         i+=1;
      }
  }  
          //cuando se hayan guardado todas las direcciones seleccionadas, se procede a crear los marcadores, recorriendo el array de direcciones
        recorrerDirecciones(direcciones);  
}
}else{
      for (var x=0; x < checkboxes.length; x++) {
                    checkboxes[x].checked=true;
                   //se guarda la dirección en el array
         direcciones[i]=$(checkboxes[x]).val();
         //se suma 1 para guardar en la posicion siguiente
         i+=1;
      }
              //cuando se hayan guardado todas las direcciones seleccionadas, se procede a crear los marcadores, recorriendo el array de direcciones
        recorrerDirecciones(direcciones);  
}




}

function desmarcarTodos(){
    var checkboxes = document.getElementById("form1").direcciones;
if(checkboxes!=null){
    for (var x=0; x < checkboxes.length; x++) {
        checkboxes[x].checked=false;
    }
}
}
</script>
<style>
.scroll
{
overflow:auto;
height: 450px;
<?php if(count($pisos)>0){ ?>
border:1px solid #6699CC;
<?php } ?>
-moz-border-radius:20px;/*Establecemos el radio del borde*/
}


    
</style>
<div id='map_canvas' style="width:600px; height:400px;"></div>
<form id="form1" method="post" action="">

            <br></br>
    <label>País:</label>
    <select name="pais" id="pais" onchange="javascript:cargarMarcadores()">
        <OPTION VALUE="Todos">Todos</OPTION>
        <?php foreach ($paise as $value) { ?>
        <OPTION VALUE="<?php echo $value; ?>"><?php echo $value; ?></OPTION>
        <?php } ?>
        
    </select>    

    <br></br><br></br>
<?php foreach ($pisos as $piso){ ?>
    <div style="float: left; width: 500px;">
        <input name="direcciones"  type="checkbox" title="<?php echo $piso->getPais(); ?>" id="<?php echo $piso->getDireccion(); ?>" value="<?php echo $piso->getDireccion(); ?>" class="ck"/><a class="ver" id="<?php echo $piso->id ?>" href="javascript:void(0)"><?php echo $piso->getDireccion(); ?></a> <br></br>
        <div style="text-align: right;">
        <?php if($piso->getIdUsuario()==$sf_user->getGuardUser()->getId()){ ?>
    <?php echo link_to(image_tag('iconos/editar.png'), 'piso/edit?id='.$piso->getId(), array('title' => 'Editar')) ?>
    <?php echo link_to(image_tag('iconos/borrar.png'), 'piso/delete?id='.$piso->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?>
        <?php } ?>
    <?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'piso/show?id='.$piso->getId(), array('title' => 'Visualizar')) ?>
        
    <hr></hr>
    </div>
    </div>

<?php } ?>
</div>
</form>
<br></br><br></br><br></br><br></br>
<div id="ver" style="display: none;"></div>
<script type="text/javascript">
    //se agrega jQuery.noConflict(); porque está prottools y el simbolo $ se reelmplaza por jQuery para evitar confictos 
jQuery.noConflict();
          jQuery('.ver').click(function() {
        var id = jQuery(this).attr('id');
        dialog = jQuery.ajax({
            type: 'GET',
            url: '<?php echo url_for('piso/show?id=') ?>'+id,
            async: false
        }).responseText;
        jQuery('#ver').html(dialog);
        jQuery("#ver").dialog({
            resizable: true,
            width: 900,
            modal: true,
            show: { effect: 'drop', direction: "up" },
            title: "<?php echo 'Ver Piso'; ?>"
        });
    }); 
    


</script>