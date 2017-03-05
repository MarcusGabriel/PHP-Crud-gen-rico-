<?php

namespace Asw\Database;



class Attributes{

    public function getKeys($attributes){
        return implode(",",array_keys($attributes));
    }        
    public function getFieldsCreate($attributes){
        return ":".implode(",:",array_keys($attributes));
    }    

    public function bindParam($attributes){
        return array_combine(explode(",",(":".implode(",:", array_keys($attributes)))),array_values($attributes));
    }

    public function getFieldsUpdate($attributes){
        //query = 'update users set name=:name';
        $query = null;
        foreach ($attributes as $key => $value) {
            $query .= $key."=:".$key.",";
        }
        return $query = rtrim($query,",");
    }
}