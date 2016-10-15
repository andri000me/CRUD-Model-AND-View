<?php
	include 'config.php';
	include 'models/model_mapel.php';

	use models\_model_mapel\Model_Mapel as Mapel;

	$mapel = new Mapel;

	if ($_GET['id']) {
		$data_mapel = $mapel->SELECT_BY_ID($_GET['id']);
?>
		<h1>Edit Data Mata Pelajaran</h1>
		<a href="mapel.php">Kembali</a>

		<form action="process/proses_edit_mapel.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<table>
				<tr>
					<th>Nama Mapel</th>
					<td> : </td>
					<td> <input type="text" name="mapel" value="<?php echo $data_mapel['mapel']; ?>"> </td>
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