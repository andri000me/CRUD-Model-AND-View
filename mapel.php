<?php
	include 'config.php';
	include 'models/model_mapel.php';

	use _config\Config as Config;
	use models\_model_mapel\Model_Mapel as Mapel;

	$db = new Config;
	$mapel = new Mapel;

	$data_mapel = $mapel->SELECT_ALL();
	?>

<h1>Data Mata Pelajaran</h1>
<a href="index.php">Home</a> |
<a href="siswa.php">Data Siswa</a> |
<a href="mapel.php">Data Mapel</a> |
<a href="nilai.php">Data Nilai</a>
<br><br>

<a href="tambah_mapel.php">Tambah Data Mata Pelajaran</a>
<table border="1">
	<thead>
		<tr>
			<th>ID Mapel</th>
			<th>Nama Mapel</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($data_mapel as $value) {
		?>
			<tr>
				<td><?php echo $value['id_mapel'] ?></td>
				<td><?php echo $value['mapel'] ?></td>
				<td>
					<a href="edit_mapel.php?id=<?php echo $value['id_mapel'] ?>">Edit</a>
					|
					<a href="process/hapus_mapel.php?id=<?php echo $value['id_mapel'] ?>">Hapus</a>
				</td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>