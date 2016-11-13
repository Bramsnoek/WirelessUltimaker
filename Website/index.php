<?php
session_start(); // You'll have to start the session to destroy it (I know, pretty strange!)



if($_SESSION['ingelogd'] !== true){
  header('Location: login.php');
}

?>
<html>
<head>
<title>OpenID Connect test page</title>
</head>
<body>
<h1>Welcome <?php echo $_SESSION['name'];?></h1>
<ul>
  <?php foreach($_SESSION as $key => $value){
    echo "<li>$key => $value</li>";
  }?>
</ul>
</body>
</html>
