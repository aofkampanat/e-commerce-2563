<?php
session_start();
 include('db.php');

 $news="INSERT INTO orders(OrderDate,name,address,email,phone,price)
 values('".date("y-m-d h:i:s")."','".$_POST["name"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["price"]."')";
 $newq=mysqli_query($newc,$news);
 $OrderID=mysqli_insert_id($newc);
    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
        {
     if($_SESSION["strProductID"][$i]!="")
     {
        $news="INSERT INTO order_detail(OrderID,ProductID,Qty)
        values('".$OrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."')";
        $newq=mysqli_query($newc,$news);
     }
    }
    header("location:finish_order.php?OrderID=".$OrderID);

    session_destroy();
    ?>