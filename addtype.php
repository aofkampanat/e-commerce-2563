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
    <center><h4><font color="000000"> เพิ่มประเภทสินค้า</font></h4></center>
    <p></p>
    <form action="save_addtype.php" method="post" enctype="multipart/form-data">
    <div class="container">
    <div class="form-group">
    <label for=""><font color="000000">ประเภทสินค้า</label>
    <input type="text"  class="form-control"  name="t_name" placeholder="ประเภทสินค้า"id="" >
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