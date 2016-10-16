<?php
	include 'config.php';
	include 'models/model_nilai.php';
	include 'models/model_siswa.php';
	include 'models/model_mapel.php';

	use models\_model_nilai\Model_Nilai as Nilai;
	use models\_model_siswa\Model_Siswa as Siswa;
	use models\_model_mapel\Model_Mapel as Mapel;

	$nilai = new Nilai;
	$siswa = new Siswa;
	$mapel = new Mapel;

	if (isset($_GET['search']) AND $_GET['search'] != "") {
		$data_nilai = $nilai->LIKE($_GET['search']);
	} else {
		$data_nilai = $nilai->SELECT_ALL();
	}
?>

<h1>Data Nilai</h1>
<a href="index.php">Home</a> |
<a href="siswa.php">Data Siswa</a> |
<a href="mapel.php">Data Mapel</a> |
<a href="nilai.php">Data Nilai</a>
<br><br>

<a href="tambah_nilai.php">Tambah Data Nilai</a>
<form action="nilai.php" method="GET">
	Search : <input type="text" name="search">
	<input type="submit" value="Cari">
</form>
<table border="1">
	<thead>
		<tr>
			<th>Nama Siswa</th>
			<th>Mata Pelajaran</th>
			<th>Nilai</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($data_nilai as $value) {
		?>
			<tr>
				<td><?php echo $value['nama'] ?></td>
				<td><?php echo $value['mapel'] ?></td>
				<td><?php echo $value['nilai'] ?></td>
				<td>
					<a href="edit_nilai.php?id=<?php echo $value['id_nilai'] ?>">Edit</a>
					|
					<a href="process/hapus_nilai.php?id=<?php echo $value['id_nilai'] ?>" onclick="return confirm('Yakin akan menghapus data ini ?')">Hapus</a>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>