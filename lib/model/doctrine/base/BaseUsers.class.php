<?php

/**
 * BaseUsers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $password
 * @property string $username
 * 
 * @method string getPassword() Returns the current record's "password" value
 * @method string getUsername() Returns the current record's "username" value
 * @method Users  setPassword() Sets the current record's "password" value
 * @method Users  setUsername() Sets the current record's "username" value
 * 
 * @package    test
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUsers extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('users');
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('username', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}