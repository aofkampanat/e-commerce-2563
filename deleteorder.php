<?php
include('db.php');
$news = "DELETE FROM orders WHERE OrderID = '".$_GET["OrderID"]."' ";
$newq = mysqli_query($newc,$news);
if($newq)
{
    header ("location:reportsell.php");
}
?>