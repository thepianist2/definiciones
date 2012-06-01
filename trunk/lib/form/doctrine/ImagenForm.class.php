<?php

/**
 * Imagen form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImagenForm extends BaseImagenForm
{
  public function configure()
  {
      
                                                //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at']);
      
      
      
            
      //                       //ocultar campo de candidatoID
      $this->setWidget('idAlbum', new sfWidgetFormInputHidden());   
      $this->setValidator('idAlbum', new sfValidatorInteger());   
      
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
      


$this->validatorSchema['imagen']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['descripcion']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['idAlbum']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

}
}
