<?php
	include 'config.php';
	include 'models/model_siswa.php';
	include 'models/model_mapel.php';
	include 'models/model_nilai.php';

	use models\_model_siswa\Model_Siswa as Siswa;
	use models\_model_mapel\Model_Mapel as Mapel;
	use models\_model_nilai\Model_Nilai as Nilai;
	
	$siswa = new Siswa;
	$mapel = new Mapel;
	$nilai = new Nilai;

	if ($_GET['id']) {
		$data_nilai = $nilai->SELECT_BY_ID($_GET['id']);
		$data_siswa = $siswa->SELECT_ALL();
		$data_mapel = $mapel->SELECT_ALL();
?>
		<h1>Edit Data Siswa</h1>
		<a href="nilai.php">Kembali</a>

		<form action="process/proses_edit_nilai.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<table>
				<tr>
					<th>Nama Siswa</th>
					<td> : </td>
					<td>
						<select name="id_siswa">
							<?php
							foreach ($data_siswa as $value) {
								?>
								<option value="<?php echo $value['id_siswa']; ?>" <?php if($value['id_siswa'] == $data_nilai['id_siswa']){echo 'selected="selected"';} ?>><?php echo $value['nama']; ?></option>
								<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Mapel</th>
					<td> : </td>
					<td>
						<select name="id_mapel">
							<?php
							foreach ($data_mapel as $value) {
								?>
								<option value="<?php echo $value['id_mapel']; ?>" <?php if($value['id_mapel'] == $data_nilai['id_mapel']){echo 'selected="selected"';} ?>><?php echo $value['mapel']; ?></option>
								<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Nilai</th>
					<td> : </td>
					<td>
						<input type="number" name="nilai" value="<?php echo $data_nilai['nilai']; ?>">
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<td> <input type="submit" name="submit" value="Edit"> </td>
				</tr>
			</table>
		</form>
<?php
	}
?>