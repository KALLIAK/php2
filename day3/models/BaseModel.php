<?php

namespace models;

abstract class BaseModel
{
    private $db;
    private $table;

    public function __construct(\PDO $db, string $table)
    {
        $this->db = $db;
        $this->table = $table;
        $this->db->exec('SET NAMES UTF8');
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY dt DESC";
        $query = $this->db->prepare($sql);
        $query->execute();
        $info = $query->errorInfo();
        if ($info[0] !== \PDO::ERR_NONE) {
            exit($info[2]);
        }
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_news=:id";
        $params = ['id' => $id];
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $info = $query->errorInfo();
        if ($info[0] !== \PDO::ERR_NONE) {
            exit($info[2]);
        }
        return $query->fetch();
    }
}