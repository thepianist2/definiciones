<?php

/**
 * sfGuardGroup form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupForm extends PluginsfGuardGroupForm
{
  public function configure()
  {
      
            $this->widgetSchema->setLabels(array(
  'name'    => 'Nombre *',
  'description'   => 'Descripción *',
  'users' => 'Usuarios ',
  'permissions' => 'Permisos ',      
));
            
                  //mensajes
      
    $this->validatorSchema['name']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
    $this->validatorSchema['description']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

    }
}
