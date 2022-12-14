<?php
namespace Core;
use \PDO;
class Conn{
    public $connect;
    private $query;
    
    protected $user ="Maria869696";
    protected $pass ="Hins&8H5";
    protected $charSet = "utf8";
    protected $option = array(
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8",
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION,
    );

    public function __construct(){
        try {
            $this->connect = new PDO('mysql:host=localhost;dbname=maria869696;charset='.$this->charSet,$this->user,$this->pass,$this->option);
        } catch (PDOException $e) {
            //var_dump($e->getCode());
            var_dump($e->getMessage());
            die();
        }
    }

    public function createComand(string $sql, array $param = []){
        $this->query = $this->connect->prepare($sql);
        $this->query->execute($param);
        return $this;
    }
    public function findOne(){
        if(!empty($this->query)){
            return $this->query->fetch();
        } else
            return false;
    }
    public function findAll(){
        if(!empty($this->query)){
            $res = array();
            while($row = $this->query->fetch()){
                $res[] = $row;
            }
            return $res;
        } else
            return false;
    }
}