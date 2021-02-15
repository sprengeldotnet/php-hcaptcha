<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
  </head>
  <script src="https://hcaptcha.com/1/api.js" async defer></script>
  <body>
    <form method="post">
      <input type="email" name="email" placeholder="john.doe@sprengel.net"><br>
      <input type="password" name="password" placeholder="Password"><br>
      <div class="h-captcha" data-sitekey="10000000-ffff-ffff-ffff-000000000001" data-theme="dark"></div>
      <button type="submit" name="submit">Login</button>
    </form>
  </body>
</html>
<?php
if(isset($_POST["submit"])){
  $data = array('secret' => '0x0000000000000000000000000000000000000000', 'response' => $_POST['h-captcha-response']);
  //replace the dummy key with your secret key
  
  //don't touch this section, i somehow got it to work.
  $ch = curl_init();  //Initialize cURL session
  curl_setopt($ch, CURLOPT_URL, 'https://hcaptcha.com/siteverify'); //Set Verify URL
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  //Set the Data to Post
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //do not output, use variable
  $response = curl_exec($ch); //store the content in variable
  $json_response = json_decode($response, true);  //decode the response
  curl_close($ch);  //close curl
  
  if ($response['success']){ 
  //if true ( {"success":true,[...]} )
  
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // do stuff
    
  } else{
  //if response is not true ( {"success":false,[...]} )
    
    print("Please verify the captcha to continue");
    die();
    
  }
?>
