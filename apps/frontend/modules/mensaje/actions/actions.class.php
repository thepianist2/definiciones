<?php

/**
 * mensaje actions.
 *
 * @package    definiciones
 * @subpackage mensaje
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mensajeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

  }
  
    public function executeBandejaEntrada(sfWebRequest $request)
  {
      if ($this->getUser()->isAuthenticated()){
       $this->mensajes = Doctrine_Core::getTable('Mensaje')
      ->createQuery('a')
      ->where('a.idUsuarioReceptor =?',$this->getUser()->getGuardUser()->getId())
      ->execute();
          }else{
                $this->mensajes=null;
         }
  }
  
  
      public function executeBandejaSalida(sfWebRequest $request)
  {
      if ($this->getUser()->isAuthenticated()){
       $this->mensajes = Doctrine_Core::getTable('Mensaje')
      ->createQuery('a')
      ->Where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
      ->execute();
          }else{
                $this->mensajes=null;
         }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->mensaje = Doctrine_Core::getTable('Mensaje')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->mensaje);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MensajeForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());
  
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MensajeForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($mensaje = Doctrine_Core::getTable('Mensaje')->find(array($request->getParameter('id'))), sprintf('Object mensaje does not exist (%s).', $request->getParameter('id')));
    $this->form = new MensajeForm($mensaje);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($mensaje = Doctrine_Core::getTable('Mensaje')->find(array($request->getParameter('id'))), sprintf('Object mensaje does not exist (%s).', $request->getParameter('id')));
    $this->form = new MensajeForm($mensaje);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($mensaje = Doctrine_Core::getTable('Mensaje')->find(array($request->getParameter('id'))), sprintf('Object mensaje does not exist (%s).', $request->getParameter('id')));
    $mensaje->delete();
    $this->getUser()->setFlash('mensajeTerminado','Documento eliminado.');

    $this->redirect('mensaje/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $mensaje = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Documento guardado.');

      $this->redirect('mensaje/index');
    }
  }
}
