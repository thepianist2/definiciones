<?php

/**
 * categoriaContenido actions.
 *
 * @package    definiciones
 * @subpackage categoriaContenido
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoriaContenidoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->categoria_contenidos = Doctrine_Core::getTable('categoriaContenido')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->categoria_contenido = Doctrine_Core::getTable('categoriaContenido')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->categoria_contenido);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new categoriaContenidoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new categoriaContenidoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($categoria_contenido = Doctrine_Core::getTable('categoriaContenido')->find(array($request->getParameter('id'))), sprintf('Object categoria_contenido does not exist (%s).', $request->getParameter('id')));
    $this->form = new categoriaContenidoForm($categoria_contenido);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($categoria_contenido = Doctrine_Core::getTable('categoriaContenido')->find(array($request->getParameter('id'))), sprintf('Object categoria_contenido does not exist (%s).', $request->getParameter('id')));
    $this->form = new categoriaContenidoForm($categoria_contenido);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($categoria_contenido = Doctrine_Core::getTable('categoriaContenido')->find(array($request->getParameter('id'))), sprintf('Object categoria_contenido does not exist (%s).', $request->getParameter('id')));
    $categoria_contenido->delete();
    $this->getUser()->setFlash('mensajeTerminado','Categoria Eliminada.');
    $this->redirect('categoriaContenido/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
   $errorCategoriaContenido=false;
   $valores = $request->getParameter($form->getName());
   $nombreCategoria = $valores['texto'];
    
           if($form->getObject()->isNew() or $form->getObject()->texto != $valores['texto'])
        {
            if(Doctrine_Core::getTable('CategoriaContenido')->verificarExiste($nombreCategoria))
            {
                 $errorCategoriaContenido=true;}
                
        }
    if ($form->isValid() & $errorCategoriaContenido==false)
    {
      $categoria_contenido = $form->save();
                $this->getUser()->setFlash('mensajeTerminado','Categoria Guardada.');
  
      

      $this->redirect('categoriaContenido/index');
    }else{
        if($errorCategoriaContenido){
            $this->getUser()->setFlash('mensajeError','Esta categoría ya existe, cambie el nombre');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
}
