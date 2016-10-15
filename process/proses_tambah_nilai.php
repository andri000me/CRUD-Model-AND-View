<?php
	include '../config.php';
	include '../models/model_nilai.php';

	use models\_model_nilai\Model_Nilai as Nilai;

	$nilai = new Nilai;

	if (isset($_POST['submit'])) {
		//Data
		$data['nilai'] = $_POST['nilai'];
		$data['id_mapel'] = $_POST['id_mapel'];
		$data['id_siswa'] = $_POST['id_siswa'];

		$result = $nilai->INSERT($data);
		if ($result) {
			header("location: ../nilai.php");
		}
	}
?>