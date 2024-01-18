
<?php
include '../config.php';
$id= $_GET['id'];
$query="SELECT ds.*, p.* FROM drivingschools ds JOIN packages p ON ds.id = p.schoolid WHERE p.id = '$id'";
$result = $con->query($query);

?>
<?php
include('header.php');
include('navbar.php');
?>
<br><br><br>
<form method="post" action="view_Details.php">
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
<h3><?php echo $row['name'] ?> </h3>
<h4><?php echo $row['title'] ?> </h4>
        
<?php echo $row['duration'] ?>
        <?php echo $row['description'] ?>
        
        <?php echo $row['price'] ?> <br>
        <?php echo $row['startingDate'] ?> To
        <?php echo $row['endingDate'] ?><br>
        <?php echo $row['address'] ?> <br>
        <?php echo $row['contactno'] ?><br>
        
         </td>   
         <td> 
        
         <?php echo '<a text-decoration: none;"  href="send_Application.php?id=' . $row['id'] . '">Submit Application</a>';?>
    </td>
<?php
      }
    }
                        ?>
</td>
</tr>
</table>
                    </div>
</div>
</form>

    
</body>
</html>