
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result = $con->query("SELECT * FROM `users` where userid='$username'");
?>

<?php
include('header.php');
include('navbar.php');
?>
<br><br><br>
<a  href="index.php">Home</a>
<form method="post" action="profile.php" enctype="multipart/form-data">
                    <div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //SELECT `userid`, `name`, `password`, `email`, `phone`, `doe`, `status`, `question`, `answer`, `usertype` FROM `users` WHERE 1
    ?>
    <table>
    <tr>
        <td>
       <h3> <?php echo $row['userid'] ?> </h3>
    </td>
<td>


<?php echo $row['name'] ?> <br>
        
<?php echo $row['email'] ?><br>
        <?php echo $row['phone'] ?><br>
        
        
       
        <?php echo '<a  text-decoration: none;"  href="edit_profile.php?id=' . $row['userid'] . '">Edit Details</a>';?>
        
         </td>   
    

<?php
      }
    }
                        ?>
</td>
</tr>
</table>
                    </div>
                </form>

    </div>


</body>
</html>