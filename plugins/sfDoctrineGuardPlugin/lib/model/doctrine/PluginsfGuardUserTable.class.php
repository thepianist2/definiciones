<?php

/**
 * User table.
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage model
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: PluginsfGuardUserTable.class.php 25546 2009-12-17 23:27:55Z Jonathan.Wage $
 */
abstract class PluginsfGuardUserTable extends Doctrine_Table
{
  /**
   * Retrieves a sfGuardUser object by username and is_active flag.
   *
   * @param  string  $username The username
   * @param  boolean $isActive The user's status
   *
   * @return sfGuardUser
   */
  public function retrieveByUsername($username, $isActive = true)
  {
    $query = Doctrine_Core::getTable('sfGuardUser')->createQuery('u')
      ->where('u.username = ?', $username)
      ->addWhere('u.is_active = ?', $isActive)
    ;

    return $query->fetchOne();
  }

  /**
   * Retrieves a sfGuardUser object by username or email_address and is_active flag.
   *
   * @param  string  $username The username
   * @param  boolean $isActive The user's status
   *
   * @return sfGuardUser
   */
  public function retrieveByUsernameOrEmailAddress($username, $isActive = true)
  {
    $query = Doctrine_Core::getTable('sfGuardUser')->createQuery('u')
      ->where('u.username = ? OR u.email_address = ?', array($username, $username))
      ->addWhere('u.is_active = ?', $isActive)
    ;

    return $query->fetchOne();
  }
  
  
    public function saberEsAmigo($idUsuario, $idAmigo)
  {
    $query = Doctrine_Core::getTable('amigo')->createQuery('u')
      ->where('u.idUsuario = ?', $idUsuario)
      ->andWhere('u.idUsuarioAmigo =?',$idAmigo);

     $u=$query->fetchOne();
     
     if ($u) {
                 //si ya esta en la base de datos
	 		return true;
	     }else{
                 //si no esta en la base de datos
	 		return false;
             }
     
  }
  
  
      public function obtenerById($idUsuario)
  {
    $query = Doctrine_Core::getTable('sfGuardUser')->createQuery('u')
      ->where('u.id = ?', $idUsuario);

     $u=$query->fetchOne();
     
     if ($u) {
                 //si ya esta en la base de datos
	 		return $u;
	     }else{
                 //si no esta en la base de datos
	 		return false;
             }
     
  }
  
  
  
  
}
