<?php
    defined('BASE_URL') OR exit('No direct script access allowed');

    if (isset($_POST['kirim'])) {
        $errors = [];
        
        // Validasi nama
        if($_POST['nama'] == "") {
            $errors["nama"] = "Nama tidak boleh kosong!";
        }
        else if(!preg_match("/^[a-zA-Z]+$/", $_POST['nama'])) {
            $errors["nama"] = "Nama hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi!.";
		}
        
        // Validasi email
        if($_POST['email'] == "") {
            $errors["email"] = "Email tidak boleh kosong!";
        }
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Format email salah.";
        }
        
        // Validasi subjek
        if($_POST['subjek'] == "") {
            $errors["subjek"] = "Subjek tidak boleh kosong!";
        }

        // Validasi pesan
        if($_POST['pesan'] == "") {
            $errors["pesan"] = "Pesan tidak boleh kosong!";
        }

        // Kembali ke halaman sebelumnya dan tampilkan error
        if(!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('location: '.BASE_URL.'#contact');
            exit();
        }

        session_unset();
        echo '<script>window.location="/success"</script>';
    }
    else {
        header('location:'.BASE_URL);
    }