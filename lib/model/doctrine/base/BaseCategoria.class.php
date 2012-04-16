<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Categoria', 'doctrine');

/**
 * BaseCategoria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idPalabra
 * @property text $texto
 * @property string $imagen
 * @property Doctrine_Collection $Palabra
 * @property Doctrine_Collection $SubCategoria
 * 
 * @method integer             getIdPalabra()    Returns the current record's "idPalabra" value
 * @method text                getTexto()        Returns the current record's "texto" value
 * @method string              getImagen()       Returns the current record's "imagen" value
 * @method Doctrine_Collection getPalabra()      Returns the current record's "Palabra" collection
 * @method Doctrine_Collection getSubCategoria() Returns the current record's "SubCategoria" collection
 * @method Categoria           setIdPalabra()    Sets the current record's "idPalabra" value
 * @method Categoria           setTexto()        Sets the current record's "texto" value
 * @method Categoria           setImagen()       Sets the current record's "imagen" value
 * @method Categoria           setPalabra()      Sets the current record's "Palabra" collection
 * @method Categoria           setSubCategoria() Sets the current record's "SubCategoria" collection
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategoria extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('categoria');
        $this->hasColumn('idPalabra', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('texto', 'text', null, array(
             'type' => 'text',
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Palabra', array(
             'local' => 'id',
             'foreign' => 'idPalabra'));

        $this->hasMany('SubCategoria', array(
             'local' => 'id',
             'foreign' => 'idCategoria'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}