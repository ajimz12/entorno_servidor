<?php
class Connect{
    public static function connection(){
        $connection=new mysqli("localhost", "root", "", "shop");
        $connection->query("SET NAMES 'utf8'");
        return $connection;
    }
}
