<?php
	include '../config.php';
	include '../models/model_siswa.php';
	include '../models/model_nilai.php';

	use models\_model_siswa\Model_Siswa as Siswa;
	use models\_model_nilai\Model_Nilai as Nilai;

	$siswa = new Siswa;
	$nilai = new Nilai;

	if (isset($_GET['id'])) {
		//Data
		$id = $_GET['id'];

		$nilai->CUSTOM_DELETE("id_siswa", $id);
		$result = $siswa->DELETE($id);

		if ($result) {
			header("location: ../siswa.php");
		}
	}
?>