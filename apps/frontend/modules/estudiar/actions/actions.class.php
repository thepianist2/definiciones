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
    
    
    /**
     *
     * @param sfWebRequest $request 
     */
    public function executeIndex(sfWebRequest $request){
    
    }
    
    public function executeBuscar(sfWebRequest $request)
    {
       
       
       

        if($this->getUser()->hasAttribute('buscadorEstudiar') and $request->hasParameter('page'))
        {
            $buscador = $this->getUser()->getAttribute('buscadorEstudiar');
            $filtro = $buscador['filtro'];
            $query = $buscador['query'];
        }
        else
        {
            $filtro = $request->getParameter('filtro');
            $query = $request->getParameter('query');
            $this->getUser()->setAttribute('buscadorEstudiar', $request->getParameterHolder()->getAll());
        }
        


        if($filtro=="1")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->andWhere('a.textoPalabra LIKE ?','%'.$query.'%')
            ->andWhere('a.textoDefinicion LIKE ?','%'.$query.'%')
            ->orderBy('a.textoPalabra');  

        else if($filtro=="2")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->andWhere('a.textoPalabra LIKE ?','%'.$query.'%')  
            ->orderBy('a.textoPalabra');  
        else if($filtro=="3")
                $q = Doctrine_Core::getTable('palabra')
            ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->andWhere('a.textoDefinicion LIKE ?','%'.$query.'%')
            ->orderBy('a.textoPalabra'); 

        
        
        $this->palabras = new sfDoctrinePager('palabra', 6);
	$this->palabras->setQuery($q);   	
        $this->palabras->setPage($this->getRequestParameter('page',1));
	$this->palabras->init();

            $this->action = 'estudiar/buscar';

            $this->filtro = $filtro;
            $this->query = $query;

            $this->setTemplate('listado');

    }
  
    

    
        /**
         *
         * @param sfWebRequest $request 
         */
    public function executeConfigurarTest(sfWebRequest $request){
          if ($this->getUser()->isAuthenticated()){
    $this->palabras = Doctrine_Core::getTable('palabra')
      ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
             ->orderBy('a.textoPalabra')                  
      ->execute();
    
    
    
        $this->categorias = Doctrine_Core::getTable('categoria')
      ->createQuery('a')
      ->orderBy('a.texto')              
      ->execute();
      }else{
      $this->palabras=null;
      }
    }

    
       public function executeBuscarCategoria(sfWebRequest $request)
    {
           
      $this->categorias = Doctrine_Core::getTable('categoria')
      ->createQuery('a')
      ->orderBy('a.texto')             
      ->execute();
      
      
      
      
    
      
           
           
         $categoria=$request->getParameter('filtro');
         
         
       $subCategorias = Doctrine_Core::getTable('subCategoria')
      ->createQuery('a')
      ->Where('a.idCategoria =?',$categoria)
      ->orderBy('a.texto')            
      ->execute();
            	foreach ($subCategorias as $c) {
   		$r[$c->id]=$c->id;
   	}
        
                if(!count($subCategorias)>0){
            $r[0]=0;
        }
         
         
         if($categoria!='0'){
                 $this->palabras = Doctrine_Core::getTable('palabra')
                  ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->andWhereIn('a.idSubCategoria',$r)
            ->orderBy('a.textoPalabra')           
                ->execute();
         }else{
                 $this->palabras = Doctrine_Core::getTable('palabra')
      ->createQuery('a')
            ->where('a.borrado=?',0)
            ->andWhere('a.activo=?',1)
            ->andWhere('a.idUsuario =?',$this->getUser()->getGuardUser()->getId())
            ->orderBy('a.textoPalabra')     
      ->execute();
         }
         
         
         $this->filtro=$categoria;
         
         
         
            $this->setTemplate('configurarTest');

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
        
                 if(count($this->palabras)<3){
            $this->getUser()->setFlash('mensajeError','Debe tener al menos 3 definiciones almacenadas.');
            $this->redirect('estudiar/index');
         }
        
        
      }else{
      $this->palabras=null;
      }
  }
  
  
  
        /**
   * Action de AccionSeleccionados. Ejecuta la accion de los seleccionados en el listado
   * @param sfWebRequest $request 
   */
  public function executeAccionSeleccionados(sfWebRequest $request)
  {
                      //numero de vacantes
                      $i=0;
        $listado = $request->getParameter('palabra');

        foreach($listado as  $key => $check)
        {
            if($check){
                $contenido = Doctrine::getTable('Palabra')->find($key);
                
            $palabras[$i]  = $contenido;
            $i+=1;
            }
        }
        
        if(count($palabras)>=3){  
        $this->getUser()->setFlash('mensajeTerminado', 'Ahora realice el test, las palabras estan presentadas de forma aleatoria' );
        $this->getUser()->setAttribute('palabras', $palabras);
        $this->redirect('@estudiar_prueba'); 
        }else{
        $this->getUser()->setFlash('mensajeError','Debes seleccionar al menos 3 palabras.');
            $this->redirect('@estudiar_configurarTest'); 
        }

  } 
    
    
  
      public function executePrueba(sfWebRequest $request){
         $test= new Test();
         $test->setIdUsuario($this->getUser()->getGuardUser()->getId());
         $test->save();
         $this->getUser()->setAttribute('idTest', $test->getId());
        $this->i=0;
        $this->palabras = $this->getUser()->getAttribute('palabras');
        $this->getUser()->setAttribute('numeroPalabras', count($this->palabras));
        $this->getUser()->setAttribute('palabras', $this->palabras);
        $this->getUser()->setAttribute('i', $this->i);
         if($this->getUser()->getAttribute('numeroPalabras')<3){
            $this->getUser()->setFlash('mensajeError','Debe tener al menos 3 definiciones almacenadas.');
            $this->redirect('estudiar/index');
         }
    }
    
    
          public function executeResponder(sfWebRequest $request){
              
              
            $this->i=$this->getUser()->getAttribute('i');
            
            $this->palabras=$this->getUser()->getAttribute('palabras');
            $numero=$this->getUser()->getAttribute('numeroPalabras');
            if($this->i<$numero-1){
              if($request->getParameter('palabraTexto')){
             $respuesta= $request->getParameter('palabraTexto');
             if(strtolower($respuesta)==strtolower($this->palabras[$this->i]->getTextoPalabra())){
             $this->getUser()->setFlash('mensajeTerminado','Respuesta correcta.');
             
             $respuesta= new Respuesta();
             $respuesta->setIdTest($this->getUser()->getAttribute('idTest'));
             $respuesta->setTextoRespuesta($request->getParameter('palabraTexto'));
             $respuesta->setTextoPalabra(strtolower($this->palabras[$this->i]->getTextoPalabra()));
             $respuesta->setRespuestaCorrecta(true);
             $respuesta->save();  
             
             $this->i=$this->getUser()->getAttribute('i');
             $this->i+=1;
             $this->getUser()->setAttribute('i', $this->i);
            }else{
             $this->getUser()->setFlash('mensajeError','Respuesta Incorrecta.');
             $respuesta= new Respuesta();
             $respuesta->setIdTest($this->getUser()->getAttribute('idTest'));
             $respuesta->setTextoRespuesta($request->getParameter('palabraTexto'));
             $respuesta->setTextoPalabra(strtolower($this->palabras[$this->i]->getTextoPalabra()));
             $respuesta->setRespuestaCorrecta(false);
             $respuesta->save();
             
             $this->i=$this->getUser()->getAttribute('i');
             $this->i+=1;
            $this->getUser()->setAttribute('i', $this->i);
            }
              }else{
             $this->getUser()->setFlash('mensajeError','Porfavor, escriba una palabra.');
             $this->i=$this->getUser()->getAttribute('i');
              }
            }else{
                
                
                if($request->getParameter('palabraTexto')){
             $respuesta= $request->getParameter('palabraTexto');
             if(strtolower($respuesta)==strtolower($this->palabras[$this->i]->getTextoPalabra())){
             $this->getUser()->setFlash('mensajeTerminado','Respuesta correcta.');
             
             $respuesta= new Respuesta();
             $respuesta->setIdTest($this->getUser()->getAttribute('idTest'));
             $respuesta->setTextoRespuesta($request->getParameter('palabraTexto'));
             $respuesta->setTextoPalabra(strtolower($this->palabras[$this->i]->getTextoPalabra()));
             $respuesta->setRespuestaCorrecta(true);
             $respuesta->save();  
    
            }else{
             $this->getUser()->setFlash('mensajeError','Respuesta Incorrecta.');
             $respuesta= new Respuesta();
             $respuesta->setIdTest($this->getUser()->getAttribute('idTest'));
             $respuesta->setTextoRespuesta($request->getParameter('palabraTexto'));
             $respuesta->setTextoPalabra(strtolower($this->palabras[$this->i]->getTextoPalabra()));
             $respuesta->setRespuestaCorrecta(false);
             $respuesta->save();
             

            }
              }else{
             $this->getUser()->setFlash('mensajeError','Porfavor, escriba una palabra.');
             $this->i=$this->getUser()->getAttribute('i');
              }
                
                
              $this->getUser()->setFlash('mensajeSuceso','Test Finalizado.');
             $this->redirect('estudiar/index');
            }
    }
}
