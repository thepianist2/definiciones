<?php

/**
 * bandejaSalida actions.
 *
 * @package    definiciones
 * @subpackage bandejaSalida
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bandejaSalidaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->bandeja_salidas = Doctrine_Core::getTable('BandejaSalida')
      ->createQuery('a')
      ->Where('a.idUsuarioRemitente =?',$this->getUser()->getGuardUser()->getId())         
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->bandeja_salida = Doctrine_Core::getTable('BandejaSalida')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->bandeja_salida);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BandejaSalidaForm();
    $this->form->setDefault('idUsuarioRemitente', $this->getUser()->getGuardUser()->getId());
    
  }
  
  
    public function executeResponder(sfWebRequest $request)
  {
    $idUsuario = $request->getParameter('idUsuario');
    $this->form = new BandejaSalidaForm();
    $this->form->setDefault('idUsuarioRemitente', $this->getUser()->getGuardUser()->getId());
    $this->form->setDefault('idUsuarioReceptor', $idUsuario);

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BandejaSalidaForm();
    $this->form->setDefault('idUsuarioRemitente', $this->getUser()->getGuardUser()->getId());

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }


  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($bandeja_salida = Doctrine_Core::getTable('BandejaSalida')->find(array($request->getParameter('id'))), sprintf('Object bandeja_salida does not exist (%s).', $request->getParameter('id')));
    $bandeja_salida->delete();

    $this->redirect('bandejaSalida/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $bandeja_salida = $form->save();
      $bandeja_entrada= new BandejaEntrada();
      $bandeja_entrada->setIdUsuarioRemitente($bandeja_salida->getIdUsuarioRemitente());
      $bandeja_entrada->setIdUsuarioReceptor($bandeja_salida->getIdUsuarioReceptor());
      $bandeja_entrada->setMensaje($bandeja_salida->getMensaje());
      $bandeja_entrada->save();
      $this->redirect('bandejaSalida/index');
    }
  }
}
