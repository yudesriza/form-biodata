
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.5">

	<title>Biodata</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<div class="container">
	<div class="row">
		<div class="col-2"></div>
		<div class="col-10">
			<h1>Biodata</h1>
			<form method="post" action="">
				<label class="col-sm col-form-label">Nama Lengkap</label>
				<div class="form-group col-sm-6">
					<input type="text" class="form-control" placeholder="Nama Lengkap" name="full_name" required>
				</div>
				
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="form-group col-sm-6">
					<select class="form-control col-sm-6" name="place_of_birth">
						<option value="">Place Of Birth</option>
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
						<option value="">Last Education</option>
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
						<a class="btn btn-danger" role="button" href="index.php?p=user">Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
	