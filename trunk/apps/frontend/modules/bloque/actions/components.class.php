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
        
        
        	public function executeBloqueCarrusel()
	{
		
	}
        
	/**
	 * Bloque paginador
	 */
	public function executeBloquePaginador() {

		

        //añade ?page= o &page= al final
        $this->action .= ( preg_match('/\?/', $this->action) ? '&' : '?') . 'page=';
    }

}