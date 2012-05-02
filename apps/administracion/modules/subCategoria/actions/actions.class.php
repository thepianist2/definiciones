<?php

/**
 * subCategoria actions.
 *
 * @package    definiciones
 * @subpackage subCategoria
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subCategoriaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sub_categorias = Doctrine_Core::getTable('subCategoria')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sub_categoria = Doctrine_Core::getTable('subCategoria')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->sub_categoria);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new subCategoriaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new subCategoriaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sub_categoria = Doctrine_Core::getTable('subCategoria')->find(array($request->getParameter('id'))), sprintf('Object sub_categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new subCategoriaForm($sub_categoria);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sub_categoria = Doctrine_Core::getTable('subCategoria')->find(array($request->getParameter('id'))), sprintf('Object sub_categoria does not exist (%s).', $request->getParameter('id')));
    $this->form = new subCategoriaForm($sub_categoria);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sub_categoria = Doctrine_Core::getTable('subCategoria')->find(array($request->getParameter('id'))), sprintf('Object sub_categoria does not exist (%s).', $request->getParameter('id')));
    $sub_categoria->delete();
    $this->getUser()->setFlash('mensajeTerminado','Sub Categoría eliminada.');
    $this->redirect('subCategoria/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
   $errorSubCategoria=false;
   $valores = $request->getParameter($form->getName());
   $nombreSubCategoria = $valores['texto'];
   $idCategoria = $valores['idCategoria'];
   
           if($form->getObject()->isNew() or $form->getObject()->texto != $valores['texto'] or $form->getObject()->idCategoria != $valores['idCategoria'])
        {
            if(Doctrine_Core::getTable('SubCategoria')->verificarExiste($nombreSubCategoria, $idCategoria))
            {
                 $errorSubCategoria=true;}
                
        }
   
    if ($form->isValid() & $errorSubCategoria==false)
    {
      $sub_categoria = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Sub Categoría guardada.');
      $this->redirect('subCategoria/index');
    }else{
       if($errorSubCategoria){
            $this->getUser()->setFlash('mensajeError','Esta sub categoría ya existe, cambie el nombre');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
}
