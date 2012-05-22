<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Mensaje', 'doctrine');

/**
 * BaseMensaje
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idUsuario
 * @property integer $idUsuarioReceptor
 * @property text $mensaje
 * @property Doctrine_Collection $sfGuardUser
 * 
 * @method integer             getIdUsuario()         Returns the current record's "idUsuario" value
 * @method integer             getIdUsuarioReceptor() Returns the current record's "idUsuarioReceptor" value
 * @method text                getMensaje()           Returns the current record's "mensaje" value
 * @method Doctrine_Collection getSfGuardUser()       Returns the current record's "sfGuardUser" collection
 * @method Mensaje             setIdUsuario()         Sets the current record's "idUsuario" value
 * @method Mensaje             setIdUsuarioReceptor() Sets the current record's "idUsuarioReceptor" value
 * @method Mensaje             setMensaje()           Sets the current record's "mensaje" value
 * @method Mensaje             setSfGuardUser()       Sets the current record's "sfGuardUser" collection
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMensaje extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mensaje');
        $this->hasColumn('idUsuario', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('idUsuarioReceptor', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('mensaje', 'text', null, array(
             'type' => 'text',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardUser', array(
             'local' => 'idUsuarioReceptor',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}