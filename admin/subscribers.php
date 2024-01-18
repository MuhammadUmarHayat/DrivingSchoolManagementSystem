
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result = $con->query("SELECT * FROM `subscriptions`");

include('header.php');
include('navbar.php');

?>

<br><br><br>

<form method="post" action="newschool.php" enctype="multipart/form-data">
                    <div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
       
    ?>
    <table>
    <tr>
        
<td>


<?php echo $row['userid'] ?> <br>
        
<?php echo $row['schoolid'] ?>
        <?php echo $row['status'] ?><br>
        
        
        <?php echo $row['dos'] ?>
       
        <?php echo '<a  text-decoration: none;"  href="approved_subscription.php?id=' . $row['id'] . '">Approve</a>';?>
        <?php echo '<a  text-decoration: none;"  href="reject_subscription.php?id=' . $row['id'] . '">Reject</a>';?>
         <?php echo '<a text-decoration: none;"  href="delete_subscription.php?id=' . $row['id'] . '">Remove Details</a>';?>
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