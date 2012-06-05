<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Permiso', 'doctrine');

/**
 * BasePermiso
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idperfil
 * @property integer $idfuncionalidad
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Funcionalidad $Funcionalidad
 * @property Perfil $Perfil
 * 
 * @method integer       getIdperfil()        Returns the current record's "idperfil" value
 * @method integer       getIdfuncionalidad() Returns the current record's "idfuncionalidad" value
 * @method timestamp     getCreatedAt()       Returns the current record's "created_at" value
 * @method timestamp     getUpdatedAt()       Returns the current record's "updated_at" value
 * @method Funcionalidad getFuncionalidad()   Returns the current record's "Funcionalidad" value
 * @method Perfil        getPerfil()          Returns the current record's "Perfil" value
 * @method Permiso       setIdperfil()        Sets the current record's "idperfil" value
 * @method Permiso       setIdfuncionalidad() Sets the current record's "idfuncionalidad" value
 * @method Permiso       setCreatedAt()       Sets the current record's "created_at" value
 * @method Permiso       setUpdatedAt()       Sets the current record's "updated_at" value
 * @method Permiso       setFuncionalidad()   Sets the current record's "Funcionalidad" value
 * @method Permiso       setPerfil()          Sets the current record's "Perfil" value
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePermiso extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('permiso');
        $this->hasColumn('idperfil', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('idfuncionalidad', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Funcionalidad', array(
             'local' => 'idfuncionalidad',
             'foreign' => 'id'));

        $this->hasOne('Perfil', array(
             'local' => 'idperfil',
             'foreign' => 'id'));
    }
}