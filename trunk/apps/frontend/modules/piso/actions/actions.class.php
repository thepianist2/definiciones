<?php

/**
 * piso actions.
 *
 * @package    definiciones
 * @subpackage piso
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pisoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pisos = Doctrine_Core::getTable('Piso')
      ->createQuery('a')
      ->execute();
  }
  
  
    public function executeMisPisos(sfWebRequest $request)
  {
    $this->pisos = Doctrine_Core::getTable('Piso')
      ->createQuery('a')
      ->where('a.idUsuario =?', $this->getUser()->getGuardUser()->getId())      
      ->execute();
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PisoForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

  }
  
  
    public function executeShow(sfWebRequest $request)
  {
    $this->piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->piso);
  }
  
    
    public function executeShowPorDireccion(sfWebRequest $request)
  {
    $this->piso = Doctrine_Core::getTable('Piso')
      ->createQuery('a')
      ->where('a.direccion LIKE ?', $request->getParameter('direccion'))      
      ->fetchOne();
   
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PisoForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('id'))), sprintf('Object piso does not exist (%s).', $request->getParameter('id')));
    $this->form = new PisoForm($piso);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('id'))), sprintf('Object piso does not exist (%s).', $request->getParameter('id')));
    $this->form = new PisoForm($piso);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('id'))), sprintf('Object piso does not exist (%s).', $request->getParameter('id')));
    $piso->delete();

    $this->redirect('piso/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $errorPiso=false;
    $valores = $request->getParameter($form->getName());
    $direccion = $valores['direccion'];

    
                if($form->getObject()->isNew() or $form->getObject()->direccion != $valores['direccion'])
        {
            if(Doctrine_Core::getTable('Piso')->verificarExiste($direccion))
            {
                 $errorPiso=true;
                 
                 }
                
        }
    
    if ($form->isValid() & $errorPiso==false)
    {
      $piso = $form->save();
      $this->getUser()->setFlash('mensajeSuceso','Ahora agregue las imágenes.');
      $this->redirect('imagenPiso/index?id='.$piso->getId());
    }else{
        if($errorPiso){
            $this->getUser()->setFlash('mensajeError','Esta dirección ya existe en tus pisos');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
}
