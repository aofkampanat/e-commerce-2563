<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.css">
<title>Untitled Document</title>
</head>

<body>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="39" colspan="3">ชื่อร้าน อินเสริท ไอที </td>
  </tr>
  <tr>
  <?php include('db.php');
    $news="SELECT * FROM orders where OrderID='".$_GET["OrderID"]."'";
    $newq=mysqli_query($newc,$news);
    $newr=mysqli_fetch_array($newq);
    ?>
    <td width="253" height="37">รหัสการสั่งซื้อ : <?php echo $newr["OrderID"];?> </td>
    <td width="518">ชื่อผู้สั่งซื้อ : <?php echo $newr["name"];?></td>
    <td width="245">เวลาการสั่งซื้อ :<?php echo $newr["OrderDate"];?></td>
  </tr>
  <tr>
    <td height="221" colspan="3"align="center">
     <table width="800"class="table bordered">
    <tr>
    <td>รหัสสินค้า</td>
    <td>ภาพสินค้า</td>
    <td>ชื่อสินค้า</td>
    <td>ราคาสินค้า</td>
    <td>จำนวน</td>
    <td>ราคารวม</td>
    </tr>
    <?php 
    @ini_set('display_errors','0');
    $total=0;
    $sumtotal=0;
    $vat=0;
    $sumvat=0;
    $a=0;
    $sum=0;
    include('db.php');
    $news2="SELECT * FROM order_detail where OrderID='".$_GET["OrderID"]."'";
    $newq2=mysqli_query($newc,$news2);

    while($newr2=mysqli_fetch_array($newq2))
            {   
                $news3="SELECT * FROM product where ProductID='".$newr2["ProductID"]."'";
             $newq3=mysqli_query($newc,$news3);  
             $newr3=mysqli_fetch_array($newq3);
             $total=$newr2["Qty"]*$newr3["p_price"];
             $sumtotal=$total+$sumtotal;
             $vat=$sumtotal*0.07;
             $sumvat=$sumtotal+$vat;
             $a=300;
             $sum=$sumvat+$a;
             ?>
         <tr>
    <td><?php echo $newr2["ProductID"];?></td>
    <td><img src="img/<?php echo $newr3["p_img"];?>" width="80" height="80" alt=""></td>
    <td><?php echo $newr3["p_name"];?></td>
    <td><?php echo number_format($newr3["p_price"]);?></td>
    <td><?php echo $newr2["Qty"];?></td>
    <td><?php echo number_format($total);?></td>
    </tr>
             <?php
            }
    ?>
     </table>
     <div align="right">
    ราคารวม <?php echo number_format($sumtotal);?> บาท<br>
    ภาษี7% <?php echo number_format($vat);?> บาท<br>
    ค่าขนส่ง <?php echo number_format($sumtotal);?> บาท<br>
     <font color="f001"><h6>ราคารวม <?php echo number_format($sum);?> บาท</h6></font><br>
    </div>
    </td>
  </tr>
</table>
<body onload="window.print();">
</body>
</html>