<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Documento', 'doctrine');

/**
 * BaseDocumento
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $idUsuario
 * @property string $titulo
 * @property text $texto
 * @property string $imagen
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer     getIdUsuario()   Returns the current record's "idUsuario" value
 * @method string      getTitulo()      Returns the current record's "titulo" value
 * @method text        getTexto()       Returns the current record's "texto" value
 * @method string      getImagen()      Returns the current record's "imagen" value
 * @method sfGuardUser getSfGuardUser() Returns the current record's "sfGuardUser" value
 * @method Documento   setIdUsuario()   Sets the current record's "idUsuario" value
 * @method Documento   setTitulo()      Sets the current record's "titulo" value
 * @method Documento   setTexto()       Sets the current record's "texto" value
 * @method Documento   setImagen()      Sets the current record's "imagen" value
 * @method Documento   setSfGuardUser() Sets the current record's "sfGuardUser" value
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDocumento extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('documento');
        $this->hasColumn('idUsuario', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('titulo', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
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
        $this->hasOne('sfGuardUser', array(
             'local' => 'idUsuario',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}