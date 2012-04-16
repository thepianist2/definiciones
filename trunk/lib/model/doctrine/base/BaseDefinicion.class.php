<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Definicion', 'doctrine');

/**
 * BaseDefinicion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idpalabra
 * @property string $texto
 * @property string $imagen
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * 
 * @method integer    getIdpalabra()  Returns the current record's "idpalabra" value
 * @method string     getTexto()      Returns the current record's "texto" value
 * @method string     getImagen()     Returns the current record's "imagen" value
 * @method timestamp  getCreatedAt()  Returns the current record's "created_at" value
 * @method timestamp  getUpdatedAt()  Returns the current record's "updated_at" value
 * @method Definicion setIdpalabra()  Sets the current record's "idpalabra" value
 * @method Definicion setTexto()      Sets the current record's "texto" value
 * @method Definicion setImagen()     Sets the current record's "imagen" value
 * @method Definicion setCreatedAt()  Sets the current record's "created_at" value
 * @method Definicion setUpdatedAt()  Sets the current record's "updated_at" value
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDefinicion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('definicion');
        $this->hasColumn('idpalabra', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('texto', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('imagen', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
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
        
    }
}