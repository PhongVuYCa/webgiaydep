<?php
session_start();
if(isset($_SESSION["username"])!= null)
{
    unset($_SESSION["username"]);
    header("location:index.php");
}
?>