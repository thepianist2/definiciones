<?php

/**
 * BandejaSalida form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BandejaSalidaForm extends BaseBandejaSalidaForm
{
  public function configure()
  {
      
                              //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at']);
      
      
            //                       //ocultar campo de candidatoID
      $this->setWidget('idUsuarioRemitente', new sfWidgetFormInputHidden());   
      $this->setValidator('idUsuarioRemitente', new sfValidatorInteger());  
      
      
          //campo contenido
    $this->setWidget('mensaje', new sfWidgetFormTextareaTinyMCE(array(
                          'width'  => 800,
                          'height' => 400,                          
                          'config' =>
                          'theme: "advanced",'.
                          'plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",'.
                          'theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor, | ,cut,copy,paste,pastetext,pasteword,|,search,replace,",'.
                          'theme_advanced_buttons2: "",'.
                          'theme_advanced_buttons3 : "",'.
                          'theme_advanced_buttons4 : "",'.
                          'language: "es",'
        ), array('class' => 'mensaje')));
    
    
    
              $this->widgetSchema->setLabels(array(
  'idUsuarioReceptor'    => 'Usuario destino *',
  'mensaje'   => 'Mensaje *',   
));  

  }
}
