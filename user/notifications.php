
<?php
include '../config.php';
echo $username=  $_SESSION['username'];


$query="SELECT tr.`id` AS request_id, tr.`schoolid`, tr.`userid`, tr.`pakageid`, tr.`reqDate`, tr.`status` AS request_status,
ds.`id`, ds.`name` AS school_name, ds.`address`, ds.`contactno`, ds.`principal`, ds.`description` AS school_description, ds.`dom` AS school_dom, ds.`status` AS school_status, ds.`photo` AS school_photo,
p.`id` AS package_id, p.`title` AS package_title, p.`description` AS package_description, p.`price`, p.`duration`, p.`startingDate`, p.`endingDate`, p.`status` AS package_status, p.`photo` AS package_photo
FROM `training_requests` tr
JOIN `drivingschools` ds ON tr.`schoolid` = ds.`id`
JOIN `packages` p ON tr.`pakageid` = p.`id` where tr.userid='$username'";
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
   ?>
    
   <?php
    while ($row = $result->fetch_assoc())
    {
        
    ?>
    
   
    <div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="text-dark"><?php echo $row['school_name'] ?></h3>
                <h4></h4>
                <p class="card-text">
                <p class="text-primary">  <?php echo $row['package_title'] ?><br></p>
                    <?php echo $row['package_description'] ?><br>
                    <?php echo $row['startingDate'] ?><br>
                    <?php echo $row['endingDate'] ?><br>
                 <p class="text-danger">   <?php echo $row['request_status'] ?><br></p>
                </p>
            </div>
        </div>
    </div>
    
</div>

   

<?php
      }
    }
                        ?>
                         </div>
    
  
</div>
</form>

    
</body>
</html>