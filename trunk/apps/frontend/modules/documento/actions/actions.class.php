<?php

/**
 * documento actions.
 *
 * @package    definiciones
 * @subpackage documento
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class documentoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
            if ($this->getUser()->isAuthenticated()){
    $this->documentos = Doctrine_Core::getTable('Documento')
      ->createQuery('a')
      ->Where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
      ->execute();
            }else{
                $this->documentos=null;
            }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->documento);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DocumentoForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DocumentoForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id'))), sprintf('Object documento does not exist (%s).', $request->getParameter('id')));
    $this->form = new DocumentoForm($documento);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id'))), sprintf('Object documento does not exist (%s).', $request->getParameter('id')));
    $this->form = new DocumentoForm($documento);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($documento = Doctrine_Core::getTable('Documento')->find(array($request->getParameter('id'))), sprintf('Object documento does not exist (%s).', $request->getParameter('id')));
    $documento->delete();
    $this->getUser()->setFlash('mensajeTerminado','Documento eliminado.');

    $this->redirect('documento/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $errorTitulo=false;
   $valores = $request->getParameter($form->getName());
   $titulo = $valores['titulo'];
   $idUsuario = $valores['idUsuario'];
   $errorTitulo=false;
   
   
            if($form->getObject()->isNew() or $form->getObject()->titulo != $valores['titulo'] or $form->getObject()->idUsuario != $valores['idUsuario'] )
        {
            if(Doctrine_Core::getTable('Documento')->verificarExiste($idUsuario,$titulo))
            {
                 $errorTitulo=true;}
                
        }
    
    
    
    if ($form->isValid())
    {
      $documento = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Documento guardado.');

      $this->redirect('documento/index');
    }else
    {
       if($errorTitulo){
            $this->getUser()->setFlash('mensajeError','Este título ya existe');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
}
