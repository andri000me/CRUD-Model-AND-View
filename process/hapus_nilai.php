<?php
	include '../config.php';
	include '../models/model_nilai.php';

	use models\_model_nilai\Model_Nilai as Nilai;

	$nilai = new Nilai;

	if (isset($_GET['id'])) {
		//Data
		$id = $_GET['id'];

		$result = $nilai->DELETE($id);

		if ($result) {
			header("location: ../nilai.php");
		}
	}
?>