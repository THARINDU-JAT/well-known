<?php
class CYBSPEB{
	
	
	
	public function getDefaultForm($OrderID,$PurchaseAmt){

		$SECRET_KEY='0732501e12bc43959a36f06785c417043ad09063fa1f4871b3112d5632f19e22f529a77e138b4d43a88319bed61781198b459f3099024bb7b61653745389a83cf03f827444c9463fb523b9289d0bc08202293c95e8594b0f85401f725c7056604e381284052a4c4a91903db73381011d16b103a911de4484b2109659eaae998a';	
		$access_key='8ec95ed481b03f74bbf0bbe35956284f';
		$profile_id='38C41B61-B597-4F35-A1E6-0044904A0D03';
		//secure access
		// $SECRET_KEY='33b06d6702094a2b851beb6015340d1971f187a31a4849759f6ddb2390480302b0cac1f0e1f54daeb02c3b6ab24fc4eba05bbc95347d4b6e8cec69b3c4fa2fdbdb24d2043ecb4171b4e0a26d7cf6588a8f9f37fc0025405780d67b5f4fa0e5f4a0855e96881a499d8fb163fc82c458fd1ac01dae45a24ceba9e8bacf8d474bff';	
		// $access_key='93364f86d3d73861b6a28394bba55792';
		// $profile_id='02208D54-A351-4C28-80B1-A9F5CF48B7D9';
		//$url='https://secureacceptance.cybersource.com/pay';
		$url='https://testsecureacceptance.cybersource.com/pay';				
		$params=array();
		$params["transaction_uuid"]=uniqid() ;
		$params["access_key"]=$access_key;
		$params["profile_id"]=$profile_id;
		$params["signed_field_names"]="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency";
		$params["unsigned_field_names"]="auth_trans_ref_no,bill_to_forename,bill_to_surname,bill_to_address_line1,bill_to_address_city,bill_to_address_country,bill_to_email";
		$params["signed_date_time"]=gmdate("Y-m-d\TH:i:s\Z");
		$params["locale"]="en";
		$params["transaction_type"]="sale";
		$params["reference_number"]=$OrderID;
		$params["auth_trans_ref_no"]=$OrderID;
		$params["amount"]=$PurchaseAmt;
		$params["currency"]="USD";
		$params["bill_to_email"]="tsystCybs@peb.org";
		$params["bill_to_forename"]="tsys to cybs";
		$params["bill_to_surname"]="Converter";
		$params["bill_to_address_line1"]="PEB";
		$params["bill_to_address_city"]="Borella";
		$params["bill_to_address_country"]="LK";
		$params["signature"]=$this->sign($params,$SECRET_KEY);
		
		$formtext='<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
		$formtext.='<script>$("#payment_confirmation").ready(function(){$("#payment_confirmation").submit();});</script>';
		$formtext.='<form type="hidden" id="payment_confirmation" action="'.$url.'" method="post"/>';
        foreach($params as $name => $value) {
            $formtext.="<input  type='hidden' id='". $name . "' name='" . $name . "' value='" . $value . "'/><br/>";
        }
		$formtext.='</form>';
		
		
		return $formtext;
			
	}
	
	
	private function sign ($params,$SECRET_KEY) {
		return $this->signData($this->buildDataToSign($params),$SECRET_KEY);
	}

	private function signData($data, $secretKey) {
		return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
	}

	private function buildDataToSign($params) {
		$signedFieldNames = explode(",",$params["signed_field_names"]);
		foreach ($signedFieldNames as $field) {
		   $dataToSign[] = $field . "=" . $params[$field];
		}
		return $this->commaSeparate($dataToSign);
	}

	private function commaSeparate ($dataToSign) {
		return implode(",",$dataToSign);
	}
	
	
}


?>