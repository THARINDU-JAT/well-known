<?php
class CYBSPEB{
	
	
	
	public function getDefaultForm($OrderID,$PurchaseAmt){
		$SECRET_KEY='f42647b01f074fa9a42766658359ec492a1f0aa87c594542b56528c443a3157a7b6979e2f1934adbb6805e01a153da54d4e64ddf410b4adf8f1581ef9b683a92fcaa574812d240b4b97fe9174a10a6b8557332fbc18d48efa05019586b8181c4c9031dcaccc84292ad77a622b406a7dab984e6c25355489297b3351b39483361';	
		$access_key='9c78a12d3ea03900a861196dcfd65515';
		$profile_id='02208D54-A351-4C28-80B1-A9F5CF48B7D9';
		$url='https://secureacceptance.cybersource.com/pay';
		//$url='https://testsecureacceptance.cybersource.com/pay';				
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
		$params["currency"]="LKR";
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