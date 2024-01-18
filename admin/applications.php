
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result = $con->query("Select p.*,tr.* FROM `training_requests` tr JOIN packages p ON tr.pakageid = p.id");
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
     //id,title,description,price,duration,userid,reqDate,status
  
    ?>
    <table>
    <tr>
        
<td>


<?php echo $row['title'] ?> <br>
        
<?php echo $row['description'] ?>
        <?php echo $row['duration'] ?><br>
        
        
        <?php echo $row['price'] ?>
        <?php echo $row['userid'] ?><br>
        <?php echo $row['reqDate'] ?><br>
        <?php echo $row['status'] ?><br>
       
        <?php echo '<a  text-decoration: none;"  href="approved_application.php?id=' . $row['id'] . '">Approve</a>';?>
        <?php echo '<a  text-decoration: none;"  href="reject_application.php?id=' . $row['id'] . '">Reject</a>';?>
        
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