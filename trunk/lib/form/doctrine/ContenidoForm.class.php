<?php

/**
 * Contenido form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContenidoForm extends BaseContenidoForm
{
  public function configure()
  {
                        //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at']);
      
      
    //campo contenido
    $this->setWidget('contenido', new sfWidgetFormTextareaTinyMCE(array(
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
        ), array('class' => 'contenido')));
    
                     //campo nivel Conocimiento
        $tipo = Doctrine::getTable('CategoriaContenido')->getLista();
        $tipo[0]='--Seleccione una categoria--';
        asort($tipo);
        $this->setWidget('idCategoriaContenido', new sfWidgetFormSelect(array('choices' => $tipo)));
    
$this->setValidator('contenido',new sfValidatorString(array('required' => true)));
 
//labels
$this->widgetSchema->setLabels(array(
  'idUsuario'    => 'Usuario',
  'idCategoriaContenido'   => 'Categoria',    
));
 
       //mensajes
      
    $this->validatorSchema['titulo']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
    $this->validatorSchema['contenido']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
    $this->validatorSchema['idCategoriaContenido']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
  }
}
