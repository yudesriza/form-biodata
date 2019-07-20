<?php
	$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
	switch ($aksi) {
		case 'list' :
?>
			<h1><u>Biodata</u></h1>
			<br><a class="btn btn-primary" role="button" href="index.php?aksi=input">Tambah Data</a>
			
			<div class="table-responsive">
				<br>
				<table class="table table-hover">
					<tr>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>No. HP</th>
						<th>Alamat</th>
						<th>Pendidikan Terakhir</th>
						<th>Agama</th>
						<th>Hobi</th>
						<th>Aksi</th>
					</tr>

					<?php
						include 'koneksi.php';

						$tampil = $mysqli->query("SELECT biodata.id, biodata.full_name, cities.name, biodata.date_of_birth, biodata.phone_number, biodata.address, biodata.last_education, biodata.religion, biodata.hobby FROM biodata INNER JOIN cities ON biodata.place_of_birth_id=cities.id");

						$no=1;
						while($data = $tampil->fetch_assoc()){
					?>

							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['full_name']; ?></td>
								<td><?php echo $data['name']; ?></td>
								<td><?php echo $data['date_of_birth']; ?></td>
								<td><?php echo $data['phone_number']; ?></td>
								<td><?php echo $data['address']; ?></td>
								<td><?php echo $data['last_education']; ?></td>
								<td><?php echo $data['religion']; ?></td>
								<td><?php echo $data['hobby']; ?></td>
								
								
								<td align="center">
									<a class="btn btn-info btn-sm" href="?aksi=edit&id_ubah=<?php echo $data['id']?>">Edit</a> 
									<a class="btn btn-danger btn-sm" href="aksi_biodata.php?proses=hapus&id_hapus=<?php echo $data['id']?>" onclick="return confirm('Yakin akan menghapus data <?php echo $data['full_name']?>?')">Delete
									</a>
								</td>
							</tr>
					<?php
							$no++;
						}
					?>
				</table>
			</div>

<?php
		break;
		case 'input' :
?>
			<h1>Entri Biodata</h1>
			<form method="post" action="aksi_biodata.php?proses=entri">
				<label class="col-sm col-form-label">Nama Lengkap</label>
				<div class="form-group col-sm-6">
					<input type="text" class="form-control" placeholder="Nama Lengkap" name="full_name" required>
				</div>
				
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="form-group col-sm-6">
					<select class="form-control col-sm-6" name="place_of_birth_id">
						<?php
								include 'koneksi.php';
								$input = $mysqli->query("SELECT * FROM cities");
								$no=1;
								while($data_input = $input->fetch_assoc()){
						?>
									<option value="<?php echo $data_input['id']?>"><?php echo $data_input['name']?></option>
							<?php 
									$no++;
								}
							?>
					</select>
				</div>

				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="form-group col-sm-6">
					<input type="date" class="form-control col-sm-6" placeholder="Tanggal Lahir" name="date_of_birth" required>
				</div>

				<label class="col-sm-2 col-form-label">NO HP</label>
				<div class="form-group col-sm-6">
					<input type="text" class="form-control" placeholder="NO HP" name="phone_number" required>
				</div>

				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="form-group col-sm-6">
					<textarea class="form-control" name="address" cols="25" rows="4"></textarea>
				</div>

				<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
				<div class="form-group col-sm-6">
					<select class="form-control col-sm-6" name="last_education">
						<option value="S2">S2</option>
						<option value="S1">S1</option>
						<option value="D4">D4</option>
						<option value="D3">D3</option>
						<option value="D2">D2</option>
						<option value="D1">D1</option>
						<option value="SMA/SMK">SMA/SMK</option>
						<option value="SMP">SMP</option>
					</select>
				</div>

				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="form-group col-sm-6">
					<input type="radio" name="religion" value="Islam">Islam<br>
					<input type="radio" name="religion" value="Kristen">Kristen<br>
					<input type="radio" name="religion" value="Katolik">Katolik<br>
				</div>

				<label class="col-sm-2 col-form-label">Hobi</label>
				<div class="form-group col-sm-6">
					<input type="radio" name="hobby" value="Renang">Renang<br>
					<input type="radio" name="hobby" value="Mancing">Mancing<br>
					<input type="radio" name="hobby" value="Game">Game<br>
					<input type="radio" name="hobby" value="Gibah">Gibah<br>
					<input type="radio" name="hobby" value="Programming">Programming<br>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-2"></div>
					<div class="col-sm-5">
						<input class="btn btn-success" type="submit" name="submit" value="Simpan">
						<a class="btn btn-danger" role="button" href="index.php?p=home">Kembali</a>
					</div>
				</div>
			</form>

<?php
		break;
		case 'edit':

			include 'koneksi.php';
			$tampil = $mysqli->query("SELECT biodata.id, biodata.full_name, cities.name, biodata.place_of_birth_id, biodata.date_of_birth, biodata.phone_number, biodata.address, biodata.last_education, biodata.religion, biodata.hobby FROM biodata INNER JOIN cities ON biodata.place_of_birth_id=cities.id where biodata.id='$_GET[id_ubah]'");
			$data=$tampil->fetch_assoc();
?>
			<h1>Update Biodata</h1>
			<form method="post" action="aksi_biodata.php?proses=ubah&id_ubah=<?php echo $data['id']?>">
				<label class="col-sm col-form-label">Nama Lengkap</label>
				<div class="form-group col-sm-6">
					<input type="text" class="form-control" placeholder="Nama Lengkap" name="full_name" value="<?php echo $data['full_name']?>">
				</div>
				
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="form-group col-sm-6">
					<select class="form-control col-sm-6" name="place_of_birth_id">
						<option value="<?php echo $data['place_of_birth_id']?>"><?php echo $data['name']?></option>
						<?php
								include 'koneksi.php';
								$input = $mysqli->query("SELECT * FROM cities");
								$no=1;
								while($data_input = $input->fetch_assoc()){
						?>
									<option value="<?php echo $data_input['id']?>"><?php echo $data_input['name']?></option>
							<?php 
									$no++;
								}
							?>
					</select>
				</div>

				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="form-group col-sm-6">
					<input type="date" class="form-control col-sm-6" placeholder="Tanggal Lahir" name="date_of_birth" value="<?php echo $data['date_of_birth']?>">
				</div>

				<label class="col-sm-2 col-form-label">NO HP</label>
				<div class="form-group col-sm-6">
					<input type="text" class="form-control" placeholder="NO HP" name="phone_number" value="<?php echo $data['phone_number']?>">
				</div>

				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="form-group col-sm-6">
					<textarea class="form-control" name="address" cols="25" rows="4"><?php echo $data['address']?></textarea>
				</div>

				<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
				<div class="form-group col-sm-6">
					<select class="form-control col-sm-6" name="last_education">
						<option value="<?php echo $data['last_education']?>" checked><?php echo $data['last_education']?></option>
						<option value="S2">S2</option>
						<option value="S1">S1</option>
						<option value="D4">D4</option>
						<option value="D3">D3</option>
						<option value="D2">D2</option>
						<option value="D1">D1</option>
						<option value="SMA/SMK">SMA/SMK</option>
						<option value="SMP">SMP</option>
					</select>
				</div>

				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="form-group col-sm-6">
					<input type="radio" name="religion" value="<?php echo $data['religion']?>" checked><?php echo $data['religion']?><br>
					<input type="radio" name="religion" value="Islam">Islam<br>
					<input type="radio" name="religion" value="Kristen">Kristen<br>
					<input type="radio" name="religion" value="Katolik">Katolik<br>
				</div>

				<label class="col-sm-2 col-form-label">Hobi</label>
				<div class="form-group col-sm-6">
					<input type="radio" name="hobby" value="<?php echo $data['hobby']?>" checked><?php echo $data['hobby']?><br>
					<input type="radio" name="hobby" value="Renang">Renang<br>
					<input type="radio" name="hobby" value="Mancing">Mancing<br>
					<input type="radio" name="hobby" value="Game">Game<br>
					<input type="radio" name="hobby" value="Gibah">Gibah<br>
					<input type="radio" name="hobby" value="Programming">Programming<br>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-2"></div>
					<div class="col-sm-5">
						<input class="btn btn-success" type="submit" name="submit" value="Simpan">
						<a class="btn btn-danger" role="button" href="index.php?p=home">Kembali</a>
					</div>
				</div>
			</form>

<?php
		break;
	}
?>