<?php

/**
 * PalabraTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PalabraTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PalabraTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Palabra');
    }
   
    
             public function verificarExiste($idSubCategoria, $idUsuario, $nombre){
        $q = Doctrine_Query::create()
	            ->select('u.*')
	            ->from('Palabra u')
                     ->where('u.textoPalabra LIKE ? ',$nombre)
                     ->andWhere('u.idSubCategoria =? ',$idSubCategoria)
                     ->andWhere('u.idUsuario =?',$idUsuario);

	   $u=$q->fetchOne();
	     if ($u) {
                 //si ya esta en la base de datos
	 		return true;
	     }else{
                 //si no esta en la base de datos
	 		return false;
             }
         }
}