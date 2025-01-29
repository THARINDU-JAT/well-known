<?php

define ('HMAC_SHA256', 'sha256');
//define ('SECRET_KEY', '<REPLACE WITH SECRET KEY>');
define ('SECRET_KEY', 'd6f12e61ecd74bdca5997a727c00a45d5b1f0525ceed4c46be8e1a41b18ed657eacdc84f2fd04de99d65d2b1510c8f8b74690c16aae64edcaf2da8cab0a2fd8961a411d112074c02b9043c7fdba947610fd107c3783445c4a7738091a3adaa75bcad164bbe97446284d0178b236a73c95ca36aab20ea452197fff76c134fab08');
function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?>
