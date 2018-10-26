<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$user = $_POST["username"];
$sql = new mysqli ("mysql.eecs.ku.edu", "a769a226", "main4gae", "a769a226");

$valid = mysqli_query($sql, "SELECT user_id FROM Users WHERE user_id = '$user'");
if ($sql->connect_errno){
  print "Connection Error: <br> " . $sql->connect_error . "<br>";
}
else if (mysql_fetch_row($valid)){
  echo "User " . $user . "is already used";
  exit();
}
else {
  $query = mysqli_query($sql, "INSERT INTO Users (user_id) VALUES ('$user')");
  echo "Username " . $user . "has been added to the database";
}
$sql->close();
?>

