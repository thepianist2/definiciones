<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SubCategoria', 'doctrine');

/**
 * BaseSubCategoria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idCategoria
 * @property text $texto
 * @property string $imagen
 * @property Categoria $Categoria
 * @property Doctrine_Collection $Palabra
 * 
 * @method integer             getIdCategoria() Returns the current record's "idCategoria" value
 * @method text                getTexto()       Returns the current record's "texto" value
 * @method string              getImagen()      Returns the current record's "imagen" value
 * @method Categoria           getCategoria()   Returns the current record's "Categoria" value
 * @method Doctrine_Collection getPalabra()     Returns the current record's "Palabra" collection
 * @method SubCategoria        setIdCategoria() Sets the current record's "idCategoria" value
 * @method SubCategoria        setTexto()       Sets the current record's "texto" value
 * @method SubCategoria        setImagen()      Sets the current record's "imagen" value
 * @method SubCategoria        setCategoria()   Sets the current record's "Categoria" value
 * @method SubCategoria        setPalabra()     Sets the current record's "Palabra" collection
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSubCategoria extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('subCategoria');
        $this->hasColumn('idCategoria', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
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
        $this->hasOne('Categoria', array(
             'local' => 'idCategoria',
             'foreign' => 'id'));

        $this->hasMany('Palabra', array(
             'local' => 'id',
             'foreign' => 'idSubCategoria'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}