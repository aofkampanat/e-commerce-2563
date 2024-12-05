<?php
session_start();
 include('db.php');
 $OrderID=$_GET["OrderID"];
 echo "<script type='text/javascript'>";
 echo "alert('สั่งซื้อสินค้าสำเร็จ');";
 echo "window.location='view_order.php?OrderID=$OrderID'";
 echo "</script>";
 ?>