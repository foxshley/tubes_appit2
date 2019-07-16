<?php
    defined('BASE_URL') OR exit('No direct script access allowed');
    // session_start();
    
    
        $errors = [];
		
		// Validasi nama
        if($_POST['nama'] == "") {
			$errors["nama"] = "<h4 style='color:red'>Nama tidak boleh kosong!</h4>";
		}
		
		// Validasi email
		if($_POST['email'] == "") {
			$errors["email"] = "<h4 style='color:red'>Email tidak boleh kosong!</h4>";
		}
		else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors["email"] = "<h4 style='color:red'>Format email salah.<h4/>";
		}
		
		// Validasi subjek
		if($_POST['subjek'] == "") {
			$errors["subjek"] = "<h4 style='color:red'>Subjek tidak boleh kosong!</h4>";
		}

		// Validasi pesan
		if($_POST['pesan'] == "") {
			$errors["pesan"] = "<h4 style='color:red'>Pesan tidak boleh kosong!</h4>";
		}

		// Kembali ke halaman sebelumnya dan tampilkan error
        if(!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('location:home');
        }
        /*
		if(!preg_match("/^[a-zA-Z]*$/", $_POST['nama'])) {
			echo "Nama hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi!.<br/>";
		}
		
		if(!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST['alamat'])) {
			echo "Alamat hanya huruf, dangka dan spasi yang diijinkan.<br/>";
		}
		
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "Format email salah.<br/>";
        }
		*/
		header('location:success');
    