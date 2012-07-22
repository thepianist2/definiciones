<?php

/**
 * ImagenPiso form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImagenPisoForm extends BaseImagenPisoForm
{
  public function configure()
  {
      
                                                      //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at']);
      
           //                       //ocultar campo de idPiso
      $this->setWidget('idPiso', new sfWidgetFormInputHidden());   
      $this->setValidator('idPiso', new sfValidatorInteger());   
      
                    //campo descripcion
    $this->setWidget('descripcion', new sfWidgetFormTextarea());   
    
        
                  $imagenPicFileSrc = '/uploads/'.$this->getObject()->imagen;
            $this->widgetSchema['imagen'] = new sfWidgetFormInputFileEditable(array('file_src'  => $imagenPicFileSrc, 
                                       'is_image' => true,
			            'edit_mode' => !$this->isNew(),
				    'delete_label' => 'Eliminar'),
                                    array('id' => 'imagenFormu'));   
 
$this->validatorSchema['imagen'] = new sfValidatorFile(array(
                      'mime_types' => 'web_images',
    		      'path' => sfConfig::get('sf_upload_dir'),
		      'required' => true));
      
$this->validatorSchema['imagen_delete'] = new sfValidatorBoolean(); 
      


$this->validatorSchema['imagen']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['descripcion']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['idPiso']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

  }
}
