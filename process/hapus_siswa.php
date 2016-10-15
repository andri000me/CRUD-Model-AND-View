<?php
	include '../config.php';
	include '../models/model_siswa.php';

	use models\_model_siswa\Model_Siswa as Siswa;

	$siswa = new Siswa;

	if (isset($_GET['id'])) {
		//Data
		$id = $_GET['id'];

		$result = $siswa->DELETE($id);

		if ($result) {
			header("location: ../siswa.php");
		}
	}
?>