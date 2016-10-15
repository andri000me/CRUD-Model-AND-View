<?php
	include 'config.php';
	include 'models/model_nilai.php';
	include 'models/model_mapel.php';

	use _config\Config as Config;
	use models\_model_nilai\Model_Nilai as Nilai;
	use models\_model_mapel\Model_Mapel as Mapel;

	$db = new Config;
	$nilai = new Nilai;
	$mapel = new Mapel;

	$data_mapel = $mapel->SELECT_ALL();
	?>

<h1>Data Nilai Siswa</h1>
<a href="index.php">Home</a> |
<a href="siswa.php">Data Siswa</a> |
<a href="mapel.php">Data Mapel</a> |
<a href="nilai.php">Data Nilai</a>
<br><br>


<?php
foreach ($data_mapel as $value) {
	$data_nilai = $nilai->SELECT_ALL_BY_Mapel($value['id_mapel']);
?>
	<table border="1" style="display:inline-block; vertical-align:top;">
		<thead>
			<tr>
				<th colspan="3"><?php echo $value['mapel'] ?></th>
			</tr>
			<tr>
				<th>Nama Siswa</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($data_nilai as $key => $value) {
				?>
				<tr>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['nilai'] ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
<?php
}
?>
