<?php
session_start();
 include('db.php');
 $Line=$_GET["Line"];
 $_SESSION["strProductID"][$Line]="";
 $_SESSION["strQty"][$Line]="";
 header("location:show.php");
 ?>