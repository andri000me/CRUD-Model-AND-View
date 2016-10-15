<?php
	include '../config.php';
	include '../models/model_mapel.php';

	use models\_model_mapel\Model_Mapel as Mapel;

	$mapel = new Mapel;

	if (isset($_GET['id'])) {
		//Data
		$id = $_GET['id'];

		$result = $mapel->DELETE($id);

		if ($result) {
			header("location: ../mapel.php");
		}
	}
?>