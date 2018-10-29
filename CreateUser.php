<style><?php include "myStylee.css";?></style>

<?php
echo "<body style='background: url('paper.jpg')'>";
$user = $_POST["username"];
$sql = new mysqli ("mysql.eecs.ku.edu", "a769a226", "main4gae", "a769a226");

$valid = mysqli_query($sql, "SELECT user_id FROM Users WHERE user_id = '$user'");
if ((mysqli_num_rows($valid)) > 0){
  echo "User " . $user . " has already been added to the database";
  exit();
}
else if($sql->connect_errno){
  print "Connection Error: <br> " . $sql->connect_error . "<br>";
  exit();
}
else if($user == null){
  print "Cannot add a user without a name!";
}
else {
  $query = mysqli_query($sql, "INSERT INTO Users (user_id) VALUES ('$user')");
  echo "Username " . $user . " has been added to the database";
}

$sql->close();
?>
