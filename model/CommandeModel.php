<?php

namespace model;

class CommandeModel extends Model
{
    public function getCurrentOrder(int $id_u)
    {
        $SQL = "SELECT * FROM {$this->table} WHERE id_u = $id_u AND prix_ttc_com = 0";
        return $this->fetch($SQL);
    }

    public function getPayedOrder(int $id_u)
    {
        $SQL = "SELECT * FROM {$this->table} WHERE id_u = $id_u AND prix_ttc_com <> 0";
        return $this->fetchAll($SQL);
    }
}
