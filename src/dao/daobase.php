<?php

include_once(__DIR__ . '/../utilities/dbpdo.php');

/**
 * Created by PhpStorm.
 * User: RaoKanakala
 * Date: 8/26/18
 * Time: 12:21 PM
 */
class daobase
{
    /**
     * @return MySQL
     */
    public $DB;

    function __construct()
    {
        $this->DB = new DBPDO();
    }

    protected function ProcessQuery($query, $values = null, $key = null)
    {
        return $this->DB->fetchAll($query);
    }

    protected function ExecuteQuery($query, $values = null)
    {
        return $this->DB->execute($query);
    }
}