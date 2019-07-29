<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notifications{

	function __constructor()
	{

	}

	public function send_notification($gcm_regid,$message) 
	{

      $url = 'https://fcm.googleapis.com/fcm/send';

      $mess = array

    (

    	'message' 	=> $message

    );

      $fields = array

    (

    	'registration_ids' 	=> $gcm_regid,

    	'data'			=> $mess

    );

     

    $headers = array

    (

    	'Authorization: key=' .API_ACCESS_KEYZ,

    	'Content-Type: application/json'

    );

    //echo json_encode( $fields );



    // Open connection

            $ch = curl_init();

     

            // Set the url, number of POST vars, POST data

            curl_setopt($ch, CURLOPT_URL, $url);

     

            curl_setopt($ch, CURLOPT_POST, true);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     

            // Disabling SSL Certificate support temporarly

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

     

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ));

     

            // Execute post

            $result = curl_exec($ch);

            if ($result === FALSE) {

                die('Curl failed: ' . curl_error($ch));

            }

     

            // Close connection

            curl_close($ch);

            

            return  $result;

     }

    function send_ios_notification($deviceid1,$message1)
    {
        $result = '';
        //$deviceid1 = array('7280ec9969bfaf8e6408ae1e9bb8c817eba6cda191c7e17125c8c2439b5f084f');
        // Put your private key's passphrase here:

        $ctx = stream_context_create();

        stream_context_set_option($ctx, 'ssl', 'local_cert', APPPATH.'/libraries/pushcert.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', '123456');

        //stream_context_set_option($ctx, 'ssl', 'cafile', 'entrust_2048_ca.cer');

        // Open a connection to the APNS server
        $fp = stream_socket_client(
        	'ssl://gateway.sandbox.push.apple.com:2195', $err,
        	$errstr, 60, STREAM_CLIENT_CONNECT, $ctx);//|STREAM_CLIENT_PERSISTENT
       
        if (!$fp)
        	exit("Failed to connect: $err $errstr" . PHP_EOL);

            $obj = json_decode($message1);
            $mess=$obj->message;
            $tar=$obj->target;
            

        $body['aps'] = array(
        	'alert' => $mess,
            'target'=> $tar,
        	'sound' => 'default'
        	);
        
        // Encode the payload as JSON
        $payload = json_encode($body);
         
        	foreach ($deviceid1 as $deviceid) {
        		if($deviceid!="" &&  strlen($deviceid)==64){
        			//echo $deviceid;
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceid) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));
        }
        }
        if (!$result)
        	return 'Message not delivered' . PHP_EOL;
        else
        	//echo 'Message successfully delivered ' . PHP_EOL;
        fclose($fp);
        	
        //}

    }

}
?>