<?php
	include '../config.php';
	include '../models/model_mapel.php';

	use models\_model_mapel\Model_Mapel as Mapel;

	$mapel = new Mapel;

	if (isset($_POST['submit'])) {
		//Data
		$data['mapel'] = $_POST['mapel'];

		$result = $mapel->INSERT($data);
		if ($result) {
			header("location: ../mapel.php");
		}
	}
?>