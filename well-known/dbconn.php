<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','coopinsu_online');

class DatabaseConnection
{
    public $conn; // Declare $conn as a public property

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($this->conn->connect_error)
        {
            die("Database Connection Failed: " . $this->conn->connect_error);
        }
    }
}

?>