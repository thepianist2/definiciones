<?php

/**
 * album actions.
 *
 * @package    definiciones
 * @subpackage album
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class albumActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
                  if ($this->getUser()->isAuthenticated()){
    $q = Doctrine_Core::getTable('Album')
      ->createQuery('a')
      ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId());
    
        $this->albums = new sfDoctrinePager('album', 8);
	$this->albums->setQuery($q);   	
        $this->albums->setPage($this->getRequestParameter('page',1));
	$this->albums->init();
        //route del paginado
        $this->action = '@album_index_page';
    
     }else{
                $this->albums=null;
         }
  }
  
    public function executeBuscar(sfWebRequest $request)
  {
         if($this->getUser()->hasAttribute('buscadorAlbum') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorAlbum');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorAlbum', $request->getParameterHolder()->getAll());
        }
        
        
        $q = Doctrine_Core::getTable('Album')
      ->createQuery('a')
      ->where('a.descripcion LIKE ?','%'.$query.'%')          
      ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId());
    
        $this->albums = new sfDoctrinePager('album', 8);
	$this->albums->setQuery($q);   	
        $this->albums->setPage($this->getRequestParameter('page',1));
	$this->albums->init();
        
            $this->action = 'album/buscar';

            $this->query = $query;

            $this->setTemplate('index');
    }

  public function executeShow(sfWebRequest $request)
  {
    $this->album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->album);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AlbumForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AlbumForm();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlbumForm($album);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $this->form = new AlbumForm($album);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($album = Doctrine_Core::getTable('Album')->find(array($request->getParameter('id'))), sprintf('Object album does not exist (%s).', $request->getParameter('id')));
    $album->delete();

    $this->redirect('album/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
   $valores = $request->getParameter($form->getName());
   $descripcion = $valores['descripcion'];
   $idUsuario = $valores['idUsuario'];
   $errorAlbum=false;
    
   
      
            if($form->getObject()->isNew() or $form->getObject()->descripcion != $valores['descripcion'] or $form->getObject()->idUsuario != $valores['idUsuario'])
        {
            if(Doctrine_Core::getTable('Album')->verificarExiste($idUsuario,$descripcion))
            {
                 $errorAlbum=true;}
                
        }
    
    if ($form->isValid() & $errorAlbum==false)
    {
      $album = $form->save();
      $this->getUser()->setFlash('mensajeTerminado','Ahora agrega las imágenes.');
//      $this->redirect('imagen/new?idAlbum='.$album->id);
            $this->redirect('album/index');

    }else
    {
       if($errorAlbum){
            $this->getUser()->setFlash('mensajeError','Esta descripción ya existe');
        }else{
            $this->getUser()->setFlash('mensajeError','Porfavor, revise los campos marcados.');
        }
    }
  }
}
