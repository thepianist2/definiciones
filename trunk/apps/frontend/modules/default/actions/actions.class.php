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
      if ($this->getUser()->isAuthenticated()){
    $q = Doctrine_Core::getTable('palabra')
      ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->orderBy('a.textoPalabra');        
//             ->orderBy('RANDOM()')

                    $this->palabras = new sfDoctrinePager('palabra', 6);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();
        //route del paginado
        $this->action = '@default_index_page';
    

            
            
      }else{
      $this->palabras=null;
      }
  }
  
  
   public function executeBuscar(sfWebRequest $request)
    {
       
       
       

        if($this->getUser()->hasAttribute('buscadorDefault') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorDefault');
            $filtro = $buscador['filtro'];
            $query = $buscador['query'];
        }
        else
        {
            $filtro = $request->getParameter('filtro');
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorDefault', $request->getParameterHolder()->getAll());
        }
        
        
                   $array = Doctrine_Query::create()
                ->select('a.id, a.textoPalabra')
                     ->from('Palabra a')
                     ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
              ->execute();
             
             
   	foreach ($array as $c) {
   		$r[$c->id]=$c->textoPalabra;
   	}
        if(!count($array)>0){
            $r[0]=0;
        }
        


        if($filtro=="1")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario !=?',$this->getUser()->getGuardUser()->getId())
            ->andWhere('a.textoPalabra LIKE ?','%'.$query.'%')
            ->andWhere('a.textoDefinicion LIKE ?','%'.$query.'%')
            ->andWhereNotIn('a.textoPalabra', $r)    
            ->orderBy('a.textoPalabra');  

        else if($filtro=="2")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario !=?',$this->getUser()->getGuardUser()->getId())
            ->andWhere('a.textoPalabra LIKE ?','%'.$query.'%')
            ->andWhereNotIn('a.textoPalabra', $r)     
            ->orderBy('a.textoPalabra');  
        else if($filtro=="3")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario !=?',$this->getUser()->getGuardUser()->getId())
            ->andWhere('a.textoDefinicion LIKE ?','%'.$query.'%')
            ->andWhereNotIn('a.textoPalabra', $r)
            ->orderBy('a.textoPalabra'); 

        
        
        $this->palabras = new sfDoctrinePager('palabra', 6);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();

            $this->action = 'default/buscar';

            $this->filtro = $filtro;
            $this->query = $query;

            $this->setTemplate('listadoTodos');

    }
  
    
    
     public function executeBuscar2(sfWebRequest $request)
    {
       
       
       

        if($this->getUser()->hasAttribute('buscadorDefault') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorDefault');
            $filtro = $buscador['filtro'];
            $query = $buscador['query'];
        }
        else
        {
            $filtro = $request->getParameter('filtro');
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorDefault', $request->getParameterHolder()->getAll());
        }
        
        


        if($filtro=="1")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
           ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId()) 
            ->andWhere('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.textoPalabra LIKE ?','%'.$query.'%')
            ->andWhere('a.textoDefinicion LIKE ?','%'.$query.'%')
            ->orderBy('a.textoPalabra');  

        else if($filtro=="2")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
           ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId()) 
           ->andWhere('a.borrado=?',0)        
            ->andWhere('a.activo=?',1)
            ->andWhere('a.textoPalabra LIKE ?','%'.$query.'%')  
            ->orderBy('a.textoPalabra');  
        else if($filtro=="3")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
           ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId()) 
            ->andWhere('a.borrado=?',0)          
            ->andWhere('a.activo=?',1)
            ->andWhere('a.textoDefinicion LIKE ?','%'.$query.'%')
            ->orderBy('a.textoPalabra'); 
        else
            $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
           ->where('a.idUsuario =?',$this->getUser()->getGuardUser()->getId()) 
            ->andWhere('a.borrado=?',0)                  
            ->andWhere('a.activo=?',1)
            ->orderBy('a.textoPalabra'); 
        
        $this->palabras = new sfDoctrinePager('palabra', 6);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();

            $this->action = 'default/buscar2';

            $this->filtro = $filtro;
            $this->query = $query;

            $this->setTemplate('index');

    }
  
    
    
  
  
  	public function executeAddFavorito(sfWebRequest $request) {
            
		$palabra= new Palabra();
                $palabra->setIdUsuario($request->getParameter('usuario_id'));
		$palabraOriginal = Doctrine::getTable('Palabra')->find($request->getParameter('palabra_id'));
                if(Doctrine_Core::getTable('Palabra')->verificarExiste($palabraOriginal->getIdSubCategoria(),$this->getUser()->getGuardUser()->getId(),$palabraOriginal->getTextoPalabra())){
                              
                    
              $this->getUser()->setFlash('mensajeError','Esta palabra ya existe en tu perfil');

            }else{
                
                
                $palabra->setIdSubCategoria($palabraOriginal->getIdSubCategoria());
                $palabra->setTextoPalabra($palabraOriginal->getTextoPalabra());
                $palabra->setTextoDefinicion($palabraOriginal->getTextoDefinicion());
                $palabra->setBorrado(0);
                $palabra->setActivo(1);
                $palabra->setImagen($palabraOriginal->getImagen());
                $palabra->save();
                $this->getUser()->setFlash('mensajeTerminado','Palabra agregada a con éxito.');
            }
                $this->redirect('default/listadoTodos');
	}
  
   public function executeListado(sfWebRequest $request)
  {
             if ($this->getUser()->isAuthenticated()){
    $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->orderBy('a.textoPalabra');        
        $this->palabras = new sfDoctrinePager('palabra', 5);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();
        //route del paginado
        $this->action = '@default_listado_page';
    

    
    
      }else{
      $this->palabras=null;
      }
       
   }
   
   
   
     public function executeListadoTodos(sfWebRequest $request)
  {
             if ($this->getUser()->isAuthenticated()){
                 

                 
                 
             $array = Doctrine_Query::create()
                ->select('a.id, a.textoPalabra')
                     ->from('Palabra a')
                     ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
              ->execute();
             
             
   	foreach ($array as $c) {
   		$r[$c->id]=$c->textoPalabra;
   	}
        if(!count($array)>0){
            $r[0]=0;
        }
                
             //obtenemos las palabras que no pertennezcan al usuario logeado, y tambien verificamos que no esten repetidas
    $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario !=?',$this->getUser()->getGuardUser()->getId())
            ->andWhereNotIn('a.textoPalabra', $r)
            ->orderBy('a.textoPalabra');        
    
        $this->palabras = new sfDoctrinePager('palabra', 6);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();
        //route del paginado
        $this->action = '@default_listadoTodos_page';
    

    
    
      }else{
      $this->palabras=null;
      }
       
   }
  

  public function executeShow(sfWebRequest $request)
  {
    $this->palabra = Doctrine_Core::getTable('palabra')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->palabra);
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->categorias = CategoriaTable::getDisponibles();
    $this->form = new palabra2Form();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());
    $this->form->setDefault('activo', true);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new palabra2Form();
    $this->form->setDefault('idUsuario', $this->getUser()->getGuardUser()->getId());
    $this->form->setDefault('activo', true);
    $this->categorias = CategoriaTable::getDisponibles();
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($palabra = Doctrine_Core::getTable('palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $this->form = new palabra2Form($palabra);
    $this->categorias = CategoriaTable::getDisponibles();
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($palabra = Doctrine_Core::getTable('palabra')->find(array($request->getParameter('id'))), sprintf('Object palabra does not exist (%s).', $request->getParameter('id')));
    $this->form = new palabra2Form($palabra);
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
