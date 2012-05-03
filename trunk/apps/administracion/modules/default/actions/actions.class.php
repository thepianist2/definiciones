<?php

/**
 * default actions.
 *
 * @package    definiciones
 * @subpackage default
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->palabras = Doctrine_Core::getTable('palabra')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->palabra = Doctrine_Core::getTable('palabra')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->palabra);
  }

  public function executeNew(sfWebRequest $request)
  {
      
    $this->form = new palabraForm();
    $this->categorias = CategoriaTable::getDisponibles();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new palabraForm();
    $this->categorias = CategoriaTable::getDisponibles();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($palabra = Doctrine_Core::getTable('palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $this->form = new palabraForm($palabra);
    $this->categorias = CategoriaTable::getDisponibles();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($palabra = Doctrine_Core::getTable('palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $this->form = new palabraForm($palabra);
    $this->categorias = CategoriaTable::getDisponibles();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($palabra = Doctrine_Core::getTable('palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $palabra->delete();

    $this->redirect('default/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $palabra = $form->save();

      $this->redirect('default/edit?id='.$palabra->getId());
    }
  }
  
  
    
      public function executeGetSubCategoriasOptions(sfWebRequest $request) {
        if ($request->hasParameter('id')) {
            $idCategoria = $request->getParameter('id');
            $this->subCategorias = SubCategoriaTable::getDisponiblesPorCategoria($idCategoria);
        } else {
            $this->subCategorias = false;
        }
    }
}
