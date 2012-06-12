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
    
        $this->sf_guard_users = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
//      ->whereNotIn('a.id',array('1',$this->getUser()->getGuardUser()->getId()))
      ->andWhereIn('a.id',$r)          
      ->execute();
              }else{
                $this->bandeja_entradas=null;
         }
  }
  
  
    public function executeDentroUsuario(sfWebRequest $request)
  {
            if ($this->getUser()->isAuthenticated()){
                if($request->getParameter('idUsuario')){
                    
    $this->getUser()->setAttribute('idUsuario', $request->getParameter('idUsuario'));          
    $this->bandeja_entradas = Doctrine_Core::getTable('BandejaEntrada')
      ->createQuery('a')
      ->where('a.idUsuarioReceptor =?',$this->getUser()->getGuardUser()->getId()) 
     ->andWhere('a.idUsuarioRemitente =?',$request->getParameter('idUsuario'))          
      ->execute();}
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
