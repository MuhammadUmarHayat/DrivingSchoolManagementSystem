<?php

session_start();
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'driving_schooldb');
if(mysqli_connect_error())
{
    die("DB Connection Failed");
}

?>