<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	require "api.php";
	$data = array(
		"enimi" => $_POST['enimi'],
		"pnimi" => $_POST['pnimi'],
		"sugu" => $_POST['sugu'],
		"tel" => $_POST['tel'],
		"epost" => $_POST['epost'],
		"markus" => $_POST['markus'],
		"image" => $_FILES['img']['tmp_name']
	);
	if (isset($_GET["id"])) {
		$data["id"] = $_GET["id"];
		change_singleitem($data);
	}
	else {
		addadvert($data);
	}
	header("Location:http://robert.vkhk.ee/~mihkel.kala/enda/k6ik.php");
	die();
?>

