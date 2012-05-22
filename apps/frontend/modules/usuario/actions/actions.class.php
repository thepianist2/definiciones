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

      $this->redirect('default/index');
    }
  }
}
