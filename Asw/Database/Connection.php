<?php

namespace Asw\Database;

use PDO;

class Connection {
    protected static $db;    
    private $data;
    const INI = './config/database.ini';

    public function __construct(){
        $this->data = parse_ini_file(self::INI);
        //'MYSQL:host=LOCALHOST;dbname=CRUD', 'ROOT', ''
        $driver     = $this->data['driver'];
        $host       = $this->data['host'];
        $dbname     = $this->data['dbname'];
        $user       = $this->data['user'];
        $pass       = $this->data['pass'];
        
        try{
            self::$db = new PDO($driver.':host='.$host.';dbname='.$dbname, $user, $pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            self::$db->exec('SET NAMES utf8');
        }catch(PDOException $e){
            dump($e->getMessage());
        }
    }

    public static function getConnection(){
        if(!self::$db){
            new Connection();
        }

        return self::$db;
    }
}
