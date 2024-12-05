<?php
include('db.php');
$news = "DELETE FROM product_type WHERE t_id = '".$_GET["t_id"]."' ";
$newq = mysqli_query($newc,$news);
if($newq)
{
    header ("location:reporttype.php");
}
?>