<?php

class BasesfGuardRegisterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setFlash('notice', 'Usted ya está registrado y conectado!');
      $this->redirect('@homepage');
    }

    $this->form = new sfGuardRegisterForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {

   
        $user = $this->form->save();

        
     $this->redirect('usuario/envioConfirmacion?email=' . $user->getEmailAddress());   
//        $this->getUser()->signIn($user);

//        $this->redirect('@homepage');
      }
    }
  }
}