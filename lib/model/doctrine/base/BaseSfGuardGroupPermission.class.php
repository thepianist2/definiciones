<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SfGuardGroupPermission', 'doctrine');

/**
 * BaseSfGuardGroupPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $group_id
 * @property integer $permission_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property SfGuardGroup $SfGuardGroup
 * @property SfGuardPermission $SfGuardPermission
 * 
 * @method integer                getGroupId()           Returns the current record's "group_id" value
 * @method integer                getPermissionId()      Returns the current record's "permission_id" value
 * @method timestamp              getCreatedAt()         Returns the current record's "created_at" value
 * @method timestamp              getUpdatedAt()         Returns the current record's "updated_at" value
 * @method SfGuardGroup           getSfGuardGroup()      Returns the current record's "SfGuardGroup" value
 * @method SfGuardPermission      getSfGuardPermission() Returns the current record's "SfGuardPermission" value
 * @method SfGuardGroupPermission setGroupId()           Sets the current record's "group_id" value
 * @method SfGuardGroupPermission setPermissionId()      Sets the current record's "permission_id" value
 * @method SfGuardGroupPermission setCreatedAt()         Sets the current record's "created_at" value
 * @method SfGuardGroupPermission setUpdatedAt()         Sets the current record's "updated_at" value
 * @method SfGuardGroupPermission setSfGuardGroup()      Sets the current record's "SfGuardGroup" value
 * @method SfGuardGroupPermission setSfGuardPermission() Sets the current record's "SfGuardPermission" value
 * 
 * @package    definiciones
 * @subpackage model
 * @author     Fabian Allel
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSfGuardGroupPermission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_group_permission');
        $this->hasColumn('group_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('permission_id', 'integer', 8, array(
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
        $this->hasOne('SfGuardGroup', array(
             'local' => 'group_id',
             'foreign' => 'id'));

        $this->hasOne('SfGuardPermission', array(
             'local' => 'permission_id',
             'foreign' => 'id'));
    }
}