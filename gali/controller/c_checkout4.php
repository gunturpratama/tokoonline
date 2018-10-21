<?php
require_once "model/m_checkout4.php";
require_once "controller/c_validasi.php";

if (isset($_POST['submit_checkout4'])) {
	$url = "myorder.php?";
	session_start();
	unset($_SESSION['pesanan_id']);
	header("location:".$url."notice=307");
}


?>