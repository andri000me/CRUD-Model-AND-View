<?php
	include 'config.php';
	include 'models/model_siswa.php';

	use models\_model_siswa\Model_Siswa as Siswa;

	$siswa = new Siswa;

	if ($_GET['id']) {
		$data_siswa = $siswa->SELECT_BY_ID($_GET['id']);
?>
		<h1>Edit Data Siswa</h1>
		<a href="siswa.php">Kembali</a>

		<form action="process/proses_edit_siswa.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<table>
				<tr>
					<th>Nama Siswa</th>
					<td> : </td>
					<td> <input type="text" name="nama" value="<?php echo $data_siswa['nama']; ?>"> </td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td> : </td>
					<td> <textarea name="alamat" style="resize:none;width:300px;" rows="10"><?php echo $data_siswa['alamat']; ?></textarea> </td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td> : </td>
					<td>
						<input type="radio" name="jk" value="1" id="laki" <?php if($data_siswa['jk'] == 1){echo 'checked="checked"';} ?>>
							<label for="laki">Laki-laki</label>
						<input type="radio" name="jk" value="2" id="perempuan" <?php if($data_siswa['jk'] == 2){echo 'checked="checked"';} ?>> 
							<label for="perempuan">Perempuan</label>
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