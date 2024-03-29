<?php

/**
 * BasesfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $imagenPerfil
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property string $username
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property Doctrine_Collection $PublicacionMuro
 * @property Doctrine_Collection $Amigo
 * @property Contenido $Contenido
 * @property Doctrine_Collection $Piso
 * @property Doctrine_Collection $Palabra
 * @property Doctrine_Collection $Documento
 * @property Doctrine_Collection $Album
 * @property Doctrine_Collection $BandejaEntrada
 * @property Doctrine_Collection $BandejaSalida
 * @property Doctrine_Collection $Test
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $sfGuardUserPermission
 * @property Doctrine_Collection $sfGuardUserGroup
 * @property sfGuardRememberKey $RememberKeys
 * @property sfGuardForgotPassword $ForgotPassword
 * 
 * @method string                getImagenPerfil()          Returns the current record's "imagenPerfil" value
 * @method string                getFirstName()             Returns the current record's "first_name" value
 * @method string                getLastName()              Returns the current record's "last_name" value
 * @method string                getEmailAddress()          Returns the current record's "email_address" value
 * @method string                getUsername()              Returns the current record's "username" value
 * @method string                getAlgorithm()             Returns the current record's "algorithm" value
 * @method string                getSalt()                  Returns the current record's "salt" value
 * @method string                getPassword()              Returns the current record's "password" value
 * @method boolean               getIsActive()              Returns the current record's "is_active" value
 * @method boolean               getIsSuperAdmin()          Returns the current record's "is_super_admin" value
 * @method timestamp             getLastLogin()             Returns the current record's "last_login" value
 * @method Doctrine_Collection   getPublicacionMuro()       Returns the current record's "PublicacionMuro" collection
 * @method Doctrine_Collection   getAmigo()                 Returns the current record's "Amigo" collection
 * @method Contenido             getContenido()             Returns the current record's "Contenido" value
 * @method Doctrine_Collection   getPiso()                  Returns the current record's "Piso" collection
 * @method Doctrine_Collection   getPalabra()               Returns the current record's "Palabra" collection
 * @method Doctrine_Collection   getDocumento()             Returns the current record's "Documento" collection
 * @method Doctrine_Collection   getAlbum()                 Returns the current record's "Album" collection
 * @method Doctrine_Collection   getBandejaEntrada()        Returns the current record's "BandejaEntrada" collection
 * @method Doctrine_Collection   getBandejaSalida()         Returns the current record's "BandejaSalida" collection
 * @method Doctrine_Collection   getTest()                  Returns the current record's "Test" collection
 * @method Doctrine_Collection   getGroups()                Returns the current record's "Groups" collection
 * @method Doctrine_Collection   getPermissions()           Returns the current record's "Permissions" collection
 * @method Doctrine_Collection   getSfGuardUserPermission() Returns the current record's "sfGuardUserPermission" collection
 * @method Doctrine_Collection   getSfGuardUserGroup()      Returns the current record's "sfGuardUserGroup" collection
 * @method sfGuardRememberKey    getRememberKeys()          Returns the current record's "RememberKeys" value
 * @method sfGuardForgotPassword getForgotPassword()        Returns the current record's "ForgotPassword" value
 * @method sfGuardUser           setImagenPerfil()          Sets the current record's "imagenPerfil" value
 * @method sfGuardUser           setFirstName()             Sets the current record's "first_name" value
 * @method sfGuardUser           setLastName()              Sets the current record's "last_name" value
 * @method sfGuardUser           setEmailAddress()          Sets the current record's "email_address" value
 * @method sfGuardUser           setUsername()              Sets the current record's "username" value
 * @method sfGuardUser           setAlgorithm()             Sets the current record's "algorithm" value
 * @method sfGuardUser           setSalt()                  Sets the current record's "salt" value
 * @method sfGuardUser           setPassword()              Sets the current record's "password" value
 * @method sfGuardUser           setIsActive()              Sets the current record's "is_active" value
 * @method sfGuardUser           setIsSuperAdmin()          Sets the current record's "is_super_admin" value
 * @method sfGuardUser           setLastLogin()             Sets the current record's "last_login" value
 * @method sfGuardUser           setPublicacionMuro()       Sets the current record's "PublicacionMuro" collection
 * @method sfGuardUser           setAmigo()                 Sets the current record's "Amigo" collection
 * @method sfGuardUser           setContenido()             Sets the current record's "Contenido" value
 * @method sfGuardUser           setPiso()                  Sets the current record's "Piso" collection
 * @method sfGuardUser           setPalabra()               Sets the current record's "Palabra" collection
 * @method sfGuardUser           setDocumento()             Sets the current record's "Documento" collection
 * @method sfGuardUser           setAlbum()                 Sets the current record's "Album" collection
 * @method sfGuardUser           setBandejaEntrada()        Sets the current record's "BandejaEntrada" collection
 * @method sfGuardUser           setBandejaSalida()         Sets the current record's "BandejaSalida" collection
 * @method sfGuardUser           setTest()                  Sets the current record's "Test" collection
 * @method sfGuardUser           setGroups()                Sets the current record's "Groups" collection
 * @method sfGuardUser           setPermissions()           Sets the current record's "Permissions" collection
 * @method sfGuardUser           setSfGuardUserPermission() Sets the current record's "sfGuardUserPermission" collection
 * @method sfGuardUser           setSfGuardUserGroup()      Sets the current record's "sfGuardUserGroup" collection
 * @method sfGuardUser           setRememberKeys()          Sets the current record's "RememberKeys" value
 * @method sfGuardUser           setForgotPassword()        Sets the current record's "ForgotPassword" value
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user');
        $this->hasColumn('imagenPerfil', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
             ));
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('email_address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('username', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 128,
             ));
        $this->hasColumn('algorithm', 'string', 128, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 128,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('is_super_admin', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('last_login', 'timestamp', null, array(
             'type' => 'timestamp',
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('PublicacionMuro', array(
             'local' => 'id',
             'foreign' => 'idUsuario'));

        $this->hasMany('Amigo', array(
             'local' => 'id',
             'foreign' => 'idUsuarioAmigo'));

        $this->hasOne('Contenido', array(
             'local' => 'id',
             'foreign' => 'idUsuario'));

        $this->hasMany('Piso', array(
             'local' => 'id',
             'foreign' => 'idUsuario'));

        $this->hasMany('Palabra', array(
             'local' => 'id',
             'foreign' => 'idUsuario'));

        $this->hasMany('Documento', array(
             'local' => 'id',
             'foreign' => 'idUsuario'));

        $this->hasMany('Album', array(
             'local' => 'id',
             'foreign' => 'idUsuario'));

        $this->hasMany('BandejaEntrada', array(
             'local' => 'id',
             'foreign' => 'idUsuarioReceptor'));

        $this->hasMany('BandejaSalida', array(
             'local' => 'id',
             'foreign' => 'idUsuarioReceptor'));

        $this->hasMany('Test', array(
             'local' => 'id',
             'foreign' => 'idUsuario'));

        $this->hasMany('sfGuardGroup as Groups', array(
             'refClass' => 'sfGuardUserGroup',
             'local' => 'user_id',
             'foreign' => 'group_id'));

        $this->hasMany('sfGuardPermission as Permissions', array(
             'refClass' => 'sfGuardUserPermission',
             'local' => 'user_id',
             'foreign' => 'permission_id'));

        $this->hasMany('sfGuardUserPermission', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserGroup', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardForgotPassword as ForgotPassword', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}