<?php
	if(isset($_GET['notice'])){

		$notice=$_GET['notice'];
		echo"<div class='box-body'>";
		// Notice Berupa Error 
		if($notice <= 200){
			echo"
			<div class='alert alert-danger alert-dismissable'>
		    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		    <h4><i class='icon fa fa-ban'></i>Error Notice!</h4>";
				switch($notice){
				case 101:
				echo"Gagal Mengupload Gambar !";
				break;
				case 102 :
				echo"Gagal Menambahkan & Menyimpan Data !";
				break;
				case 103 :
				echo"Gagal Mengupdate & Menyimpan Data !";
				break;
				case 104 :
				echo"Gagal Menghapus Data !";
				break;
				}
			echo"</div>";

		// Notice Berupa Peringatan / Warning
		}else if($notice <= 300){
			echo"
			<div class='alert alert-warning alert-dismissable'>
		    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		    <h4><i class='icon fa fa-warning'></i>Warning</h4>";
		    	switch($notice){
				case 201:
				echo"Silahkan Isi Semua Field Bertanda Bintang * !";
				break;
				case 202 :
				echo"Username Already Used By The Other Admin User !";
				break;
				case 203 :
				echo"Invalid Email Address !";
				break;
				case 204 :
				echo"Ketik Ulang Password Dengan Benar !";
				break;
				case 205 :
				echo"(NIK/NIP/Telpon/Harga) Harus Berupa Angka !";
				break;
				case 206 :
				echo"Invalid Image Format, Please upload (JPG,JPEG,PNG) Format !";
				break;
				case 207 :
				echo"Maximal Upload Size 2 Mb !";
				break;
				case 208 :
				echo"Invalid Username/Password !";
				break;
				case 209 :
				echo"Please Check One Of The Option As The Right Answer !";
				break;
				case 210 :
				echo"Username Sudah Digunakan Oleh User Lain !";
				break;
				case 211 :
				echo"Invalid ICD Code Format !";
				break;
				case 212 :
				echo"Silahkan Pilih Periode Laporan Terlebih Dahulu !";
				break;
				case 213 :
				echo"ID Kategori sudah digunakan, silahakan ketikan ID lain !";
				break;
				}
			echo"</div>";

		// Notice Sukses
		}else if($notice <= 400){
			echo"
			<div class='alert alert-success alert-dismissable'>
		    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		    <h4><i class='icon fa fa-check'></i>Succesfull</h4>";
		    	switch($notice){
				case 301:
				echo"Data Berhasil Ditambahkan & Disimpan";
				break;
				case 302 :
				echo"Data Berhasil Diupdate & Disimpan";
				break;
				case 303 :
				echo"Data Berhasil Dihapus";
				break;
				case 304 :
				echo"Konfirmasi Pengiriman Berhasil";
				break;
				}
			echo"</div>";
		}
		echo"</div>";
	}
?>