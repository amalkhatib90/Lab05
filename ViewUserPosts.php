<style><?php include "myStylee.css";?></style>
<?php
 echo "<body>";
   $sql = new mysqli("mysql.eecs.ku.edu", "a769a226", "main4gae", "a769a226");
   $users = $_POST[thisUser];
   $posts = mysqli_query($sql, "SELECT (content) FROM Posts WHERE author_id='$users'");
   if (mysqli_num_rows($posts) != 0){
     echo "<table>";
     echo "<tr>" . "<th>" . "User " . $users ."'s post is: " . "</th>" . "</tr>";
     while($i = mysqli_fetch_array($posts)){
      echo "<tr>";
        echo "<td>";
          echo  $i['content'];
        echo "</td><br>";
      echo "</tr>";
    }
   } 
   else{
     print "This user: " . $users . " has no posts yet!";
     exit();
   }
   $sql->close(); 
 echo "</body>";
?>
