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
<table width="1024" border="0" height="300" valing="top"align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">
    <img src="img/s11.jpg" alt="">
    <form action="update.php"method="post">
    <table width="800"class="table bordered">
    <?php
    include('db.php');
    $news= "SELECT*FROM orders  WHERE ID = '".$_GET["ID"]."' ";
    $newq = mysqli_query($newc,$news);
    ?>
    <tr>
    <td><font color="000000">รหัสการสั่งซื้อ</font></td>
    <td><font color="000000">ชื่อ</font></td>
    <td><font color="000000">จำนวนเงิน</font></td>
    <td><font color="000000">สภานะ</font></td>
    <td><font color="000000">แจ้งชำระเงิน</font></td>
    <td><font color="000000">รายการสั่งซื้อ</font></td>
    </tr>
    <?php 
    while ($newr=mysqli_fetch_array($newq))
    {
    ?>
    <tr>
    <td><font color="000000"><?php echo $newr["OrderID"];?></font></td>
    <td><font color="000000"><?php echo $newr["name"];?></font></td>
    <td><font color="000000"><?php echo $newr["price"];?></font></td>
    <td>
         <font color="f001"><?php echo $newr["status"];?></font>
   
    </td>
    <td><font color="000000">
    <?php 
    if($newr["status"]=='รอชำระเงิน')
    {
        ?>
        <a href="playment.php?OrderID=<?php echo $newr["OrderID"];?>"class="btn btn-info">แจ้งชำระเงิน</a>
        <?php
    }
    else
    {
        ?>
        แจ้งชำระเงินแล้ว
        <?php
    }
    ?> 
    </font>
    <td><font color="000000"><a target="_blank" href="view_order.php?OrderID=<?php echo $newr["OrderID"];?>"class="btn btn-success">คลิก</a></font></td>
    </td>
    <?php
    }
    ?>
    </tr>
    </table>
    
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>