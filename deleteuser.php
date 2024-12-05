<?php
include('db.php');
$news = "DELETE FROM member WHERE ID = '".$_GET["ID"]."' ";
$newq = mysqli_query($newc,$news);
if($newq)
{
    header ("location:indexadmin.php");
}
?>