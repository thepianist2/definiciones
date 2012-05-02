<?php

/**
 * SubCategoria form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubCategoriaForm extends BaseSubCategoriaForm
{
  public function configure()
  {
       unset($this['created_at'], $this['updated_at']);
      
            $this->setValidator('texto',new sfValidatorString(array('required' => true)));
    
            
                         //campo nivel Conocimiento
        $tipo = Doctrine::getTable('Categoria')->getLista();
        $tipo[0]='--Seleccione una categoria--';
        asort($tipo);
        $this->setWidget('idCategoria', new sfWidgetFormSelect(array('choices' => $tipo)));        
            
            
            
            
            
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
      
      
$this->validatorSchema['texto']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
  }
}
