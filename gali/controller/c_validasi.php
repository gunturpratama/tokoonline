<?php 
	// Cek Form Harus Isi Semua Cara 3 (lebih dinamis)
	function CekKosong(){
		$isi=func_get_args();
		$url=$isi['0'];
		foreach ($isi as $key) {
			if(empty($key)){
				header("location:".$url."notice=201");
				exit();
			}
		}
	}

	//Cek Alamat Email menggunakan Regex
	function CekEmail($url,$email){
		if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
			header("location:".$url."notice=203");
		}
	}
	function CekKodeIcd($url,$kode_icd){
		if(!preg_match("/^(*[a-zA-Z\+-]{1,1}+)(\.[0-9]{3,3}+\.)+[0-9]{1,1}$/ix",$kode_icd)){
			header("location:".$url."notice=211");
		}
	}

	//Cek Kesamaan Password
	function CekPassword($url,$password,$cpassword){
		if($password!=$cpassword){
			header("location:".$url."notice=204");
			exit();
		}
	}

	//Validasi Angka
	function angka($url,$angka){
		if(!is_numeric($angka)){
			header("location:".$url."notice=205");
			exit();
		}
	}
	// menambahkan format rupiah pada angka
	function rupiah($uang){
		$format=number_format($uang,0,",","."); 
		$rp="Rp.$format";
		return $rp;
	}
	// Fungsi untuk rename gambar agar tidak ada yg mempunyai nama sama, karena akan di replace.
	function new_name($gambar_name){
		$random=rand(0000,9999);
		$newname_gambar=$random.$gambar_name;
		return $newname_gambar;
	}
	function randomID() {
	    $random=rand(000000,999999);
		return $random;
	}
	// Fungsi untuk Cek Format gambar yag diijinkan
	function format_img($url,$gambar_type){
		$gambar_format=array("image/jpg", "image/jpeg", "image/png");
		if(!in_array($gambar_type, $gambar_format)){
		header("location:".$url."notice=206");
		exit();
		}
	}
	// Fungsi Cek Size Maximal Upload
	function maxsize($url,$gambar_size){
		$gambar_ukuran= 200000000; //2Mb
		if($gambar_size > $gambar_ukuran) {
		header("location:".$url."notice=207");
		exit();
		}
	}
	// Fungsi Untuk Cek upload, apakah berhasil
	function cek_upload($url,$gambar_lokasi, $gambar_direktori){
		$upload_gambar=move_uploaded_file($gambar_lokasi, $gambar_direktori);

		if (!$upload_gambar){
		    header("location:".$url."notice=101");
		    exit();
		}
	}
	// Function untuk batas text content yang terlalu panjang
	function batas($text,$jml){
		if(strlen($text) > $jml){
			$cut=substr($text,0,$jml);
			$string = substr($cut, 0, strrpos($cut, ' ')).' ....>>'; 
			return $string;
		}else{
			return $text;
		}
	}

	function filter($text){
		// Filter Mencegah SQL Injection dan Tag HTML yang tidak diinginkan
		$hasilFilter=mysql_real_escape_string(htmlentities($text));
		return $hasilFilter;
	}
		//Cek Username Tidak Boleh Sama
	// function CekUsername($url,$id_admin,$username){
	// 	$cek=cek_username($id_admin,$username);
	// 	if($cek!=0){
	// 		header("location:".$url."notice=202");
	// 		exit();
	// 	}
	// }
?>