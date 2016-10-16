<?php
	include '../config.php';
	include '../models/model_mapel.php';
	include '../models/model_nilai.php';

	use models\_model_mapel\Model_Mapel as Mapel;
	use models\_model_nilai\Model_Nilai as Nilai;

	$mapel = new Mapel;
	$nilai = new Nilai;

	if (isset($_GET['id'])) {
		//Data
		$id = $_GET['id'];

		$nilai->CUSTOM_DELETE("id_mapel", $id);
		$result = $mapel->DELETE($id);

		if ($result) {
			header("location: ../mapel.php");
		}
	}
?>