<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$sql = new mysqli("mysql.eecs.ku.edu", "a769a226", "main4gae", "a769a226");
$delPost = $_POST['delList'];
$selected = 0;

if (isset($_POST['submit'])){
  if (!empty($_POST['delList'])){
    $selected = count($_POST['delList']);
  }
}
if ($selected == 0){
    echo "No posts have been selected! <br>";
}
else {
  echo "<table>";
    echo "<tr>" . "You have selcted: ". $selected . " post(s) to be deleted!<br>";
    echo "</tr>";
    echo "<tr>" . "The selected posts are: " . "</tr>";
    echo "<tr>";
      echo "<th>" . "Post ID" . "</th>";
    echo "</tr>";
    for($i = 0; $i < $selected; $i++){
      $post_cont = $delPost[$i];
      $access = "SELECT * FROM Posts WHERE content='$post_cont'";
      $delQ = mysqli_query($sql, $access);
      while($j = mysqli_fetch_array($delQ)){
        $id_post[] = $j['post_id'];
       }
      echo "<tr>";
        echo "<td>" . $id_post[$i] . "</td>";
      echo "</tr>";
      $deleteText = "DELETE FROM Posts WHERE post_id = '$id_post[$i]'";
      $deleteQuery = mysqli_query($sql, $deleteText);
    }

  echo "</table>";
  print "The posts you selected have been deleted! <br>";
}
$sql->close();
?>
