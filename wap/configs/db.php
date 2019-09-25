<?php
namespace configs;

class db
{
    protected $conn;
    protected $resource;
    public function __construct($host, $user, $passwd, $dbname, $port = 3306)
    {
        $conn = new \PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->conn = $conn;
    }

    public function query($sql,$params = array())
    {
        $this->resource = $this->conn->prepare($sql);
        $this->resource->execute($params);
        if (strtolower(substr($sql,0,6)) != "select") {
            return $this->resource->rowCount();
        }
        return $this;
    }

    public function fetchAll()
    {
        return $this->resource->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function fetchOne()
    {
        return $this->resource->fetch(\PDO::FETCH_ASSOC);
    }

    public function close()
    {
        unset($this->conn);
    }
}
#统一修改数据库配置的地方
$db = new db('127.0.0.1','root','root','jianlei');
return $db;