<?php

/**
 * imagenPiso actions.
 *
 * @package    definiciones
 * @subpackage imagenPiso
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imagenPisoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
     if($request->hasParameter('id')){  
      $this->getUser()->setAttribute('idPiso', $request->getParameter('id')); 
    $this->imagen_pisos = Doctrine_Core::getTable('ImagenPiso')
      ->createQuery('a')
      ->where('a.idPiso =?',$request->getParameter('id'))      
      ->execute();
    $this->form = new ImagenPisoForm();
    $this->form->setDefault('idPiso', $this->getUser()->getAttribute('idPiso'));
    
    $this->idPiso=$request->getParameter('id');
     }
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ImagenPisoForm();
    $this->form->setDefault('idPiso', $this->getUser()->getAttribute('idPiso'));
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    
    
    
    
    $this->imagen_pisos = Doctrine_Core::getTable('ImagenPiso')
      ->createQuery('a')
      ->where('a.idPiso =?',$this->getUser()->getAttribute('idPiso'))      
      ->execute();
    $this->form = new ImagenPisoForm();
    $this->form->setDefault('idPiso', $this->getUser()->getAttribute('idPiso'));
    
    $this->idPiso=$this->getUser()->getAttribute('idPiso');
    
    
    
    
    $this->form = new ImagenPisoForm();
    $this->form->setDefault('idPiso', $this->getUser()->getAttribute('idPiso'));
    $this->processForm($request, $this->form);

    $this->setTemplate('index');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($imagen_piso = Doctrine_Core::getTable('ImagenPiso')->find(array($request->getParameter('id'))), sprintf('Object imagen_piso does not exist (%s).', $request->getParameter('id')));
    $this->form = new ImagenPisoForm($imagen_piso);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($imagen_piso = Doctrine_Core::getTable('ImagenPiso')->find(array($request->getParameter('id'))), sprintf('Object imagen_piso does not exist (%s).', $request->getParameter('id')));
    $this->form = new ImagenPisoForm($imagen_piso);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {

    $this->forward404Unless($imagen_piso = Doctrine_Core::getTable('ImagenPiso')->find(array($request->getParameter('id'))), sprintf('Object imagen_piso does not exist (%s).', $request->getParameter('id')));
    $imagen_piso->delete();

    $this->redirect('imagenPiso/index?id='.$this->getUser()->getAttribute('idPiso'));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $imagen_piso = $form->save();
      $this->getUser()->setFlash('mensajeSuceso','Imágen guardada.');
      $this->redirect('imagenPiso/index?id='.$this->getUser()->getAttribute('idPiso'));
    }
  }
}
