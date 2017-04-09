<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Click 'n' shop</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<?php
session_start();
require "dbconn.php";

if(!isset($_SESSION['userSession']))
{
  echo "<script type='text/javascript'>alert('You are not logged in! Please log in.');
                    window.location = 'index.php';</script>";
}

$user_name = $_SESSION['userSession'];

if(isset($_POST['btnlogout']))
{
  session_destroy();
  $URL="index.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_POST['bnsubmit']))
{
    $URL="searchfeed.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    $searchtext = $_POST['searchtext'];
    $_SESSION['search_word'] = $searchtext;
}

?>

	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="searchfeed.php">Hello <?php echo $user_name; ?></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="mycart.php">My Cart </a></li>
      </ul>
      <form method="post" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search by keyword.." name="searchtext">
        </div>
        <button type="submit" class="btn btn-info" name="bnsubmit">Submit</button>
      </form>
      <form method="post" class="navbar-form navbar-right">
      <span style="margin-top:0.2em" class="nav navbar-nav navbar-right">
        <button type="submit" class="btn btn-primary" name="btnlogout">Logout</button></span>
      </form>
    </div>
  </div>
</nav>
</body>
</html>
