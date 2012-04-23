<?php

/**
 * contenido actions.
 *
 * @package    definiciones
 * @subpackage contenido
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenidoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->contenidos = Doctrine_Core::getTable('contenido')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->contenido = Doctrine_Core::getTable('contenido')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->contenido);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new contenidoForm();
    if ($this->getUser()->isAuthenticated()) {
        $this->form->setDefault('idUsuario', $this->getUser()->getAttribute('id'));
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new contenidoForm();
    if ($this->getUser()->isAuthenticated()) {
        $this->form->setDefault('idUsuario', $this->getUser()->getAttribute('id'));
    }
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($contenido = Doctrine_Core::getTable('contenido')->find(array($request->getParameter('id'))), sprintf('Object contenido does not exist (%s).', $request->getParameter('id')));
    $this->form = new contenidoForm($contenido);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($contenido = Doctrine_Core::getTable('contenido')->find(array($request->getParameter('id'))), sprintf('Object contenido does not exist (%s).', $request->getParameter('id')));
    $this->form = new contenidoForm($contenido);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($contenido = Doctrine_Core::getTable('contenido')->find(array($request->getParameter('id'))), sprintf('Object contenido does not exist (%s).', $request->getParameter('id')));
    $contenido->delete();
    $this->getUser()->setFlash('mensajeTerminado','Contenido eliminado.');
    $this->redirect('contenido/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $errorContenido=false;
   $valores = $request->getParameter($form->getName());
   $titulo = $valores['titulo'];
   $idCategoriaContenido = $valores['idCategoriaContenido'];
   
     if($form->getObject()->isNew() or $form->getObject()->titulo != $valores['titulo'] or $form->getObject()->idCategoriaContenido != $valores['idCategoriaContenido'] )
        {
            if(Doctrine_Core::getTable('Contenido')->verificarExiste($titulo,$idCategoriaContenido))
            {
                 $errorContenido=true;}
                
        }
    
    if ($form->isValid() & $errorContenido==false)
    {
      $contenido = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Contenido guardado.');
      $this->redirect('contenido/index');
    }else{
        if($errorContenido){
            $this->getUser()->setFlash('mensajeError','Este contenido ya existe, cambie el título o seleccione otra categoría');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
}
