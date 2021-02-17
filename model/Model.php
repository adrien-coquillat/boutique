<?php

namespace model;

use entity\Entity;
use Exception;
use PDO;

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

    public function getAll($table = NULL)
    {
        $table = $table != NULL ? $table : $this->table;
        $sth = $this->db->query("SELECT * FROM $table");
        $sth->setFetchMode(PDO::FETCH_CLASS, Entity::class);
        return $sth->fetchAll();
    }

    public function add($data, $table = NULL)
    {
        $table = $table != NULL ? $table : $this->table;
        $SQL = "INSERT INTO $table (";
        $SQL_P2 = '';
        $argNb = count($data);
        $i = 0;
        foreach ($data as $key => $value) {
            $i++;
            $SQL .= " $key";
            $SQL_P2 .= " :$key";

            if ($argNb != $i) {
                $SQL .= ',';
                $SQL_P2 .= ',';
            }
        }
        $SQL .= ') VALUES (' . $SQL_P2 . ');';
        $sth = $this->db->prepare($SQL);

        foreach ($data as $key => $value) {
            $sth->bindParam(":$key", $data[$key]);
        }

        $sth->execute();
    }

    public function edit(array $data, $table = NULL)
    {
        $table = $table != NULL ? $table : $this->table;

        reset($data);
        $id = key($data);
    }

    public function del(array $data, $table = NULL)
    {
        $table = $table != NULL ? $table : $this->table;

        reset($data);
        $id = key($data);
        $this->db->query("DELETE FROM $table WHERE $id");
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
