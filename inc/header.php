<?php
	include_once("lib/Session.php");
	Session::checkUserSession();
	include_once("lib/Database.php");
	include_once("helpers/Format.php");
	$db = new Database();
	$fm = new Format();

header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<?php 
	$bool = isset($_GET['action']) && $_GET['action']=="logoutuser";
	if ($bool) {
		Session::destroy();
		// header("Location: index.php");
		echo("<script>location.href = 'index.php';</script>");
	}
?>
	