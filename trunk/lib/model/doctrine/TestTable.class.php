<?php

/**
 * TestTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TestTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TestTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Test');
    }
}