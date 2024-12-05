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
    $news= "SELECT*FROM product WHERE ProductID = '".$_GET["ProductID"]."' ";
    $newq = mysqli_query($newc,$news);
    $newr= mysqli_fetch_array($newq);
    ?>
    <form action="save_editproduct.php?ProductID=<?php echo $newr["ProductID"];?>" method="post" enctype="multipart/form-data">
    <div class="container">
    <div class="form-group">
    <label for=""><font color="000000">ชื่อสินค้า</label>
    <input type="text"  class="form-control"  name="p_name" value="<?php echo $newr["p_name"]; ?>" >
    </div>
    <div class="form-group">
    <label for=""><font color="000000">รายละเอียดสินค้า</label>
    <input type="text"  class="form-control" name="p_detail" value="<?php echo $newr["p_detail"]; ?>">
    </div>
    <div class="form-group">
    <label for=""><font color="000000">ราคาสินค้า</label>
    <input type="text"  class="form-control" name="p_price"  value="<?php echo $newr["p_price"]; ?>">
    </div>

    <div class="form-group">
    <label for=""><font color="000000">จำนวนสินค้า</label>
    <input type="text"  class="form-control" name="p_item"  value="<?php echo $newr["p_item"]; ?>" >
    </div>
    <div class="form-group">
    <label for=""><font color="000000">รูปสินค้า</label><p></p>
    <img src="img/<?php echo $newr["p_img"];?>" width="150" alt=""><p></p>
    <input type="file" name="p_img" id="">
    </div>
    <input type="submit" value="เพิ่มสินค้า" class="btn btn-success">  <input type="reset" value="ยกเลิก" class="btn btn-danger">
    </div>
    </form>
    </tr>
    </table>
    </td>
  </tr>
  <tr>
    <th height="130" colspan="4" bgcolor="#333333" scope="row">&nbsp;</th>
  </tr>
</table>
</body>
</html>