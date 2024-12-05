<?php
include('db.php');
$news = "UPDATE orders SET status = '".trim($_POST["status"])."'
 WHERE OrderID = '".$_GET["OrderID"]."' ";
$newq = mysqli_query($newc,$news);
if($newq)
{
    echo "<script type='text/javascript'>";
    echo "alert('เปลี่ยนสถานะสำเร็จ');";
    echo "window.location='reportsell.php'";
    echo "</script>";
}
?>