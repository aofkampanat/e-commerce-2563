<?php
ob_start();
session_start();

if(!isset($_SESSION["intLine"]))
{
    if(isset($_POST["txtProductID"]))
    {
        $_SESSION["intLine"]=0;
        $_SESSION["strProductID"][0]=$_POST["txtProductID"];
        $_SESSION["strQty"][0]=$_POST["txtQty"];

        header("location:show.php");
    }
}
else
{
    $key=array_search($_POST["txtProductID"],$_SESSION["strProductID"]);
    if((string)$key!="")
    {
        $_SESSION["strQty"][$key]=$_SESSION["strQty"][$key]+$_POST["txtQty"];
    }
    else
    {
        $_SESSION["intLine"]= $_SESSION["intLine"]+1;
        $NewintLine=$_SESSION["intLine"];
        $_SESSION["strProductID"][$NewintLine]=$_POST["txtProductID"];
        $_SESSION["strQty"][$NewintLine]=$_POST["txtQty"];
    }
    header("location:show.php");
}
?>