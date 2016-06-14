<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	require "api.php";
	$info = array(
		"enimi" => $_POST['enimi'],
		"pnimi" => $_POST['pnimi'],
		"sugu" => $_POST['sugu'],
		"tel" => $_POST['tel'],
		"epost" => $_POST['epost'],
		"pilt" => $_FILES['img']['tmp_name']
	);
	if (isset($_GET["isik"])) {
		$info["isik"] = $_GET["isik"];
		muuda($info);
	}
	else {
		valmista($info);
	}
	header("Location:http://robert.vkhk.ee/~mihkel.kala/enda/k6ik.php");
	die();
?>

