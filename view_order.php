<?php include('navbar.php');?>
<style>
.productall{
  width:900px;
}
.productitem{
  width:300px;
  float:left;
}
</style>
<body>
<table width="1024" border="0"  valing="top"align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s9.jpg" alt="">
    <div class="container">
    <?php include('db.php');
    $news="SELECT * FROM orders where OrderID='".$_GET["OrderID"]."'";
    $newq=mysqli_query($newc,$news);
    $newr=mysqli_fetch_array($newq);
    ?>
    <br>
    <div align="left">
    <div class="form-group col-7">
    <label for="">ชื่อผู้สั่งซื้อ</label> 
    <?php echo  $newr["name"];?> 
    </div>
    <div class="form-group col-7">
    <label for="">ที่อยู่</label>
    <?php echo  $newr["address"];?> 
    </div>
    <div class="form-group col-7">
    <label for="">อีเมลล์</label>
    <?php echo  $newr["email"];?> 
    </div>
    <div class="form-group col-7 ">
    <label for="">เบอร์โทร</label>
    <?php echo  $newr["phone"];?> 
    </div>
    </div>
    <br>
    <br>
    </div>
    </td>
  </tr>
</table>
<table width="1024" border="0"  valing="top"align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s10.jpg" alt="">
    <div class="container">
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
     <a href="index.php"class="btn btn-success">กลับหน้าแรก</a> | <a target="_blank" href="print.php?OrderID=<?php echo $newr["OrderID"];?>"class="btn btn-primary">พิมพ์ใบเสร็จ</a>
    </div>
    </td>
  </tr>

<?php include('footer.php');?>
</body>
</html>