<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardFormSignin.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardFormSignin extends BasesfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      
      
    $this->widgetSchema['username']->setLabel('Usuario');
    $this->widgetSchema['password']->setLabel('Contraseña');
    $this->widgetSchema['remember']->setLabel('Recordar');
    
    
                  //mensajes de error
    $this->validatorSchema['username']->setMessages(array('required' => 'Falta el usuario.'));
    $this->validatorSchema['password']->setMessages(array('required' => 'Falta la contraseña.'));
  
  }
}
