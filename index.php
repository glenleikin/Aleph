<?php
include "header.php";
include "functions.php";
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = "homepage";
}
loadPage($page);
include "footer.php";
?>

