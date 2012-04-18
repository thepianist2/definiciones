<?php

/**
 * sfGuardPermission form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionForm extends PluginsfGuardPermissionForm
{
  public function configure()
  {
            $this->widgetSchema->setLabels(array(
  'name'=> 'Nombre *',
  'description'=> 'Descripción ',       
  'groups_list' => 'Grupos',      
  'users_list' => 'Usuarios',        
));
            
                  //mensajes
      
    $this->validatorSchema['name']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
      
      
      
  }
}
