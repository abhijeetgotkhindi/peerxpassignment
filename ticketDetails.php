<?php
    
    $auth_token = 'feb61cdcbffb751d4f8f7f52a3cb5ca3'; //your_auth_token
    $org_id=659889223; //your_organization_id
    $ticket_id="241415000018970001";
    
    $headers=array(
            "Authorization: $auth_token",
            "orgId: $org_id",
            "contentType: application/json; charset=utf-8",
    );
    
    $params="include=contacts,products";
    
    if($ticket_id){
        $url="https://desk.zoho.com/api/v1/tickets/$ticket_id?$params";

        $ch= curl_init($url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch,CURLOPT_HTTPGET,TRUE);

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
    }
    else{
        echo "ERROR : Ticket ID is missing";
    }
    
?>
