<?php

/**
 * usuario actions.
 *
 * @package    definiciones
 * @subpackage usuario
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions
{
    
    
        
    public function executeIndex(sfWebRequest $request){
    
    }

    
    
    
    
     public function executeEditarUsuario(sfWebRequest $request) {
        $this->forward404Unless($usuario = Doctrine_Core::getTable('sfGuardUser')->find(array($this->getUser()->getGuardUser()->getId())), sprintf('Object usuario does not exist (%s).', $this->getUser()->getAttribute('id')));
        $this->form = new UsuarioFrontendForm($usuario);
        $this->form->setDefault('password',null);
    }   


  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
   $this->forward404Unless($usuario = Doctrine_Core::getTable('sfGuardUser')->find(array($this->getUser()->getGuardUser()->getId())), sprintf('Object usuario does not exist (%s).', $this->getUser()->getAttribute('id')));
    
 
        $this->form = new UsuarioFrontendForm($usuario);
        $this->form->setDefault('password',null);

    $this->processForm($request, $this->form);

    $this->setTemplate('editarUsuario');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sf_guard_user = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Usuario editado.');

      $this->redirect('usuario/index');
    }
  }
  
    
    public function executeShow(sfWebRequest $request)
  {
    $this->sf_guard_user = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->sf_guard_user);
  }
  
  
      
    public function executeEnvioConfirmacion(sfWebRequest $request) {
        $this->usuario = Doctrine::getTable('sfGuardUser')
                ->createQuery('u')
                ->where('u.email_address = ?', $request->getParameter('email'))
                ->fetchOne();
        $to = $this->usuario->getEmailAddress();
        $from = 'administracion@allel.es';
        $url_base = 'http://seria.allel.es';
        $asunto = 'Alta nuevo usuario';
        $mailBody = $this->getPartial('mailBody', array('e_mail' => $to, 'url_base' => $url_base, 'asunto' => $asunto,'usuario'=>$this->usuario));

       try {
           $mensaje = Swift_Message::newInstance()
                        ->setFrom($from)
                        ->setTo($to)
                        ->setSubject($asunto)
                        ->setBody($mailBody, 'text/html');

           sfContext::getInstance()->getMailer()->send($mensaje);
           $envio_ok = true;
//           echo "enviado ok con $from $to $asunto<br>";
//           echo "$mailBody<br>";

       }
       catch (Exception $e)
       {
           $envio_ok = false;
           echo "error al enviar";
       }

    }

     
    
        public function executeConfirmarAlta(sfWebRequest $request) {
        $usuario = Doctrine::getTable('sfGuardUser')
                ->createQuery('u')
                ->where('u.email_address = ?', $request->getParameter('e_mail'))
                ->fetchOne();
        //echo $usuario->id;
        $usuario->setIsActive(1);
        $usuario->save();
        $this->getUser()->signIn($usuario);
        $this->getUser()->setFlash('mensajeTerminado','Cuenta activada correctamente.');
        $this->redirect('default/index');

    }
}
