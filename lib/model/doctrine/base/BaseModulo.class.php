<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Modulo', 'doctrine');

/**
 * BaseModulo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $activo
 * @property integer $tienepublicidad
 * @property Doctrine_Collection $Funcionalidad
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getNombre()          Returns the current record's "nombre" value
 * @method string              getDescripcion()     Returns the current record's "descripcion" value
 * @method integer             getActivo()          Returns the current record's "activo" value
 * @method integer             getTienepublicidad() Returns the current record's "tienepublicidad" value
 * @method Doctrine_Collection getFuncionalidad()   Returns the current record's "Funcionalidad" collection
 * @method Modulo              setId()              Sets the current record's "id" value
 * @method Modulo              setNombre()          Sets the current record's "nombre" value
 * @method Modulo              setDescripcion()     Sets the current record's "descripcion" value
 * @method Modulo              setActivo()          Sets the current record's "activo" value
 * @method Modulo              setTienepublicidad() Sets the current record's "tienepublicidad" value
 * @method Modulo              setFuncionalidad()   Sets the current record's "Funcionalidad" collection
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseModulo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('modulo');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('nombre', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('activo', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('tienepublicidad', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Funcionalidad', array(
             'local' => 'id',
             'foreign' => 'idmodulo'));
    }
}