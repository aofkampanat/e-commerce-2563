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
    <?php
include('db.php');
$news = "SELECT *FROM orders WHERE OrderID = '".$_GET["OrderID"]."' ";
$newq = mysqli_query($newc,$news);
$newr = mysqli_fetch_array($newq);
?>
    <form action="save_editbye.php?OrderID=<?php echo $newr["OrderID"];?>" method="post" enctype="multipart/form-data">
    <div class="container">
    <div class="form-group col-7">
    <label for="">คำสั่งซื้อที่</label>
    <input type="text"  class="form-control" value="<?php echo $newr["OrderID"];?>"  disabled>
    </div>
    <div class="form-group col-7">
    <label for="">ชื่อผู้สั่ง</label>
    <input type="text"  class="form-control" value="<?php echo $newr["name"];?>"  disabled>
    </div>
    <div class="form-group col-7">
    <label for="">ราคา</label>
    <input type="text"  class="form-control" value="<?php echo $newr["price"];?>"  disabled>
    </div>
    <div class="form-group col-7">
    <label for="">ธนาคาร</label>
    <select name="bank" required>
      <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
      <option value="ธนาคารกสิกร">ธนาคารกสิกร</option>    
      </select>
    </div>
    <input type="hidden" name="status" value="กำลังตรวจสอบ">
    <div class="form-group col-7">
    <label for="">สลิป</label>
    <input type="file" name="slip" id="" required>
    </div>
    <input type="submit" value="ชำระเงิน" class="btn btn-success">  <input type="reset" value="ยกเลิก" class="btn btn-danger">
    </div>
    </form>
    
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>