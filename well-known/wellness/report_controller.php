<?php

class report_controller
{

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

  


    public function getAllData(){

        $query = "SELECT * FROM `tbl_wellness_plan` ORDER BY `wp_id` desc";

        $result = $this->conn->query($query);
        
        if ($result->num_rows > 0) {
 
            return  $result;
        }else{
            return false;
        }
    }




}
?>