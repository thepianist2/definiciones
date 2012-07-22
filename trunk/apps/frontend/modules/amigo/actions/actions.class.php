<?php

/**
 * amigo actions.
 *
 * @package    definiciones
 * @subpackage amigo
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class amigoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
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
    
        $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      ->whereIn('a.id',$r);
    
           $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        //route del paginado
        $this->action = '@amigo_index_page';
    
  }
  
  
  
  
    	public function executeAddAmigo(sfWebRequest $request) {
            
		$amigo= new Amigo();
                $amigo->setIdUsuario($request->getParameter('usuario_id_uno'));
		$amigo->setIdUsuarioAmigo($request->getParameter('usuario_id'));
               
                
                
                if(Doctrine_Core::getTable('Amigo')->verificarExiste($amigo->getIdUsuario(),$amigo->getIdUsuarioAmigo())){
                              
                    
//              $this->getUser()->setFlash('mensajeError','Esta palabra ya existe en tu perfil');

            }else{
                $amigo->save();
//                $this->getUser()->setFlash('mensajeTerminado','Palabra agregada a con éxito.');
            }
	}
  
  
  
     public function executeBuscar(sfWebRequest $request)
  {
        
        
        
        if($this->getUser()->hasAttribute('buscadorAmigo') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorAmigo');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorAmigo', $request->getParameterHolder()->getAll());
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
    
        
            $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      
      ->where('a.first_name LIKE ?','%'.$query.'%')
      ->where('a.last_name LIKE ?','%'.$query.'%')        
     ->where('a.username LIKE ?','%'.$query.'%')
     ->whereIn('a.id',$r)
     ->whereNotIn('a.id',array('1',$this->getUser()->getGuardUser()->getId()));
           $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        
        
            $this->action = 'amigo/buscar';

            $this->query = $query;

            $this->setTemplate('index');
    }
  
       public function executeBuscarSolicitudes(sfWebRequest $request)
  {
           
           if($this->getUser()->hasAttribute('buscadorAmigo') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorAmigo');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorAmigo', $request->getParameterHolder()->getAll());
        }  
           
           
           
           
                $amigos = Doctrine_Core::getTable('Amigo')
      ->createQuery('a')
      ->andWhere('a.idUsuarioAmigo =?',$this->getUser()->getGuardUser()->getId())            
      ->execute();
    
                 
   	foreach ($amigos as $c) {
   		$r[$c->id]=$c->idUsuario;
   	}
        if(!count($amigos)>0){
            $r[0]=0;
        }
        
           $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      ->where('a.first_name LIKE ?','%'.$query.'%')
      ->where('a.last_name LIKE ?','%'.$query.'%')        
     ->where('a.username LIKE ?','%'.$query.'%')                   
      ->whereIn('a.id',$r);
    
           $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        //route del paginado
        
            $this->action = 'amigo/buscarSolicitudes';

            $this->query = $query;

            $this->setTemplate('solicitudes');
  }
          
    
    
    
    
    
        
       public function executeSolicitudes(sfWebRequest $request)
  {
                $amigos = Doctrine_Core::getTable('Amigo')
      ->createQuery('a')
      ->andWhere('a.idUsuarioAmigo =?',$this->getUser()->getGuardUser()->getId())            
      ->execute();
    
                 
   	foreach ($amigos as $c) {
   		$r[$c->id]=$c->idUsuario;
   	}
        if(!count($amigos)>0){
            $r[0]=0;
        }
        
           $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      ->whereIn('a.id',$r);
    
           $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        //route del paginado
        $this->action = '@amigo_solicitudes_page';
  }
       
       
       public function executeBuscarTodos(sfWebRequest $request)
  {
        
        
        
        if($this->getUser()->hasAttribute('buscadorAmigo') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorAmigo');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorAmigo', $request->getParameterHolder()->getAll());
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
        
            $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      
      ->where('a.first_name LIKE ?','%'.$query.'%')
      ->where('a.last_name LIKE ?','%'.$query.'%')        
     ->where('a.username LIKE ?','%'.$query.'%')
     ->whereNotIn('a.id',array('1',$this->getUser()->getGuardUser()->getId()))
     ->whereNotIn('a.id',$r);       
        $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        
        
            $this->action = 'amigo/buscarTodos';

            $this->query = $query;

            $this->setTemplate('indexTodos');
    }
    
    
     public function executeIndexTodos(sfWebRequest $request){

         
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

    $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      ->whereNotIn('a.id',array('1',$this->getUser()->getGuardUser()->getId()))
      ->whereNotIn('a.id',$r)          
      ->orderBy('a.username ASC');
    
           $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        //route del paginado
        $this->action = '@amigo_indexTodos_page';
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AmigoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AmigoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($amigo = Doctrine_Core::getTable('Amigo')->find(array($request->getParameter('id'))), sprintf('Object amigo does not exist (%s).', $request->getParameter('id')));
    $this->form = new AmigoForm($amigo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($amigo = Doctrine_Core::getTable('Amigo')->find(array($request->getParameter('id'))), sprintf('Object amigo does not exist (%s).', $request->getParameter('id')));
    $this->form = new AmigoForm($amigo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

       $amigo = Doctrine_Core::getTable('Amigo')
      ->createQuery('a')
      ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())   
      ->andWhere('a.idUsuarioAmigo =?',$request->getParameter('id'))        
      ->fetchOne();
       
       $amigo->delete();
      $this->getUser()->setFlash('mensajeTerminado','Amigo eliminado.');

    $this->redirect('amigo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $amigo = $form->save();

      $this->redirect('amigo/edit?id='.$amigo->getId());
    }
  }
}
