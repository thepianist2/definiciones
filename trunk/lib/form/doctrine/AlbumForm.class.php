<?php

/**
 * Album form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlbumForm extends BaseAlbumForm
{
  public function configure()
  {                                          //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at']);
      
      
      //                       //ocultar campo de candidatoID
      $this->setWidget('idUsuario', new sfWidgetFormInputHidden());   
      $this->setValidator('idUsuario', new sfValidatorInteger());   
      
      
$this->validatorSchema['idUsuario']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
$this->validatorSchema['descripcion']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
      
      
  }
}
