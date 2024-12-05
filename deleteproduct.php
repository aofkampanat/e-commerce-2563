<?php
include('db.php');
$news = "DELETE FROM product WHERE ProductID = '".$_GET["ProductID"]."' ";
$newq = mysqli_query($newc,$news);
if($newq)
{
    header ("location:reportproduct.php");
}
?>