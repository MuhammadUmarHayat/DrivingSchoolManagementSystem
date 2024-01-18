
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result = $con->query("SELECT * FROM `drivingschools`");

include('header.php');
include('navbar.php');

?>

<br><br><br>
<a  href="newschool.php">New School </a>
<form method="post" action="newschool.php" enctype="multipart/form-data">
                    <div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
        //`cars`( `name`, `model`, `capacity`, `color`, `rent_amount`, `description`,
// `photo`, `dom`, `owner`, `status`)
    ?>
    <table>
    <tr>
        <td>
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['photo']); ?>"width=300px; height=150px; />
    </td>
<td>


<?php echo $row['name'] ?> <br>
        
<?php echo $row['principal'] ?>
        <?php echo $row['description'] ?><br>
        
        <?php echo $row['address'] ?> <br>
        <?php echo $row['contactno'] ?><br>
        <?php echo $row['dom'] ?>
       
        <?php echo '<a  text-decoration: none;"  href="edit_school.php?id=' . $row['id'] . '">Edit Details</a>';?>
         <?php echo '<a text-decoration: none;"  href="delete_school.php?id=' . $row['id'] . '">Remove Details</a>';?>
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