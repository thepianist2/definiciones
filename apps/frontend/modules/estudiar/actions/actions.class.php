<?php

/**
 * estudiar actions.
 *
 * @package    definiciones
 * @subpackage estudiar
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class estudiarActions extends sfActions
{
    
    
    
    public function executeIndex(sfWebRequest $request){
    
    }

    /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeListado(sfWebRequest $request)
  {
      if ($this->getUser()->isAuthenticated()){
    $q = Doctrine_Core::getTable('palabra')
      ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId());
    
        $this->palabras = new sfDoctrinePager('palabra', 2);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();
        //route del paginado
        $this->action = '@estudiar_listado_page';
      }else{
      $this->palabras=null;
      }
  }
  
  
      public function executePrueba(sfWebRequest $request){
                        $this->i=0;
        $this->palabras = Doctrine_Core::getTable('palabra')
      ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->execute();
        $this->getUser()->setAttribute('numeroPalabras', count($this->palabras));
        $this->getUser()->setAttribute('palabras', $this->palabras);
        $this->getUser()->setAttribute('i', $this->i);
    }
    
    
          public function executeResponder(sfWebRequest $request){
              
              
            $this->i=$this->getUser()->getAttribute('i');
            $this->palabras=$this->getUser()->getAttribute('palabras');
            $numero=$this->getUser()->getAttribute('numeroPalabras');
            if($this->i<$numero-1){
              if($request->getParameter('palabraTexto')){
             $respuesta= $request->getParameter('palabraTexto');
             $this->getUser()->setFlash('mensajeTerminado','Respuesta realizada.');
                           $this->i+=1;
                           $this->getUser()->setAttribute('i', $this->i);
              }else{
             $this->getUser()->setFlash('mensajeError','Porfavor, escriba una palabra.');
             $this->i=$this->getUser()->getAttribute('i');
              }
            }else{
              $this->getUser()->setFlash('mensajeSuceso','Test Finalizado.');
             $this->redirect('estudiar/index');
            }
    }
}
