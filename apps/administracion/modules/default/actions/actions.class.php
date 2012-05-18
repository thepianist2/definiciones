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
    $q = Doctrine_Core::getTable('palabra')
      ->createQuery('a');
             $this->palabras = new sfDoctrinePager('Palabra', 5);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();
        //route del paginado
        $this->action = '@default_index_page';
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
    $this->getUser()->setFlash('mensajeTerminado','Palabra eliminada.');
    $this->redirect('default/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    $errorCategoria=false;
   $valores = $request->getParameter($form->getName());
   $palabra = $valores['textoPalabra'];
   $idSubCategoria = $valores['idSubCategoria'];
   $idUsuario = $valores['idUsuario'];
   $errorPalabra=false;
   
   
            if($form->getObject()->isNew() or $form->getObject()->textoPalabra != $valores['textoPalabra'] or $form->getObject()->idSubCategoria != $valores['idSubCategoria'] or $form->getObject()->idUsuario != $valores['idUsuario'])
        {
            if(Doctrine_Core::getTable('Palabra')->verificarExiste($idSubCategoria,$idUsuario,$palabra))
            {
                 $errorPalabra=true;}
                
        }
    
    if ($form->isValid() & $errorPalabra==false)
    {
      $palabra = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Palabra guardada.');
      $this->redirect('default/index');
    }else
    {
       if($errorPalabra){
            $this->getUser()->setFlash('mensajeError','Esta palabra ya existe');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
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
