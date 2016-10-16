<?php
	include 'config.php';
	include 'models/model_siswa.php';

	use models\_model_siswa\Model_Siswa as Siswa;
	$siswa = new Siswa;

	if (isset($_GET['search'])) {
		$data_siswa = $siswa->LIKE($_GET['search']);
	} else {
		$data_siswa = $siswa->SELECT_ALL();
	}
?>

<h1>Data Siswa</h1>
<a href="index.php">Home</a> |
<a href="siswa.php">Data Siswa</a> |
<a href="mapel.php">Data Mapel</a> |
<a href="nilai.php">Data Nilai</a>
<br><br>

<a href="tambah_siswa.php">Tambah Data Siswa</a>
<form action="siswa.php" method="GET">
	Search : <input type="text" name="search">
	<input type="submit" value="Cari">
</form>
<table border="1">
	<thead>
		<tr>
			<th>ID Siswa</th>
			<th>Nama Siswa</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($data_siswa as $value) {
		?>
			<tr>
				<td><?php echo $value['id_siswa'] ?></td>
				<td><?php echo $value['nama'] ?></td>
				<td><?php echo $value['alamat'] ?></td>
				<td>
					<?php
						if ($value['jk'] == 1) {
							echo "Laki-laki";
						} else {
							echo "Perempuan";
						}
					?>		
				</td>
				<td>
					<a href="edit_siswa.php?id=<?php echo $value['id_siswa'] ?>">Edit</a>
					|
					<a href="process/hapus_siswa.php?id=<?php echo $value['id_siswa'] ?>" onclick="return confirm('Yakin akan menghapus data ini ?')">Hapus</a>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>