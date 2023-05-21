<?php

$con = mysqli_connect('localhost','root','', 'userdata');
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>
