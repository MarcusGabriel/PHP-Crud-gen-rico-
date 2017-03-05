<?php


namespace Asw\Database;

use Acme\Interfaces\Imodel;
use Asw\Database\Connection;
use Asw\Database\Attributes;
use PDO;


class AswModel implements Imodel{

    private $database;
    private $attributes;
    public function __construct(){
        $this->database = Connection::getConnection();
        $this->attributes = new Attributes();
    }
    public function create($attributes){
        if(!empty($attributes)){
            $keys = $this->attributes->getKeys($attributes);
            $fields = $this->attributes->getFieldsCreate($attributes);
            $bindParam = $this->attributes->bindParam($attributes);
            try{
                $query = "INSERT INTO ".$this->table."(".$keys.") values(".$fields.")";
                $stmt = $this->database->prepare($query);
                $stmt->execute($bindParam);
                return $this->database->lastInsertId();
            }catch(\PDOException $e){
                var_dump($e->getMessage());
            }
        }
        return 0;
    }

    public function read(){
        $query = "select * from ".$this->table;
        $pdo = $this->database->prepare($query);
        try{
            $pdo->execute();
            return $pdo->fetchAll();
        }catch(\PDOExecption $e){
            dump($e->getMessage());
        }
    }

    public function update($id, $attributes){
        //query = 'update users set name=:name, email=:email, password=:password,'
        $fieldsUpdate = $this->attributes->getFieldsUpdate($attributes);
        $query = "UPDATE $this->table SET $fieldsUpdate where id = :id";
        $bindParam = $this->attributes->bindParam($attributes);
        $bindParam[':id'] = $id;
        $stmt = $this->database->prepare($query);
        try{
            $stmt->execute($bindParam);   
            return $stmt->rowCount();                     
        }catch(\PDOException $e){
            dump($e->getMessage());
        }
    }

    public function delete($name, $value){
        $query = "delete from $this->table where $name = :$name";
        $stmt = $this->database->prepare($query);
        try{
            $stmt->bindParam(":$name", $value);
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e){            
            dump($e->getMessage());
        }
    }

    public function findBy($name, $value){
        $query = "select * from $this->table where $name = :$name";
        $stmt = $this->database->prepare($query);
        $stmt->bindParam(":$name", $value);
        try{
            $stmt->execute();
            return $stmt->fetch();
        }catch(\PDOException $e){
            dump($e->getMessage());
        }
    }  
}