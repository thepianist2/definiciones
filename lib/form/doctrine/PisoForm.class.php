<?php

/**
 * Piso form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PisoForm extends BasePisoForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at'], $this['metro'], $this['linea']);
      
      
      $this->setValidator('direccion',new sfValidatorString(array('min_length' => 20),array('required' => true)));
      
      //                       //ocultar campo de candidatoID
      $this->setWidget('idUsuario', new sfWidgetFormInputHidden());   
      $this->setValidator('idUsuario', new sfValidatorInteger());   
 
  
$paise= array(null,'Afganistán' , 'Albania' , 'Alemania' , 'Andorra' , 'Angola' , 'Antigua y Barbuda' , 'Antillas Holandesas' , 'Arabia Saudí' , 'Argelia' , 'Argentina' , 'Armenia' , 'Aruba' , 'Australia' , 'Austria' , 'Azerbaiyán' , 'Bahamas' , 'Bahrein' , 'Bangladesh' , 'Barbados' , 'Bélgica' , 'Belice' , 'Benín' , 'Bermudas' , 'Bielorrusia' , 'Bolivia' , 'Botswana' , 'Bosnia' , 'Brasil' , 'Brunei' , 'Bulgaria' , 'BurkinaFaso' , 'Burundi' , 'Bután' , 'Cabo Verde' , 'Camboya' , 'Camerún' , 'Canadá' , 'Chad' , 'Chile' , 'China' , 'Chipre' , 'Colombia' , 'Comoras' , 'Congo' , 'Corea del Norte' , 'Corea del Sur' , 'Costa de Marfil' , 'Costa Rica' , 'Croacia' , 'Cuba' , 'Dinamarca' , 'Dominica' , 'Dubai' , 'Ecuador' , 'Egipto' , 'El Salvador' , 'Emiratos Árabes Unidos' , 'Eritrea' , 'Eslovaquia' , 'Eslovenia' , 'España' , 'Estados Unidos de América' , 'Estonia' , 'Etiopía' , 'Fiyi' , 'Filipinas' , 'Finlandia' , 'Francia' , 'Gabón' , 'Gambia' , 'Georgia' , 'Ghana' , 'Grecia' , 'Guam' , 'Guatemala' , 'Guayana Francesa' , 'Guinea-Bissau' , 'Guinea Ecuatorial' , 'Guinea' , 'Guyana' , 'Granada' , 'Haití' , 'Honduras' , 'HongKong' , 'Hungría' , 'Holanda' , 'India' , 'Indonesia' , 'Irak' , 'Irán' , 'Irlanda' , 'Islandia' , 'Islas Caimán' , 'Islas Marshall' , 'Islas Pitcairn' , 'Islas Salomón' , 'Israel' , 'Italia' , 'Jamaica' , 'Japón' , 'Jordania' , 'Kazajstán' , 'Kenia' , 'Kirguistán' , 'Kiribati' , 'Kósovo' , 'Kuwait' , 'Laos' , 'Lesotho' , 'Letonia' , 'Líbano' , 'Liberia' , 'Libia' , 'Liechtenstein' , 'Lituania' , 'Luxemburgo' , 'Macedonia' , 'Madagascar' , 'Malasia' , 'Malawi' , 'Maldivas' , 'Malí' , 'Malta' , 'Marianas del Norte' , 'Marruecos' , 'Mauricio' , 'Mauritania' , 'México' , 'Micronesia' , 'Mónaco' , 'Moldavia' , 'Mongolia' , 'Montenegro' , 'Mozambique' , 'Myanmar' , 'Namibia' , 'Nauru' , 'Nepal' , 'Nicaragua' , 'Níger' , 'Nigeria' , 'Noruega' , 'NuevaZelanda' , 'Omán' , 'OrdendeMalta' , 'Países Bajos' , 'Pakistán' , 'Palestina' , 'Palau' , 'Panamá' , 'Papúa Nueva Guinea' , 'Paraguay' , 'Perú' , 'Polonia' , 'Portugal' , 'Puerto Rico' , 'Qatar' , 'Reino Unido' , 'República Centro africana' , 'República Checa' , 'República del Congo' , 'República Democrática del Congo' , 'República Dominicana' , 'Ruanda' , 'Rumania' , 'Rusia' , 'Sáhara Occidental' , 'SaintKitts-Nevis' , 'Samoa Americana' , 'Samoa' , 'San Marino' , 'Santa Lucía' , 'Santo Tomé y Príncipe' , 'San Vicente y las Granadinas' , 'Senegal' , 'Serbia' , 'Seychelles' , 'SierraLeona' , 'Singapur' , 'Siria' , 'Somalia' , 'SriLanka' , 'Sudáfrica' , 'Sudán' , 'Suecia' , 'Suiza' , 'Suazilandia' , 'Tailandia' , 'Taiwán' , 'Tanzania' , 'Tayikistán' , 'Tíbet' , 'TimorOriental' , 'Togo' , 'Tonga' , 'Trinidad y Tobago' , 'Túnez' , 'Turkmenistán' , 'Turquía' , 'Tuvalu' , 'Ucrania' , 'Uganda' , 'Uruguay' , 'Uzbequistán' , 'Vanuatu' , 'Vaticano' , 'Venezuela' , 'Vietnam' , 'WallisyFutuna' , 'Yemen' , 'Yibuti' , 'Zambia' , 'Zaire' , 'Zimbabue'); 

foreach ($paise as $value) {
    $paises[$value]=$value;
}


    $this->setWidget('pais', new sfWidgetFormSelect(array('choices' => $paises)));

 
    
    
                 //numero de habitaciones
     for ($i=0;$i<41;$i++){
     $numeroHabitaciones[$i]  = $i;
     }     
    $this->setWidget('dormitorios', new sfWidgetFormSelect(array('choices' => $numeroHabitaciones)));

      
                     //numero de habitaciones
     for ($i=0;$i<11;$i++){
     $banios[$i]  = $i;
     }     
    
    $this->setWidget('banios', new sfWidgetFormSelect(array('choices' => $banios)));

    
    
    
          $this->setValidator('pais',new sfValidatorString(array('required' => true)));

        //campo contacto
    $this->setWidget('contacto', new sfWidgetFormTextareaTinyMCE(array(
                          'width'  => 450,
                          'height' => 350,                          
                          'config' =>
                          'theme: "advanced",'.
                          'plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",'.
                          'theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor, | ,cut,copy,paste,pastetext,pasteword,|,search,replace,",'.
                          'theme_advanced_buttons2: "",'.
                          'theme_advanced_buttons3 : "",'.
                          'theme_advanced_buttons4 : "",'.
                          'language: "es",'
        ), array('class' => 'contacto')));
    
      
              //campo precio y caracteristicas
    $this->setWidget('caracteristicasPrecio', new sfWidgetFormTextareaTinyMCE(array(
                          'width'  => 450,
                          'height' => 350,                          
                          'config' =>
                          'theme: "advanced",'.
                          'plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",'.
                          'theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor, | ,cut,copy,paste,pastetext,pasteword,|,search,replace,",'.
                          'theme_advanced_buttons2: "",'.
                          'theme_advanced_buttons3 : "",'.
                          'theme_advanced_buttons4 : "",'.
                          'language: "es",'
        ), array('class' => 'caracteristicasPrecio')));
     
    
    $this->setValidator('contacto',new sfValidatorString(array('required' => true)));
    $this->setValidator('caracteristicasPrecio',new sfValidatorString(array('required' => true)));

    
      $this->widgetSchema['direccion'] = new sfWidgetFormInput(array(), array('readonly'=>'readonly'));      
      $this->widgetSchema['coordenadaX'] = new sfWidgetFormInput(array(), array('readonly'=>'readonly'));
      $this->widgetSchema['coordenadaY'] = new sfWidgetFormInput(array(), array('readonly'=>'readonly'));
      
//            //                       //ocultar campo de candidatoID
//      $this->setWidget('coordenadaX', new sfWidgetFormInputHidden());   
//      $this->setValidator('coordenadaX', new sfValidatorNumber());   
//      
//      
//            //                       //ocultar campo de candidatoID
//      $this->setWidget('coordenadaY', new sfWidgetFormInputHidden());   
//      $this->setValidator('coordenadaY', new sfValidatorNumber());   

      
                $this->widgetSchema->setLabels(array(
  'direccion'    => 'Dirección definitiva',
  'coordenadaX'    => 'Coordenada X',
  'coordenadaY'    => 'Coordenada Y',
  'contacto'    => 'Datos de contacto',   
  'caracteristicasPrecio'    => 'Caracteristicas',    
  'banios'    => 'Nº de Baños',        
  'dormitorios'    => 'Nº de Dormitorios',   
  'pais'    => 'Selecciona el país',                     
));  
      
$this->validatorSchema['direccion']->setMessages(array('required' => 'Campo Obligatorio, debes localiza la direccion.','invalid' => 'Campo inválido','min_length'=>'La dirección debe estar completa'));
$this->validatorSchema['coordenadaX']->setMessages(array('required' => 'Campo Obligatorio, debes localiza la direccion.','invalid' => 'Campo inválido'));
$this->validatorSchema['coordenadaY']->setMessages(array('required' => 'Campo Obligatorio, debes localiza la direccion.','invalid' => 'Campo inválido'));
$this->validatorSchema['pais']->setMessages(array('required' => 'Campo Obligatorio, selecciona el pais.','invalid' => 'Campo inválido'));
$this->validatorSchema['caracteristicasPrecio']->setMessages(array('required' => 'Campo Obligatorio','invalid' => 'Campo inválido'));
$this->validatorSchema['contacto']->setMessages(array('required' => 'Campo Obligatorio','invalid' => 'Campo inválido'));
$this->validatorSchema['precio']->setMessages(array('required' => 'Campo Obligatorio','invalid' => 'Campo inválido'));
$this->validatorSchema['dormitorios']->setMessages(array('required' => 'Campo Obligatorio','invalid' => 'Campo inválido'));
$this->validatorSchema['banios']->setMessages(array('required' => 'Campo Obligatorio','invalid' => 'Campo inválido'));

  }
}
