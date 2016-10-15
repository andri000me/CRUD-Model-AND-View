<?php
	include 'config.php';
	include 'models/model_siswa.php';
	include 'models/model_mapel.php';

	use models\_model_siswa\Model_Siswa as Siswa;
	use models\_model_mapel\Model_Mapel as Mapel;
	
	$siswa = new Siswa;
	$mapel = new Mapel;

	$data_siswa = $siswa->SELECT_ALL();
	$data_mapel = $mapel->SELECT_ALL();
?>
<h1>Tambah Data Nilai</h1>
<a href="nilai.php">Kembali</a>

<form action="process/proses_tambah_nilai.php" method="POST">
	<table>
		<tr>
			<th>Nama Siswa</th>
			<td> : </td>
			<td>
				<select name="id_siswa">
					<?php
					foreach ($data_siswa as $value) {
						?>
						<option value="<?php echo $value['id_siswa']; ?>"><?php echo $value['nama']; ?></option>
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
						<option value="<?php echo $value['id_mapel']; ?>"><?php echo $value['mapel']; ?></option>
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
				<input type="number" name="nilai">
			</td>
		</tr>
		<tr>
			<th></th>
			<td></td>
			<td> <input type="submit" name="submit" value="Tambah"> </td>
		</tr>
	</table>
</form>