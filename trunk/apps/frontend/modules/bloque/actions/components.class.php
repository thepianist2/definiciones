<?php

class bloqueComponents extends sfComponents {

	/**
	 * Action del Menu principal
	 *
	 * @param
	 */
	public function executeMenuIzquierdo()
	{
		
	}
        
        /**
         * bloque de los menus
         */
      	public function executeBloqueMenus()
	{
      $this->contenidos = Doctrine_Core::getTable('Contenido')
      ->createQuery('a')
      ->where('a.borrado =?',false)
      ->andWhere('a.activo =?',true)
      ->execute();
		
	}  
        
        
        /**
         * 
         */
        public function executeBloqueCarrusel()
	{    
       $this->albums = Doctrine_Core::getTable('Album')
      ->createQuery('a')
      ->where('a.descripcion LIKE?','frontend')
      ->limit(1)
      ->execute();
		
	}
        
	/**
	 * Bloque paginador
	 */
	public function executeBloquePaginador() {

		

        //añade ?page= o &page= al final
        $this->action .= ( preg_match('/\?/', $this->action) ? '&' : '?') . 'page=';
    }

}