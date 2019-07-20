<?php
	include 'koneksi.php';
	if($_GET['proses']=='entri'){
		if (isset($_POST['submit'])) {
			$simpan=$mysqli->query("INSERT INTO biodata (full_name, date_of_birth, place_of_birth_id, phone_number, address, last_education, religion, hobby) VALUES ('$_POST[full_name]' ,'$_POST[date_of_birth]', '$_POST[place_of_birth_id]', '$_POST[phone_number]', '$_POST[address]', '$_POST[last_education]', '$_POST[religion]', '$_POST[hobby]')");

			if ($simpan) {
				header('location:index.php');
			}
			else{
				echo "Gagal";
			}
		}
	}

	if($_GET['proses']=='ubah'){
		if (isset($_POST['submit'])) {
			$ubah=$mysqli->query("UPDATE biodata set
							full_name = '$_POST[full_name]',
							date_of_birth = '$_POST[date_of_birth]',
							place_of_birth_id = '$_POST[place_of_birth_id]',
							phone_number = '$_POST[phone_number]',
							address = '$_POST[address]',
							last_education = '$_POST[last_education]',
							religion = '$_POST[religion]',
							hobby = '$_POST[hobby]'
							where id='$_GET[id_ubah]'
							");

			if ($ubah) {
				header('location:index.php');
			}
			else{
				echo "Gagal";
			}
		}
	}

	if($_GET['proses']=='hapus'){
		$hapus = $mysqli->query("DELETE FROM biodata where id='$_GET[id_hapus]'");
		if($hapus){
			header('location:index.php');
		}
	}
?>