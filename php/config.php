<?php

class db_connection
{
    private $user = "root";
    private $pass = "";
    private $host = "localhost";
    private $db = "dvd_collections";
    public function connectDb()
    {
        $mysql = new mysqli($this->host,$this->user,$this->pass,$this->db) or 
        die(header("HTTP/1.1 500 Internal Server Error"));
        return $mysql;
    }
}

?>