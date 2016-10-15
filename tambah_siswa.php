<h1>Tambah Data Siswa</h1>
<a href="siswa.php">Kembali</a>

<form action="process/proses_tambah_siswa.php" method="POST">
	<table>
		<tr>
			<th>Nama Siswa</th>
			<td> : </td>
			<td> <input type="text" name="nama"> </td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td> : </td>
			<td> <textarea name="alamat" style="resize:none;width:300px;" rows="10"></textarea> </td>
		</tr>
		<tr>
			<th>Jenis Kelamin</th>
			<td> : </td>
			<td>
				<input type="radio" name="jk" value="1" id="laki">
					<label for="laki">Laki-laki</label>
				<input type="radio" name="jk" value="2" id="perempuan"> 
					<label for="perempuan">Perempuan</label>
			</td>
		</tr>
		<tr>
			<th></th>
			<td></td>
			<td> <input type="submit" name="submit" value="Tambah"> </td>
		</tr>
	</table>
</form>