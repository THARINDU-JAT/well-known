<?php

define('DB_HOST','localhost');
define('DB_USER','coopinsu_cionlineusr');
define('DB_PASSWORD','HLXY_6b,&QZ)');
define('DB_DATABASE','coopinsu_online');

class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

        if($conn->connect_error)
        {
            die ("<h1>Database Connection Failed</h1>");
        }
       // echo "Database Connected Successfully";
        return $this->conn = $conn;
    }
}

?>