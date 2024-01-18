
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result = $con->query("SELECT * FROM `packages`");

include('header.php');
include('navbar.php');

?>

<br><br><br>
  


                        





<a  href="newpackage.php">New Package </a>
<form method="post" action="packages.php" enctype="multipart/form-data">
                    <div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
    //`packages`( `schoolid`, `title`, `description`, `price`, `duration`,`startingDate`, `endingDate`, `status`, `photo`
     while ($row = $result->fetch_assoc())
    {
        
    ?>
    <table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>


<?php echo $row['title'] ?> <br>
        
<?php echo $row['duration'] ?>
        <?php echo $row['description'] ?><br>
        
        <?php echo $row['price'] ?> <br>
        <?php echo $row['startingDate'] ?><br>
        <?php echo $row['endingDate'] ?>
       
        <?php echo '<a  text-decoration: none;"  href="edit_package.php?id=' . $row['id'] . '">Edit Details</a>';?>
         <?php echo '<a text-decoration: none;"  href="delete_package.php?id=' . $row['id'] . '">Remove Details</a>';?>
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