<?php

/**
 * bandejaEntrada actions.
 *
 * @package    definiciones
 * @subpackage bandejaEntrada
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bandejaEntradaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
            if ($this->getUser()->isAuthenticated()){
                
    $mensajes = Doctrine_Core::getTable('BandejaEntrada')
      ->createQuery('a')
      ->where('a.idUsuarioReceptor =?',$this->getUser()->getGuardUser()->getId())      
      ->execute();
    
                 
   	foreach ($mensajes as $c) {
   		$r[$c->id]=$c->idUsuarioRemitente;
   	}
        if(!count($mensajes)>0){
            $r[0]=0;
        }
    
        $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
//      ->whereNotIn('a.id',array('1',$this->getUser()->getGuardUser()->getId()))
      ->andWhereIn('a.id',$r);
        
        $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        //route del paginado
        $this->action = '@bandejaEntrada_index_page';
        
        
        
              }else{
                $this->sf_guard_users=null;
         }
  }
  
  
     public function executeBuscar(sfWebRequest $request)
    {
        if($this->getUser()->hasAttribute('buscadorBandejaEntrada') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorBandejaEntrada');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorBandejaEntrada', $request->getParameterHolder()->getAll());
        }
        
              if ($this->getUser()->isAuthenticated()){
                
    $mensajes = Doctrine_Core::getTable('BandejaEntrada')
      ->createQuery('a')
      ->where('a.idUsuarioReceptor =?',$this->getUser()->getGuardUser()->getId())       
      ->execute();
              }
                 
   	foreach ($mensajes as $c) {
   		$r[$c->id]=$c->idUsuarioRemitente;
   	}
        if(!count($mensajes)>0){
            $r[0]=0;
        }
    
        $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      ->where('a.first_name LIKE ?','%'.$query.'%')
      ->where('a.last_name LIKE ?','%'.$query.'%')        
     ->where('a.username LIKE ?','%'.$query.'%')
      ->WhereIn('a.id',$r);
        
        $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        //route del paginado
        $this->action = 'bandejaEntrada/buscar';
        
            $this->query = $query;

            $this->setTemplate('index');
        
    }
  
    
    
    
         public function executeBuscarMensaje(sfWebRequest $request)
    {
        if($this->getUser()->hasAttribute('buscadorBandejaEntradaMensaje') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorBandejaEntradaMensaje');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorBandejaEntradaMensaje', $request->getParameterHolder()->getAll());
        }
        
                    
    $q = Doctrine_Core::getTable('BandejaEntrada')
      ->createQuery('a')
     ->where('a.mensaje LIKE ?','%'.$query.'%')           
     ->andWhere('a.idUsuarioReceptor =?',$this->getUser()->getGuardUser()->getId());
//     ->where('a.idUsuarioRemitente =?',$request->getParameter('idUsuario'));
 
     
                
        $this->bandeja_entradas = new sfDoctrinePager('bandejaEntrada', 10);
	$this->bandeja_entradas->setQuery($q);   	
        $this->bandeja_entradas->setPage($this->getRequestParameter('page',1));
	$this->bandeja_entradas->init();
        $this->action = 'bandejaEntrada/buscarMensaje';
        
            $this->query = $query;

            $this->setTemplate('dentroUsuario');
    }
  
    public function executeDentroUsuario(sfWebRequest $request)
  {
            if ($this->getUser()->isAuthenticated()){
                if($request->getParameter('idUsuario')){
                    
    $this->getUser()->setAttribute('idUsuario', $request->getParameter('idUsuario'));          
    $q = Doctrine_Core::getTable('BandejaEntrada')
      ->createQuery('a')
      ->where('a.idUsuarioReceptor =?',$this->getUser()->getGuardUser()->getId()) 
     ->andWhere('a.idUsuarioRemitente =?',$request->getParameter('idUsuario'))
     ->orderBy('a.updated_At DESC');
        
        
                
        $this->bandeja_entradas = new sfDoctrinePager('bandejaEntrada', 10);
	$this->bandeja_entradas->setQuery($q);   	
        $this->bandeja_entradas->setPage($this->getRequestParameter('page',1));
	$this->bandeja_entradas->init();
        //route del paginado
        $this->action = '@bandejaEntrada_dentroUsuario_page';
        
        
     }
              }else{
                $this->bandeja_entradas=null;
         }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->bandeja_entrada = Doctrine_Core::getTable('BandejaEntrada')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->bandeja_entrada);
  }

  

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($bandeja_entrada = Doctrine_Core::getTable('BandejaEntrada')->find(array($request->getParameter('id'))), sprintf('Object bandeja_entrada does not exist (%s).', $request->getParameter('id')));
    $bandeja_entrada->delete();
    $this->redirect('bandejaEntrada/dentroUsuario?idUsuario='.$this->getUser()->getAttribute('idUsuario'));
  }

}
