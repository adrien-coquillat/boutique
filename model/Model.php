<?php

namespace model;

use Exception;
use PDO;
use phpDocumentor\Reflection\Utils;

class Model
{
    protected $db;
    protected $host = 'localhost';
    protected $login = 'root';
    protected $dbname = 'boutique';
    protected $password = '';
    protected $table;

    public function __construct()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=boutique', $this->login, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        $this->db = $db;
        $this->table = $this->getTableName();
    }

    public function getAll()
    {
        $sth = $this->db->query('SELECT * FROM {$this->table}');
        $sth->setFetchMode(PDO::FETCH_CLASS, UtilisateurModel::class);
        var_dump($sth);
        return $sth->fetchAll();
    }

    public function getTableName()
    {
        $className = get_class($this);
        $pos = strpos($className, 'model\\') + 6;
        $table = '';
        for ($i = $pos; $i < strlen($className); $i++) {
            $table .= strtolower($className[$i]);
        }
        return ucfirst(str_replace('model', '', $table));
    }
}
