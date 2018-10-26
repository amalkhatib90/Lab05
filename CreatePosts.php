<?php

$user = $_POST["username"];
$newPost = $_POST["posts"];
$sql = new mysqli ("mysql.eecs.ku.edu", "a769a226", "main4gae", "a769a226");

$valid = mysqli_query($sql, "SELECT user_id FROM Users WHERE user_id = '$user'");
if ($sql->connect_errno){
  print "Connection Error: <br> " . $sql->connect_error . "<br>";
}
else if (((mysqli_num_rows($valid)) == 0)){
  echo "User " . $user . " is not valid";
  exit();
}
else if ($user == 'null'){
  print "Please enter Username";
  exit();
}
else if ($newPost == 'null'){
  print "Please enter some text in here";
  exit();
}
else {
  $query = mysqli_query($sql, "INSERT INTO Posts (content, author_id) VALUES ('$newPost', '$user')");
  echo "Username " . $user . " and your text has been added to the database";
}
$sql->close();
?>
