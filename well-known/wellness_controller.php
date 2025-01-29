<?php

class wellness_controller {
    public $conn; // Declare $conn as a public property

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($this->conn->connect_error)
        {
            die("Database Connection Failed: " . $this->conn->connect_error);
        }
    }

    public function create($inputData) {
        // Sanitize input data to prevent SQL injection
        $sanitizedData = array_map(function($value) {
            return $this->conn->real_escape_string($value);
        }, $inputData);

        // Extract variables using sanitized data
        $fields = [
            'wp_order_id', 'wp_title', 'wp_full_name', 'wp_address', 'wp_nic_pass',
            'wp_dob', 'wp_mobile_no', 'wp_land_no', 'wp_gender', 'wp_occup',
            'wp_emp_name_address', 'wp_email_address', 'wp_marital_status', 'wp_cover',
            'wpq_1a', 'wpq_1a_comment', 'wpq_1b', 'wpq_1b_comment', 'wpq_1c',
            'wpq_1c_comment', 'wpq_1d', 'wpq_1d_comment', 'wpq_1e', 'wpq_1e_comment',
            'wpq_1f', 'wpq_1f_comment', 'wpq_1g', 'wpq_1g_comment', 'wpq_1h',
            'wpq_1h_comment', 'wpq_2ab', 'wpq_2ab_comment', 'wpq_3abcd',
            'wpq_3abcd_comment', 'wpq_3e', 'wpq_3e_comment', 'wp_agree'
        ];

        $columns = implode('`, `', $fields);
        $values = implode("', '", array_map(function($field) use ($sanitizedData) {
            return $sanitizedData[$field] ?? '';
        }, $fields));

        $query = "INSERT INTO `tbl_wellness_plan` (`$columns`) VALUES ('$values')";
        
        return $this->conn->query($query) ? true : false;
    }

    public function create_tgpolicy($inputData) {
        // Sanitize input data
        $sanitizedData = array_map(function($value) {
            return $this->conn->real_escape_string($value);
        }, $inputData);

        // Required fields
        $op_order_id = $sanitizedData['op_order_id'];
        $op_pol_type = $sanitizedData['op_pol_type'];
        $op_mobile_no = $sanitizedData['op_mobile_no'];
        $op_pol_no = $sanitizedData['op_pol_no'];
        
        // Optional fields with defaults
        $payer_authentication_transaction_id = $sanitizedData['payer_authentication_transaction_id'] ?? '';
        $auth_code = $sanitizedData['auth_code'] ?? '';
        $message = $sanitizedData['message'] ?? '';
        $req_transaction_uuid = $sanitizedData['req_transaction_uuid'] ?? '';
        $auth_reconciliation_reference_number = $sanitizedData['auth_reconciliation_reference_number'] ?? '';
        $op_payment_status = $sanitizedData['op_payment_status'] ?? 'PENDING';

        $query = "INSERT INTO `tbl_online_payment` (
            `op_order_id`, `op_pol_type`, `op_pol_no`, `payer_authentication_transaction_id`,
            `auth_code`, `message`, `req_transaction_uuid`, 
            `auth_reconciliation_reference_number`, `op_payment_status`, `op_mobile_no`
        ) VALUES (
            '$op_order_id', '$op_pol_type', '$op_pol_no', '$payer_authentication_transaction_id',
            '$auth_code', '$message', '$req_transaction_uuid',
            '$auth_reconciliation_reference_number', '$op_payment_status', '$op_mobile_no'
        )";

        return $this->conn->query($query) ? true : false;
    }

    public function update_pay_status($updData) {
        // Sanitize input data
        $sanitizedData = array_map(function($value) {
            return $this->conn->real_escape_string($value);
        }, $updData);

        $query = "UPDATE `tbl_wellness_plan` SET
            `transaction_id` = '{$sanitizedData['transaction_id']}',
            `payer_authentication_transaction_id` = '{$sanitizedData['payer_authentication_transaction_id']}',
            `auth_code` = '{$sanitizedData['auth_code']}',
            `message` = '{$sanitizedData['message']}',
            `req_transaction_uuid` = '{$sanitizedData['req_transaction_uuid']}',
            `auth_reconciliation_reference_number` = '{$sanitizedData['auth_reconciliation_reference_number']}',
            `wp_payment_status` = '{$sanitizedData['wp_payment_status']}'
            WHERE `wp_order_id` = '{$sanitizedData['wp_order_id']}'";

        return $this->conn->query($query) ? true : false;
    }

    public function update_tgpolicy_status($inputData) {
        // Sanitize input data
        $sanitizedData = array_map(function($value) {
            return $this->conn->real_escape_string($value);
        }, $inputData);

        $query = "UPDATE `tbl_online_payment` SET
            `payer_authentication_transaction_id` = '{$sanitizedData['payer_authentication_transaction_id']}',
            `auth_code` = '{$sanitizedData['auth_code']}',
            `message` = '{$sanitizedData['message']}',
            `req_transaction_uuid` = '{$sanitizedData['req_transaction_uuid']}',
            `auth_reconciliation_reference_number` = '{$sanitizedData['auth_reconciliation_reference_number']}',
            `op_payment_status` = '{$sanitizedData['op_payment_status']}',
            `auth_amount` = '{$sanitizedData['auth_amount']}'
            WHERE `op_order_id` = '{$sanitizedData['op_order_id']}'";

        $result = $this->conn->query($query);
        return $result ? "Record Updated...!" : false;
    }

    public function getSMSid() {
        $query = "SELECT MAX(wp_id) as smsid FROM `tbl_wellness_plan`";
        $result = $this->conn->query($query);
        return ($result && $result->num_rows == 1) ? $result->fetch_assoc()['smsid'] : false;
    }

    public function getNewSMSid($mobile) {
        $query = "SELECT MAX(sms_id) as smsid FROM tbl_sms";
        $result = $this->conn->query($query);
        
        if ($result && $result->num_rows == 1) {
            $this->smsCount($mobile);
            return $result->fetch_assoc()['smsid'];
        }
        return false;
    }

    public function smsCount($mobile) {
        $mobile = $this->conn->real_escape_string($mobile);
        $query = "INSERT INTO `tbl_sms` (`sms_desc`) VALUES ('$mobile')";
        $this->conn->query($query);
    }

    public function getMobile($orderID) {
        return $this->getFieldFromTable('op_mobile_no', 'tbl_online_payment', 'op_order_id', $orderID);
    }

    public function getWellnessMobile($orderID) {
        return $this->getFieldFromTable('wp_mobile_no', 'tbl_wellness_plan', 'wp_order_id', $orderID);
    }

    public function getTGMobile($orderID) {
        return $this->getFieldFromTable('op_mobile_no', 'tbl_online_payment', 'op_order_id', $orderID);
    }

    public function getTGPolicyNo($orderID) {
        return $this->getFieldFromTable('op_pol_no', 'tbl_online_payment', 'op_order_id', $orderID);
    }

    public function getTGSeqNo($orderID) {
        return $this->getFieldFromTable('op_id', 'tbl_online_payment', 'op_order_id', $orderID);
    }

    // Helper method to reduce code duplication in getter methods
    private function getFieldFromTable($field, $table, $whereField, $whereValue) {
        $whereValue = $this->conn->real_escape_string($whereValue);
        $query = "SELECT `$field` FROM `$table` WHERE `$whereField` = '$whereValue'";
        $result = $this->conn->query($query);
        return ($result && $result->num_rows == 1) ? $result->fetch_assoc()[$field] : false;
    }
}
?>