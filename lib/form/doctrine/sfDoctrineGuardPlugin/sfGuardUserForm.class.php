<?php

/**
 * sfGuardUser form.
 *
 * @package    definiciones
 * @subpackage form
 * @author     Fabian Allel
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
                  //quitar campos que no usaremos
      unset($this['created_at'], $this['updated_at'], $this['last_login'], $this['algorithm'], $this['salt']);
      
      $this->widgetSchema->setLabels(array(
  'first_name'    => 'Nombre',
  'last_name'   => 'Apellidos',
  'email_address' => 'Email *',
  'username' => 'Login *',
  'password' => 'Contraseña *',
  'is_active' => 'Activo',        
  'is_super_admin' => 'Es Super administrador',        
  'groups_list' => 'Grupos',      
  'permissions_list' => 'Permisos',      
));
      
      //mensajes
      
    $this->validatorSchema['email_address']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
    $this->validatorSchema['username']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));    
    $this->validatorSchema['password']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
  }
}
