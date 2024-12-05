<?php
session_start();
if($_SESSION["status"]=!"admin")
{
    echo "เข้าสู่ระบบด้วยแอดมิน";
    exit();
}
elseif($_SESSION["ID"]=="")
{
    echo "เข้าสู่ระบบก่อน";
    exit();
}
include('db.php');
$news= "SELECT *FROM member WHERE ID = '".$_SESSION["ID"]."' ";
$newq = mysqli_query($newc,$news);
$newr = mysqli_fetch_array($newq);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
    body,td,th {
	color: #FFFFFF;
}
    </style>
    <title>Document</title>
</head>
<body>
<?php 
$keyword = null;
if(isset($_POST["keyword"]))
{
  $keyword = $_POST["keyword"];
}
?>
<body>
<table width="100%" border="0" >
<?php
  include('header.php');
  ?>
  <?php
  include('menu.php');
  ?>
    </table></th>
    
    <td colspan="3"valign="top">
    <table class=" table table-bordered" width="100%" >
    <p></p>
    <center><h4><font color="000000"> เพิ่มสินค้า</font></h4></center>
    <p></p>
    <?php
    include('db.php');
    $news= "SELECT*FROM product_type ";
    $newq = mysqli_query($newc,$news);
    ?>
    <form action="save_addproduct.php" method="post" enctype="multipart/form-data">
    <div class="container">
    <div class="form-group">
    <label for=""><font color="000000">ชื่อสินค้า</label>
    <input type="text"  class="form-control"  name="p_name" placeholder="ชื่อสินค้า"id="" >
    </div>
    <div class="form-group">
    <label for=""><font color="000000">รายละเอียดสินค้า</label>
    <input type="text"  class="form-control" name="p_detail"  placeholder="รายละเอียดสินค้า"id="" >
    </div>
    <div class="form-group">
    <label for=""><font color="000000">ราคาสินค้า</label>
    <input type="text"  class="form-control" name="p_price"  placeholder="ราคาสินค้า"id="" >
    </div>

    <div class="form-group">
    <label for=""><font color="000000">จำนวนสินค้า</label>
    <input type="text"  class="form-control" name="p_item"  placeholder="จำนวนสินค้า"id="" >
    </div>
    <div class="form-group">
    <label for="">ประเภทสินค้า</label>
    <select name="c_id">
    <?php 
while ($newr = mysqli_fetch_array($newq))
{

    ?>
      <option value="<?php echo $newr["t_id"]; ?>"><?php echo $newr["t_name"]; ?></font></option>  
<?php
    }
    ?>
      </select>
    </div>
    <p>
      <label>
        <input type="checkbox" name="new_id" value="1" id="CheckboxGroup1_0">
        สินค้าใหม่</label>
      <br>
      <label>
        <input type="checkbox" name="sale_id" value="1" id="CheckboxGroup1_1">
        สินค้าขายดี</label>
      <br>
    </p>
    <div class="form-group">
    <label for=""><font color="000000">รูปสินค้า</label><p></p>
    <input type="file" name="p_img" id="">
    </div>
    <input type="submit" value="เพิ่มสินค้า" class="btn btn-success">  <input type="reset" value="ยกเลิก" class="btn btn-danger">
    </div>
    </form>
    </tr>
    </table>
    </td>
  </tr>
 
</table>
</body>
</html>