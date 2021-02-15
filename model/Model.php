<?php

namespace model;

use PDO;

class Model
{
    protected $db;
    protected $host = 'localhost';
    protected $login = 'root';
    protected $dbname = 'boutique';
    protected $password = '';

    public function __construct()
    {
        //$this->db = new PDO("mysqli:host={$this->host};dbname={$this->dbname}", $this->login, $this->password);
    }

    public function getAll()
    {

        $this->db->query('SELECT * FROM ');
    }

    public function getTableName()
    {
        echo (__METHOD__);
    }
}
