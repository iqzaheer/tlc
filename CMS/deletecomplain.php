<?php

require_once("config.php");



$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


$id =  $_GET['id'];

$sql = "delete from complains where id = '$id' ";
$res = mysqli_query($con, $sql);

if($res){
	header("location:complainlist.php?msg='Deleted successfully'");
}

?>