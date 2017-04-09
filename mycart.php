<?php
  ini_set('mysql.connect_timeout', 300);
  ini_set('default_socket_timeout', 300);
  error_reporting(0);
?>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Click 'n' Shop</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
	    .center{
				text-align: center;
			}

    </style>
</head>

<body>
	
<?php
session_start();
require "dbconn.php";
require "navbar.php";

if(!isset($_SESSION['userSession']))
{
  echo "<script type='text/javascript'>alert('You are not logged in! Please log in.');
                    window.location = 'index.php';</script>";
}

$user_name = $_SESSION['userSession'];

$sqlquery = "select * from purchase where cname = '$user_name'";
$result = $conn->query($sqlquery);

while($row = mysqli_fetch_array($result))
{
	echo '
	<div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span8">
                <h4><strong>'.$row[1].'</strong></h4>
              </div>
            </div>
            <div class="row">
              <div class="span10">      
                <p>Quantity : 
                  '.$row[3].'
                </p>
               <!-- <p><a class="btn" href="#">Read more</a></p>	--> 
              </div>
            </div>
            <div class="row">
              <div class="span8">
                <p>Status : ';

                  echo '<span class="label label-info" style="margin-left: 1em">'.$row[5].'</span>';
                
                echo '</p>
              </div>
            </div>
            <div class="row">
              <div class="span8">
                <p> Price (USD): '.$row[4].' </p>
                </div>
            </div>
          </div>
        </div>
   </div>
  <hr>';
}

?>

</body>
</html>