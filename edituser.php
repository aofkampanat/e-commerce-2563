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
    <center><h4><font color="000000"> แก้ไขข้อมูลสมาชิก</font></h4></center>
    <p></p>
    <?php
    include('db.php');
    $news= "SELECT*FROM member WHERE ID  = '".$_GET["ID"]."' ";
    $newq = mysqli_query($newc,$news);
    $newr=mysqli_fetch_array($newq);
    ?>
    <form action="save_edituser.php?ID=<?php echo $newr["ID"]; ?>" method="post">
    <div class="container">
    <div class="form-group">
    <label for=""><font color="000000">Username</label>
    <input type="text"  class="form-control"  value="<?php echo $newr["username"]; ?>"id="" disabled>
    </div>
    <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control" value="<?php echo $newr["password"]; ?>" required>
    </div>
    <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $newr["name"]; ?>"id="" required>
    </div>
    <div class="form-group">
    <label for="">Address</label>
   <textarea name="address" id=""class="form-control" cols="30" rows="10" required>
   <?php echo $newr["address"]; ?></textarea>
    </div>
    <div class="form-group">
    <label for="">E-mail</label>
    <input type="email" name="email" class="form-control" value="<?php echo $newr["email"]; ?>"id="" required>
    </div>
    <div class="form-group">
    <label for="">Phone</label>
    <input type="text" name="phone" class="form-control" value="<?php echo $newr["phone"]; ?>"id=""  required>
    </div>
    <div class="form-group">
    <label for="">Status</label>
    <select name="status">
      <option value="<?php echo $newr["status"]; ?>"><?php echo $newr["status"]; ?></font></option>
      <option value="user">USER</option>
      <option value="admin">ADMIN</option>    
      </select>
    </div>

    <input type="submit" value="แก้ไขข้อมูล" class="btn btn-success">  <input type="reset" value="ยกเลิก" class="btn btn-danger">
    </div>
    </form>
    </tr>
    </table>
    </td>
  </tr>
 
</table>
</body>
</html>