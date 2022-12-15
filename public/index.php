<!doctype html>
<html lang=en>
  <head>
    <meta charset=utf-8>
    <title>FN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/main.css">
    <link rel="icon" href="/favicon.ico" />
  </head>
  <body>
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
    <div id="hello-wrapper">
      <div id="particles-js"></div>
      <div class="content position-absolute w-100 top-0 pt-5">
        <div class="cta">
          <div id="hello" class="typewriter pb-3">
            Hello World!
          </div>
          <a class="btn btn-primary mb-5" href="//app.cyclic.sh/api/login">Sign in to Cyclic</a>
        </div>
        <div id="world">
          <canvas id='rotatingGlobe' style='cursor: move;'></canvas>
        </div>
      </div>
    </div>
    <script type='text/javascript' src='//d3js.org/d3.v3.min.js'></script>
    <script type='text/javascript' src='//d3js.org/topojson.v1.min.js'></script>
    <script type='text/javascript' src='planetaryjs.min.js'></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script type='text/javascript' src='particles.js'></script>
    <script type='text/javascript' src='globe.js'></script>
  </body>
</html>
