<?php

/**
 * categoria actions.
 *
 * @package    definiciones
 * @subpackage categoria
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->categorias = Doctrine_Core::getTable('categoria')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->categoria = Doctrine_Core::getTable('categoria')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->categoria);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new categoriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new categoriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($categoria = Doctrine_Core::getTable('categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new categoriaForm($categoria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($categoria = Doctrine_Core::getTable('categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new categoriaForm($categoria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($categoria = Doctrine_Core::getTable('categoria')->find(array($request->getParameter('id'))), sprintf('Object categoria does not exist (%s).', $request->getParameter('id')));
    $categoria->delete();
    $this->getUser()->setFlash('mensajeTerminado','Categoía eliminada.');
    $this->redirect('categoria/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
   $errorCategoria=false;
   $valores = $request->getParameter($form->getName());
   $nombreCategoria = $valores['texto'];
   
        if($form->getObject()->isNew() or $form->getObject()->texto != $valores['texto'])
        {
            if(Doctrine_Core::getTable('Categoria')->verificarExiste($nombreCategoria))
            {
                 $errorCategoria=true;}
                
        }
    if ($form->isValid() & $errorCategoria==false)
    {
      $categoria = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Categoría guardada.');
      $this->redirect('categoria/index');
    }else{
        if($errorCategoria){
            $this->getUser()->setFlash('mensajeError','Esta categoría ya existe, cambie el nombre');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
}
