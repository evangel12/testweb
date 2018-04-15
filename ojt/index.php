<?php
//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode){
$url = 'https://www.itexmo.com/php_api/api.php';
$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
$param = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($itexmo),
    ),
);
$context  = stream_context_create($param);
return file_get_contents($url, false, $context);}
//##########################################################################

 if($_POST){
  $number = $_POST['number'];
  $name = $_POST['name'];
  $msg = $_POST['msg'];
  $api = "TR-EVANG183484_RNINM"; 
  $text = $name.":".$msg;

  if (!empty($_POST['name']) && ($_POST['number']) && ($_POST['msg'])) {
   $result = itexmo($number,$text,$api);
if ($result == ""){
echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
Please CONTACT US for help. ";  
}else if ($result == 0){
echo "Message Sent!";
}
else{ 
echo "Error Num ". $result . " was encountered!";
}   
  }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

     <title>E-learning</title>
  </head>
  <body>
    

    <div class="container sms">
      <div class="row">
        <div class="col-md-4 col-sn-6 col-xs-12">
          <form method="POST" action="index.php">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" maxlength="10" class="form-control" id="name" placeholder="Name of Sender" name="name" required>
            </div>
                    <div class="form-group">
                        <label for="number">Phone Number:</label>
                        <input type="text" maxlength="11" class="form-control" id="number" placeholder="Number" name="number" required>
                    </div>
                    <div class="form-group">
                        <label class="msg">Message:</label>
                        <textarea class="form-control" rows="3" name="msg" placeholder="Type Your Message Here" onkeyup="countchar(this)" required></textarea>
                    </div>
                    <p class="text-right" id="charNum">85</p>
                        <button type="submit" class="btn btn-success">Send</button>
                  </form>
            </div>

      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script>
    function countchar(val){
        var len = val.value.length;
 
        if (len >= 85) {
            val.value = val.value.substring(0,85);
        }else{
            $('#charNum').text(85 - len);
        }
    };


</script>


  </body>
</html>

