<?php
include "header.php";
include "../functions.php";
if(isset($_GET['page'])){
	$page = $_GET['page']; 
}else{
	$page = "panel";
}
loadPage($page);
?>
