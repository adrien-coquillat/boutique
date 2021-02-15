<?php

namespace model;

use Exception;
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
        try {
            $db = new PDO('mysql:host=localhost;dbname=boutique', $this->login, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $this->db = $db;
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
