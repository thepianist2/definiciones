<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      
      
            $this->widgetSchema->setLabels(array(
  'first_name'    => 'Nombre',
  'last_name'   => 'Apellidos',
  'email_address' => 'Email *',
  'username' => 'Usuario *',
  'password' => 'Contraseña *',   
  'password_again' => 'Repita contraseña *',   
));
            
      //                       //ocultar campo de imagenPerfil
      $this->setWidget('imagenPerfil', new sfWidgetFormInputHidden());  
      //mensajes
      
    $this->validatorSchema['email_address']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
    $this->validatorSchema['username']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));    
    $this->validatorSchema['password']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));
  }
}