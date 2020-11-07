<?php
    $auth_token = '9446933330c7f886fbdf16782906a9e0';
    $org_id=60001280952;
	
	 if (isset($_REQUEST['json_string'])) {
		 
		 $json_data = json_decode($_REQUEST['json_string'], true);
	
     $ticket_data = array(
		"subject" => $json_data['subject'],
        "departmentId" => $json_data['department'],
        "category" => $json_data['category'],       
        "description" => $json_data['description'],
        "priority" => $json_data['priority']
    );;

    $headers = array(
            "Authorization: $auth_token",
            "orgId: $org_id",
            "contentType: application/json; charset=utf-8",
    );
    
    $url="https://desk.zoho.in/api/v1/tickets/";
    
    $ticket_data = (gettype($ticket_data)==="array")? json_encode($ticket_data):$ticket_data;
    $ch= curl_init($url);
	
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
	
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
	
    curl_setopt($ch,CURLOPT_POST,TRUE);
	
    curl_setopt($ch, CURLOPT_POSTFIELDS,$ticket_data); //convert ticket data array to json
    
    $response= curl_exec($ch);
    $info= curl_getinfo($ch);
    if($info['http_code']==200){
        echo "<h2>Request Successful, Response:</h2> <br>";
        echo $response;
    }
    else{
        echo "Request not successful. Response code : ".$info['http_code']." <br>";
        echo "Response : $response";
    }
    
    curl_close($ch);
	} else {
        header("HTTP/1.0 400 Bad Request");
        echo "Unidentified source of request!";
        exit;
    }
?>
