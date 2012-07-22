<style type="text/css">

/*Make sure your page contains a valid doctype at the top*/
#simplegallery1{ 
position: relative; /*keep this intact*/
visibility: hidden; /*keep this intact*/
border: 10px solid #3399ff;
margin-left: 200px;
}

#simplegallery1 .gallerydesctext{ 
text-align: left;
padding: 2px 5px;
}

</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
    
    //cargamos el mapa
$(document).ready(function() {
    load_map();
});

 //funcion para cargar el mapa
function load_map() {
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
    map = new google.maps.Map($("#map_canvas2").get(0), myOptions);
    //mapa 45 grados
    map.setTilt(45);
    cargarMarcador();
}

//esta funcion se encarga de recorrer las direcciones del array, y entregarlas a la funcion entregatDireccion
function cargarMarcador(){
    // Obtenemos la dirección y la asignamos a una variable
    var x=$("#direccion");
    var address= x.text();
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
        
        
        //evento click para el marcador
        google.maps.event.addListener(marcador, 'click', function() {
          //hacerca el zoom a 19 en el mapa
          map.setZoom(19);
          //centra al mapa en la posicion del marcador
          map.setCenter(marcador.getPosition());
        });
       
}
    

</script>
<?php $imagenes=$piso->getImagenPiso(); ?>
<script type="text/javascript">
<?php if(count($imagenes)>0){ ?>
var mygallery=new simpleGallery({
	wrapperid: "simplegallery1", //ID of main gallery container,
	dimensions: [550, 500], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
	
        

        imagearray: [
            <?php foreach ($imagenes as $imagen) { ?>
		["<?php echo '/uploads/'.$imagen->getImagen() ?>", "<?php echo '/uploads/'.$imagen->getImagen() ?>", "_new", "<?php echo $imagen->getDescripcion(); ?>"],
            <?php  } ?>
	],
	autoplay: [true, 3000, 2], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	oninit:function(){ //event that fires when gallery has initialized/ ready to run
		//Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
	},
	onslide:function(curslide, i){ //event that fires after each slide is shown
		//Keyword "this": references current gallery instance
		//curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
		//i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
	}
})
<?php } ?>
</script>
<h1 style="text-align: center;">Muestra de piso de <?php echo $piso->getPais(); ?></h1>
<br></br>
<div style="text-align: center;">

  <?php echo link_to(image_tag('iconos/contacto.png').'Mis pisos', 'piso/misPisos', array('title' => 'Tus pisos')) ?>
  <?php echo link_to(image_tag('iconos/mundo.png').'Todos los pisos', 'piso/index', array('title' => 'Todos los pisos')) ?>
        <?php if($piso->getIdUsuario()==$sf_user->getGuardUser()->getId()){ ?>
    <?php echo link_to(image_tag('iconos/editar.png').'Editar', 'piso/edit?id='.$piso->getId(), array('title' => 'Editar')) ?>
    <?php echo link_to(image_tag('iconos/borrar.png').'Eliminar', 'piso/delete?id='.$piso->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?>
        <?php } ?>
    
</div>
<br></br>
<label>Dirección:</label><p id="direccion"><?php echo $piso->getDireccion(); ?></p>

<br></br>
<?php if(count($imagenes)>0){ ?>
<label>Imágenes</label>
<div id="simplegallery1"></div>
<br></br>
<?php } ?>
<label>Contacto:</label><p><?php echo nl2br(html_entity_decode($piso->getContacto(), ENT_COMPAT , 'UTF-8')); ?></p><br></br>
<label>Caracteristicas:</label><p><?php echo nl2br(html_entity_decode($piso->getCaracteristicasPrecio(), ENT_COMPAT , 'UTF-8')); ?></p><br></br>
<label>Nº de baños:</label><p><?php echo $piso->getBanios(); ?></p><br></br>
<label>Nº de dormitorios:</label><p><?php echo $piso->getDormitorios(); ?></p><br></br>
<label>Precio:</label><p><?php echo $piso->getPrecio(); ?></p><br></br>
<label>Mapa y localización:</label><br></br><div style="color: mediumspringgreen;" onclick="javascript:load_map()">Click para refrescar el mapa</div><br></br>
<div id='map_canvas2' style="width:600px; height:400px; margin-left: 200px;"></div>

<br></br><br></br><br></br><br></br>
