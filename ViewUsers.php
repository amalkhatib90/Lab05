<style><?php include "myStylee.css";?></style>
<?php
  $sql = new mysqli ("mysql.eecs.ku.edu", "a769a226", "main4gae", "a769a226");
  $users = mysqli_query($sql, "SELECT * FROM Users");
  $no = 1;
  while($i = mysqli_fetch_array($users)){
	echo "<tr>";
	  echo "<td>";
	    echo $no . ". " . $i['user_id'];
	    $no = $no + 1;
	  echo "</td>";
	  echo "<br>";
	echo "</tr>";
  }
  $sql->close();
?>
