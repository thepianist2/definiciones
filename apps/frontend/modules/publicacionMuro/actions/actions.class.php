<?php

/**
 * publicacionMuro actions.
 *
 * @package    definiciones
 * @subpackage publicacionMuro
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicacionMuroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuarioEscribe =?',$this->getUser()->getGuardUser()->getId())
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = '@publicacionMuro_index_page';
    

            
  }
  
  
  	/**
	 * Action del Menu principal
	 *
	 * @param
	 */
	public function executeComentariosIndex()
	{
	    $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuarioEscribe =?',$this->getUser()->getGuardUser()->getId())
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = '@publicacionMuro_index_page';
    
	
	}

  
    public function executeIndexEntrarMuro(sfWebRequest $request)
  {
       if($request->hasParameter('idPerfil')){  
    $this->getUser()->setAttribute('idPerfil', $request->getParameter('idPerfil'));             
   
    $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuarioEscribe =?',$request->getParameter('idPerfil'))
      ->orderBy('a.created_at DESC');
       
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = '@publicacionMuro_indexEntraMuro_page';
        
        $this->usuario=Doctrine_Core::getTable('sfGuardUser')->obtenerById($request->getParameter('idPerfil'));
       }else{
           $this->getUser()->setFlash('mensajeError','Ups! ha ocurrido un error!...intentalo nuevamente');
       }
            
  }
  
    public function executeBuscarEntraMuro(sfWebRequest $request)
    {
        if($this->getUser()->hasAttribute('buscadorEntraMuro') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorEntraMuro');
            $query = $buscador['query'];
            $fecha=$buscador['fecha'];
        }
        else
        {
            $query = $request->getParameter('query');
            $fecha = $request->getParameter('fecha');
            $this->getUser()->setAttribute('buscadorEntraMuro', $request->getParameterHolder()->getAll());
        }
        
        
      if($this->getUser()->hasAttribute('idPerfil')){
        
        
     $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuarioEscribe =?',$this->getUser()->getAttribute('idPerfil'))
      ->andWhere('a.publicacion LIKE ?','%'.$query.'%')
      ->andwhere('a.created_at LIKE ?','%'.$fecha.'%')                 
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = 'publicacionMuro/buscarEntraMuro';
        
        $this->fecha = $fecha;
        $this->query = $query;
 
         $this->setTemplate('indexEntrarMuro');
      }else{
        $this->getUser()->setFlash('mensajeError','Ups! ha ocurrido un error!...intentalo nuevamente');

      }
    }
  
  
      public function executeNuevaOtroMuro(sfWebRequest $request)
  {
    $idUsuario=$this->getUser()->getGuardUser()->getId();
    $publi=$request->getParameter('elm1');
    if(strlen($publi)>10){
    
    $publicacion= new PublicacionMuro();
    $publicacion->setIdUsuario($idUsuario);
    $publicacion->setIdUsuarioEscribe($this->getUser()->getAttribute('idPerfil'));
    $publicacion->setPublicacion($publi);
    $publicacion->save();
    $this->getUser()->setFlash('mensajeTerminado','Mensaje publicado en el muro');
    
    }else{
        
$this->getUser()->setFlash('mensajeError','El mensaje debe tener al menos 10 caracteres');

        
    }
    $this->redirect('publicacionMuro/indexEntrarMuro?idPerfil='.$this->getUser()->getAttribute('idPerfil'));
  }
  
  
    public function executeIndexTuPublicado(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
      ->andWhere('a.idUsuarioEscribe != ?',$this->getUser()->getGuardUser()->getId())        
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = '@publicacionMuro_indexTuPublicado_page';
    

            
  }
  
  
  
      public function executeBuscarTuPublicado(sfWebRequest $request)
  {
          
              if($this->getUser()->hasAttribute('buscadorTuPublicado') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorTuPublicado');
            $query = $buscador['query'];
            $fecha=$buscador['fecha'];
        }
        else
        {
            $query = $request->getParameter('query');
            $fecha = $request->getParameter('fecha');
            $this->getUser()->setAttribute('buscadorTuPublicado', $request->getParameterHolder()->getAll());
        }    
          
          
          
    $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
      ->andWhere('a.idUsuarioEscribe != ?',$this->getUser()->getGuardUser()->getId())        
      ->andWhere('a.publicacion LIKE ?','%'.$query.'%')
      ->andwhere('a.created_at LIKE ?','%'.$fecha.'%')       
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = 'publicacionMuro/buscarTuPublicado';
        
        $this->fecha = $fecha;
        $this->query = $query;
 
         $this->setTemplate('indexTuPublicado');
    

            
  }
  
  
    public function executeIndexAmigos(sfWebRequest $request)
  {
        
            $amigos = Doctrine_Core::getTable('Amigo')
      ->createQuery('a')
      ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())     
      ->execute();
    
                 
   	foreach ($amigos as $c) {
   		$r[$c->id]=$c->idUsuarioAmigo;
   	}
        if(!count($amigos)>0){
            $r[0]=0;
        }
    
        
        
        
        
    $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->whereIn('a.idUsuario',$r)      
      ->where('a.idUsuario =?',1)      
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = '@publicacionMuro_indexAmigos_page';
    

            
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PublicacionMuroForm();
  }

  
    public function executeNuevaMio(sfWebRequest $request)
  {
    $idUsuario=$this->getUser()->getGuardUser()->getId();
    $publi=$request->getParameter('elm1');
    if(strlen($publi)>10){
    
    $publicacion= new PublicacionMuro();
    $publicacion->setIdUsuario($idUsuario);
    $publicacion->setIdUsuarioEscribe($idUsuario);
    $publicacion->setPublicacion($publi);
    $publicacion->save();
    $this->getUser()->setFlash('mensajeTerminado','Mensaje publicado en tu muro');
    
    }else{
        
$this->getUser()->setFlash('mensajeError','El mensaje debe tener al menos 10 caracteres');

        
    }
    $this->redirect('publicacionMuro/index');
  }
  
  
  
     public function executeBuscarMiMuro(sfWebRequest $request)
    {
        if($this->getUser()->hasAttribute('buscadorMiMuro') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorMiMuro');
            $query = $buscador['query'];
            $fecha=$buscador['fecha'];
        }
        else
        {
            $query = $request->getParameter('query');
            $fecha = $request->getParameter('fecha');
            $this->getUser()->setAttribute('buscadorMiMuro', $request->getParameterHolder()->getAll());
        }
        
        
      
        
        
     $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuarioEscribe =?',$this->getUser()->getGuardUser()->getId())
      ->andWhere('a.publicacion LIKE ?','%'.$query.'%')
      ->andwhere('a.created_at LIKE ?','%'.$fecha.'%')                 
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = 'publicacionMuro/buscarMiMuro';
        
        $this->fecha = $fecha;
        $this->query = $query;
 
         $this->setTemplate('index');
    }
    
    
    
      public function executeBuscarMuroAmigos(sfWebRequest $request)
    {
        if($this->getUser()->hasAttribute('buscadorMuroAmigos') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorMuroAmigos');
            $query = $buscador['query'];
            $fecha=$buscador['fecha'];
        }
        else
        {
            $query = $request->getParameter('query');
            $fecha = $request->getParameter('fecha');
            $this->getUser()->setAttribute('buscadorMuroAmigos', $request->getParameterHolder()->getAll());
        }
        
        
                  $amigos = Doctrine_Core::getTable('Amigo')
      ->createQuery('a')
      ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())            
      ->execute();
    
                 
   	foreach ($amigos as $c) {
   		$r[$c->id]=$c->idUsuarioAmigo;
   	}
        if(!count($amigos)>0){
            $r[0]=0;
        }
    
        
        
        
     $q = Doctrine_Core::getTable('PublicacionMuro')
      ->createQuery('a')
      ->where('a.idUsuarioEscribe =?',$this->getUser()->getGuardUser()->getId())
      ->andWhere('a.publicacion LIKE ?','%'.$query.'%')
      ->andwhere('a.created_at LIKE ?','%'.$fecha.'%')                
      ->whereIn('a.idUsuario',$r)           
      ->orderBy('a.created_at DESC');
    
        $this->publicacion_muros = new sfDoctrinePager('PublicacionMuro', 6);
	$this->publicacion_muros->setQuery($q);   	
        $this->publicacion_muros->setPage($this->getRequestParameter('page',1));
	$this->publicacion_muros->init();
        //route del paginado
        $this->action = 'publicacionMuro/buscarMuroAmigos';
        
        $this->fecha = $fecha;
        $this->query = $query;
 
         $this->setTemplate('indexAmigos');
    }
  
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PublicacionMuroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($publicacion_muro = Doctrine_Core::getTable('PublicacionMuro')->find(array($request->getParameter('id'))), sprintf('Object publicacion_muro does not exist (%s).', $request->getParameter('id')));
    $this->form = new PublicacionMuroForm($publicacion_muro);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($publicacion_muro = Doctrine_Core::getTable('PublicacionMuro')->find(array($request->getParameter('id'))), sprintf('Object publicacion_muro does not exist (%s).', $request->getParameter('id')));
    $this->form = new PublicacionMuroForm($publicacion_muro);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {

    $this->forward404Unless($publicacion_muro = Doctrine_Core::getTable('PublicacionMuro')->find(array($request->getParameter('id'))), sprintf('Object publicacion_muro does not exist (%s).', $request->getParameter('id')));
    $publicacion_muro->delete();

   
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $publicacion_muro = $form->save();

      $this->redirect('publicacionMuro/edit?id='.$publicacion_muro->getId());
    }
  }
}
