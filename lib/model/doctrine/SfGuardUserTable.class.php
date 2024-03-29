<?php

/**
 * SfGuardUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SfGuardUserTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object SfGuardUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SfGuardUser');
    }
    
          public function retrieveByUsername($username, $isActive = true)
  {
    $query = Doctrine_Core::getTable('sfGuardUser')->createQuery('u')
      ->where('u.username = ?', $username)
      ->addWhere('u.is_active = ?', $isActive)
    ;

    return $query->fetchOne();
  }
    
    
}