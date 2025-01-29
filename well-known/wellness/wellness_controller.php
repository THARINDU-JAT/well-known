<?php

class wellness_controller
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $wp_order_id= $inputData['wp_order_id'];
        $wp_title= $inputData['wp_title'];
        $wp_full_name= $inputData['wp_full_name'];
        $wp_address= $inputData['wp_address'];
        $wp_nic_pass= $inputData['wp_nic_pass'];
        $wp_dob= $inputData['wp_dob'];
        $wp_mobile_no= $inputData['wp_mobile_no'];
        $wp_land_no= $inputData['wp_land_no'];
        $wp_gender= $inputData['wp_gender'];
        $wp_occup= $inputData['wp_occup'];
        $wp_emp_name_address= $inputData['wp_emp_name_address'];
        $wp_email_address= $inputData['wp_email_address'];
        $wp_marital_status= $inputData['wp_marital_status'];
        $wp_cover= $inputData['wp_cover'];
        $wpq_1a= $inputData['wpq_1a'];
        $wpq_1a_comment= $inputData['wpq_1a_comment'];
        $wpq_1b= $inputData['wpq_1b'];
        $wpq_1b_comment= $inputData['wpq_1b_comment'];
        $wpq_1c= $inputData['wpq_1c'];
        $wpq_1c_comment= $inputData['wpq_1c_comment'];
        $wpq_1d= $inputData['wpq_1d'];
        $wpq_1d_comment= $inputData['wpq_1d_comment'];
        $wpq_1e= $inputData['wpq_1e'];
        $wpq_1e_comment= $inputData['wpq_1e_comment'];
        $wpq_1f= $inputData['wpq_1f'];
        $wpq_1f_comment= $inputData['wpq_1f_comment'];
        $wpq_1g= $inputData['wpq_1g'];
        $wpq_1g_comment= $inputData['wpq_1g_comment'];
        $wpq_1h= $inputData['wpq_1h'];
        $wpq_1h_comment= $inputData['wpq_1h_comment'];
        $wpq_2ab= $inputData['wpq_2ab'];
        $wpq_2ab_comment= $inputData['wpq_2ab_comment'];
        $wpq_3abcd= $inputData['wpq_3abcd'];
        $wpq_3abcd_comment= $inputData['wpq_3abcd_comment'];
        $wpq_3e= $inputData['wpq_3e'];
        $wpq_3e_comment= $inputData['wpq_3e_comment'];
        $wp_agree= $inputData['wp_agree'];


        $wQuery = "INSERT INTO `tbl_wellness_plan` 
        (
         `wp_order_id`,
         `wp_title`,
         `wp_full_name`,
         `wp_address`,
         `wp_nic_pass`,
         `wp_dob`,
         `wp_mobile_no`,
         `wp_land_no`,
         `wp_gender`,
         `wp_occup`,
         `wp_emp_name_address`,
         `wp_email_address`,
         `wp_marital_status`,
         `wp_cover`,
         `wpq_1a`,
         `wpq_1a_comment`,
         `wpq_1b`,
         `wpq_1b_comment`,
         `wpq_1c`,
         `wpq_1c_comment`,
         `wpq_1d`,
         `wpq_1d_comment`,
         `wpq_1e`,
         `wpq_1e_comment`,
         `wpq_1f`,
         `wpq_1f_comment`,
         `wpq_1g`,
         `wpq_1g_comment`,
         `wpq_1h`,
         `wpq_1h_comment`,
         `wpq_2ab`,
         `wpq_2ab_comment`,
         `wpq_3abcd`,
         `wpq_3abcd_comment`,
         `wpq_3e`,
         `wpq_3e_comment`,
         `wp_agree`) 
         VALUES 
         (
        '$wp_order_id',
        '$wp_title',
        '$wp_full_name',
        '$wp_address',
        '$wp_nic_pass',
        '$wp_dob',
        '$wp_mobile_no',
        '$wp_land_no',
        '$wp_gender',
        '$wp_occup',
        '$wp_emp_name_address',
        '$wp_email_address',
        '$wp_marital_status',
        '$wp_cover',
        '$wpq_1a',
        '$wpq_1a_comment',
        '$wpq_1b',
        '$wpq_1b_comment',
        '$wpq_1c',
        '$wpq_1c_comment',
        '$wpq_1d',
        '$wpq_1d_comment',
        '$wpq_1e',
        '$wpq_1e_comment',
        '$wpq_1f',
        '$wpq_1f_comment',
        '$wpq_1g',
        '$wpq_1g_comment',
        '$wpq_1h',
        '$wpq_1h_comment',
        '$wpq_2ab',
        '$wpq_2ab_comment',
        '$wpq_3abcd',
        '$wpq_3abcd_comment',
        '$wpq_3e',
        '$wpq_3e_comment',
        '$wp_agree')";

        $result = $this->conn->query($wQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function update_pay_status($updData)
    {
        $wp_order_id= $updData['wp_order_id'];
        $transaction_id= $updData['transaction_id'];
        $payer_authentication_transaction_id= $updData['payer_authentication_transaction_id'];
        $auth_code= $updData['auth_code'];
        $message= $updData['message'];
        $req_transaction_uuid= $updData['req_transaction_uuid'];
        $auth_reconciliation_reference_number= $updData['auth_reconciliation_reference_number'];
        $decision = $updData['decision'];

        $uquery = "UPDATE `tbl_wellness_plan`
                    SET `transaction_id` = '$transaction_id',
                        `payer_authentication_transaction_id` = '$payer_authentication_transaction_id',
                        `auth_code` = '$auth_code',
                        `message` = '$message',
                        `req_transaction_uuid` = '$req_transaction_uuid',
                        `auth_reconciliation_reference_number` = '$auth_reconciliation_reference_number',
                        `wp_payment_status` = '$decision'
                WHERE CONCAT(`tbl_wellness_plan`.`wp_id`) = '$wp_order_id'";
        $uresult = $this->conn->query($uquery);

        if($uresult==1){
            return "Record Updated...!";
        }else{
            return false;
        }
    }

    public function getSMSid(){

        $wQuery = "SELECT max(wp_id) smsid FROM `tbl_wellness_plan` ORDER BY `wp_id` ASC";

        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data["smsid"];
        }else{
            return false;
        }

    }


}
?>