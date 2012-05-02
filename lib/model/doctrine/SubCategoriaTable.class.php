<?php

/**
 * SubCategoriaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SubCategoriaTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object SubCategoriaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SubCategoria');
    }
    
             public function verificarExiste($nombre, $idCategoria){
        $q = Doctrine_Query::create()
	            ->select('u.*')
	            ->from('SubCategoria u')
                     ->where('u.texto LIKE ? ',$nombre)
                    ->andwhere('u.idCategoria = ?',$idCategoria);
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