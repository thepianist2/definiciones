<?php

/**
 * Documento form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DocumentoForm extends BaseDocumentoForm
{
  public function configure()
  {
                              //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at']);
      
      //                       //ocultar campo de candidatoID
      $this->setWidget('idUsuario', new sfWidgetFormInputHidden());   
      $this->setValidator('idUsuario', new sfValidatorInteger());  
      
          //campo contenido
    $this->setWidget('texto', new sfWidgetFormTextareaTinyMCE(array(
                          'width'  => 550,
                          'height' => 350,                          
                          'config' =>
                          'theme: "advanced",'.
                          'plugins : "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",'.
                          'theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor, | ,cut,copy,paste,pastetext,pasteword,|,search,replace,",'.
                          'theme_advanced_buttons2: "",'.
                          'theme_advanced_buttons3 : "",'.
                          'theme_advanced_buttons4 : "",'.
                          'language: "es",'
        ), array('class' => 'documento')));
    
    
                      $imagenPicFileSrc = '/uploads/'.$this->getObject()->imagen;
            $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array('file_src'  => $imagenPicFileSrc, 
                                       'is_image' => true,
			            'edit_mode' => !$this->isNew(),
				    'delete_label' => 'Eliminar'),
                                    array('id' => 'imagenFormu'));   
 
$this->validatorSchema['imagen'] = new sfValidatorFile(array(
                      'mime_types' => 'web_images',
    		      'path' => sfConfig::get('sf_upload_dir'),
		      'required' => false));
      
$this->validatorSchema['imagen_delete'] = new sfValidatorBoolean(); 



          $this->widgetSchema->setLabels(array(
  'idUsuario'    => 'Usuario *',
  'titulo'   => 'Título *',   
));  

          
                 //mensajes
      
    $this->validatorSchema['titulo']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
    $this->validatorSchema['texto']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
    $this->validatorSchema['idUsuario']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

  }
}
