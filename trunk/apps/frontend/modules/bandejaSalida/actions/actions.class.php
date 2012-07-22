<?php

/**
 * bandejaSalida actions.
 *
 * @package    definiciones
 * @subpackage bandejaSalida
 * @author     Fabian Allel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bandejaSalidaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('BandejaSalida')
      ->createQuery('a')
      ->Where('a.idUsuarioRemitente =?',$this->getUser()->getGuardUser()->getId())
      ->orderBy('a.updated_At DESC');

    
    
       $this->bandeja_salidas = new sfDoctrinePager('bandejaSalida', 10);
	$this->bandeja_salidas->setQuery($q);   	
        $this->bandeja_salidas->setPage($this->getRequestParameter('page',1));
	$this->bandeja_salidas->init();
        //route del paginado
        $this->action = '@bandejaSalida_index_page';
  }
  
  public function executeSeleccionaUsuario(sfWebRequest $request){

    $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      ->whereNotIn('a.id',array('1',$this->getUser()->getGuardUser()->getId()));
    
           $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        //route del paginado
        $this->action = '@bandejaSalida_seleccionaUsuario_page';
    
  }
      public function executeBuscarMensajeSalida(sfWebRequest $request)
  {    
                  
        if($this->getUser()->hasAttribute('buscadorBandejaSalida') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorBandejaSalida');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorBandejaSalida', $request->getParameterHolder()->getAll());
        }
          
          
          $q = Doctrine_Core::getTable('BandejaSalida')
      ->createQuery('a')
       ->where('a.mensaje LIKE ?','%'.$query.'%')           
      ->andWhere('a.idUsuarioRemitente =?',$this->getUser()->getGuardUser()->getId());         

    
    
       $this->bandeja_salidas = new sfDoctrinePager('bandejaSalida', 10);
	$this->bandeja_salidas->setQuery($q);   	
        $this->bandeja_salidas->setPage($this->getRequestParameter('page',1));
	$this->bandeja_salidas->init();
        //route del paginado
            $this->action = 'bandejaSalida/buscarMensajeSalida';

            $this->query = $query;

            $this->setTemplate('index');
          
      }

    public function executeBuscar(sfWebRequest $request)
  {
        
        
        
        if($this->getUser()->hasAttribute('buscadorBandejaSalida') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorBandejaSalida');
            $query = $buscador['query'];
        }
        else
        {
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorBandejaSalida', $request->getParameterHolder()->getAll());
        }
        
        
        
            $q = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery('a')
      
      ->where('a.first_name LIKE ?','%'.$query.'%')
      ->where('a.last_name LIKE ?','%'.$query.'%')        
     ->where('a.username LIKE ?','%'.$query.'%')
     ->whereNotIn('a.id',array('1',$this->getUser()->getGuardUser()->getId()));
           $this->sf_guard_users = new sfDoctrinePager('sfGuardUser', 9);
	$this->sf_guard_users->setQuery($q);   	
        $this->sf_guard_users->setPage($this->getRequestParameter('page',1));
	$this->sf_guard_users->init();
        
        
            $this->action = 'bandejaSalida/buscar';

            $this->query = $query;

            $this->setTemplate('seleccionaUsuario');
    }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->bandeja_salida = Doctrine_Core::getTable('BandejaSalida')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->bandeja_salida);
  }

  public function executeNew(sfWebRequest $request)
  {
      
      if($request->getParameter('idUsuario')){
     $idUsuario = $request->getParameter('idUsuario');
    $this->form = new BandejaSalidaForm();
    $this->form->setDefault('idUsuarioRemitente', $this->getUser()->getGuardUser()->getId());
    $this->form->setDefault('idUsuarioReceptor', $idUsuario);
    
      }else{
       $this->getUser()->setFlash('mensajeError','No has seleccionado usuario para enviar mensaje.');
   
      }

  }
  
  
    public function executeResponder(sfWebRequest $request)
  {
    $idUsuario = $request->getParameter('idUsuario');
    $this->form = new BandejaSalidaForm();
    $this->form->setDefault('idUsuarioRemitente', $this->getUser()->getGuardUser()->getId());
    $this->form->setDefault('idUsuarioReceptor', $idUsuario);

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BandejaSalidaForm();
    $this->form->setDefault('idUsuarioRemitente', $this->getUser()->getGuardUser()->getId());

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }


  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($bandeja_salida = Doctrine_Core::getTable('BandejaSalida')->find(array($request->getParameter('id'))), sprintf('Object bandeja_salida does not exist (%s).', $request->getParameter('id')));
    $bandeja_salida->delete();

    $this->redirect('bandejaSalida/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $bandeja_salida = $form->save();
      $bandeja_entrada= new BandejaEntrada();
      $bandeja_entrada->setIdUsuarioRemitente($bandeja_salida->getIdUsuarioRemitente());
      $bandeja_entrada->setIdUsuarioReceptor($bandeja_salida->getIdUsuarioReceptor());
      $bandeja_entrada->setMensaje($bandeja_salida->getMensaje());
      $bandeja_entrada->save();
      $this->redirect('bandejaSalida/index');
    }
  }
}
