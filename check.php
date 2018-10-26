<?php
  $user = $_POST["username"];
  $sql = new mysqli("mysql.eecs.ku.edu", "a769a226", "main4gae", "a769a226");
  $valid = mysqli_query($sql, "SELECT user_id FROM User WHERE user_id = '$user'");

  if ($sql->connect_errno){
	 print "Connection Error: <br> " . $sql->connect_error . "<br>";
  }
  else if (mysqli_num_rows($valid) != 0){
	echo "User " . $user . "is already used";
  	exit();
  }
?>
