<?php

/**
 * BasesfGuardRequestForgotPasswordForm for requesting a forgot password email
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardRequestForgotPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRequestForgotPasswordForm extends BasesfGuardRequestForgotPasswordForm
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      
            $this->widgetSchema->setLabels(array(

  'email_address' => 'Email *',
      
));
          $this->validatorSchema['email_address']->setMessages(array('required' => 'Campo Obligatorio.','invalid' => 'Campo inválido'));

  }
}