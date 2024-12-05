<?php
 $keyword = null;
 if(isset($_POST["keyword"]))
 {
   $keyword = $_POST["keyword"];
 }
?>
<style type="text/css">
h1 a {
	color: #FFF;
	text-decoration: none;
	list-style-type: none;
}
</style>
<div id="h1">
<tr align="center" >
    <th width="15%" height="68" align="center" valign="middle"  bgcolor="#039" scope="col">ส่วนของแอดมิน</th>
    <th width="50%" align="right"  bgcolor="#039" scope="col"><form action="" method="post"> <input type="search" name="keyword" id=""> <input type="submit" value="ค้นหา" class="btn btn-info btn-sm"></form></th>
    <th width="20%" align="right"  bgcolor="#039" scope="col">ยินดีต้อนรับคุณ : <a href="edituser.php?ID=<?php echo $newr["ID"];?>"><?php echo $newr["name"];?></a></th>
    <th width="9%" align="right"  bgcolor="#039" scope="col"><a href="logout.php">ออกจากระบบ</a></th>
  </tr>
</div>