<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('BandejaEntrada', 'doctrine');

/**
 * BaseBandejaEntrada
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idUsuarioRemitente
 * @property integer $idUsuarioReceptor
 * @property text $mensaje
 * @property Doctrine_Collection $sfGuardUser
 * 
 * @method integer             getIdUsuarioRemitente() Returns the current record's "idUsuarioRemitente" value
 * @method integer             getIdUsuarioReceptor()  Returns the current record's "idUsuarioReceptor" value
 * @method text                getMensaje()            Returns the current record's "mensaje" value
 * @method Doctrine_Collection getSfGuardUser()        Returns the current record's "sfGuardUser" collection
 * @method BandejaEntrada      setIdUsuarioRemitente() Sets the current record's "idUsuarioRemitente" value
 * @method BandejaEntrada      setIdUsuarioReceptor()  Sets the current record's "idUsuarioReceptor" value
 * @method BandejaEntrada      setMensaje()            Sets the current record's "mensaje" value
 * @method BandejaEntrada      setSfGuardUser()        Sets the current record's "sfGuardUser" collection
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBandejaEntrada extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bandejaEntrada');
        $this->hasColumn('idUsuarioRemitente', 'integer', 8, array(
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