<?php
class sendsms {
    public function __construct() {
        // Set timezone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');
    }

    private function logError($message, $data = []) {
        $logFile = __DIR__ . '/sms_log.txt';
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[{$timestamp}] {$message}" . 
                     (empty($data) ? '' : ' Data: ' . print_r($data, true)) . 
                     "\n";
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }

    public function formatPaymentMessage($amount, $policyNo) {
        $date = date('Y-m-d');
        $time = date('H:i'); // Will now use Sri Lanka time
        
        $message = "Dear Valued Customer,\n\n" .
                  "We have received a payment of Rs. " . number_format($amount, 2) . " on {$date} at {$time} " .
                  "for your policy number {$policyNo}. The payment will be updated in our system within one working day.\n" .
                  "For any assistance, please feel free to contact us at 0112557300.\n\n" .
                  "Thank you for choosing Co-operative Insurance company PLC.";
        
        $this->logError("Formatted message:", ['message' => $message]);
        return $message;
    }

    public function send($phoneNo, $message, $policyNo) {
        // Log initial call with correct timezone
        $this->logError("Attempting to send SMS", [
            'phoneNo' => $phoneNo,
            'policyNo' => $policyNo,
            'currentTime' => date('Y-m-d H:i:s')
        ]);

        // Validate and format phone number
        $phoneNo = preg_replace('/[^0-9]/', '', $phoneNo);
        if (strlen($phoneNo) === 9) {
            $phoneNo = '0' . $phoneNo;
        }
        
        // Base URL
        $baseUrl = "http://124.43.209.65:8082/dialog-sms/save";
        
        // Prepare parameters
        $params = [
            'phoneNo' => $phoneNo,
            'message' => $message,
            'policyNo' => $policyNo,
            'category' => 'OnlinePayment'
        ];
        
        // Create URL with parameters
        $url = $baseUrl . '?' . http_build_query($params);
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => '',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: */*'
            ],
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        // Log response
        $this->logError("API Response:", [
            'httpCode' => $httpCode,
            'response' => $response,
            'error' => $err,
            'time' => date('Y-m-d H:i:s')
        ]);

        curl_close($curl);
        
        return [
            'success' => ($httpCode == 200),
            'response' => $response,
            'error' => $err
        ];
    }
}