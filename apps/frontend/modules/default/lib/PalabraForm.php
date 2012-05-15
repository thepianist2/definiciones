<?php

/**
 * Palabra form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class Palabra2Form extends BasePalabraForm
{
  public function configure()
  {
                                          //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['borrado']);
      
//                       //ocultar campo de candidatoID
      $this->setWidget('idUsuario', new sfWidgetFormInputHidden());   
      $this->setValidator('idUsuario', new sfValidatorInteger());   
      
      $this->setWidget('activo', new sfWidgetFormInputHidden());   
      
      

        if (!$this->isNew()) {
            $idCategoria = $this->getObject()->getSubCategoria()->getIdCategoria();
            $this->setWidget('idSubCategoria', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategoria'), 'add_empty' => false, 'table_method' => array('method' => 'getDisponiblesPorCategoria', 'parameters' => array($idCategoria)), 'method' => 'getTexto')));
        } else if ($this->isNew() && $this->getObject()->getIdUsuario()) {
            $idCategoria = $this->getObject()->getUsuario()->getPalabra()->getSubCategoria()->getIdCategoria();
            $this->setWidget('idSubCategoria', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategoria'), 'add_empty' => false, 'table_method' => array('method' => 'getDisponiblesPorCategoria', 'parameters' => array($idCategoria)), 'method' => 'getTexto')));
        }
        
      
      
      
      $this->setWidget('textoDefinicion', new sfWidgetFormTextarea());
      $this->setValidator('textoPalabra',new sfValidatorString(array('required' => true)));
      $this->setValidator('textoDefinicion',new sfValidatorString(array('required' => true)));
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
  'idCategoria'   => 'Categoría *',
  'textoPalabra' => 'Palabra *',
  'textoDefinicion' => 'Definición *'     
));  
          
          

$this->validatorSchema['textoPalabra']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['idSubCategoria']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
      
  }
}
