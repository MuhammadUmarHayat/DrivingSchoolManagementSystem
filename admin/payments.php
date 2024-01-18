
<?php 
include '../config.php';
$username=  $_SESSION['username'];
$message="";
// Get image data from database 
$result = $con->query("SELECT * FROM `payments`");

include('header.php');
include('navbar.php');

?>

<br><br><br>
  

<form method="post" action="payments.php" >
                    <div class="center">
                    <?php  if ($result && $result->num_rows > 0) 
  {
     while ($row = $result->fetch_assoc())
    {
      
    ?>
    <table>
    <tr>
        <td>
       <h3> <?php echo $row['userid'] ?> </h3>
    </td>
<td>


<?php echo $row['schoolid'] ?> <br>
        
<?php echo $row['packageid'] ?><br>
        <?php echo $row['amount'] ?><br>
        <?php echo $row['dop'] ?><br>
        
        
       
       
        
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