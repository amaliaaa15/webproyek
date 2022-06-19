<?php
$servername = "localhost";
$username ="root";
$password ="";
$dbname = "webmerch";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}


if (!function_exists('query'))   {
  function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) )  {
		$rows[] = $row;
	}
	return $rows;
	}
}

if (!function_exists('kueri'))   {
  function kueri($kueri) {
	global $conn;
	$result = mysqli_query($conn, $kueri);
	$rows = [];
	while( $row = mysqli_fetch_array($result) )  {
		$rows[] = $row;
	}
	return $rows;
	}
}

if (!function_exists('tambah'))   {
	function tambah($data) {
		global $conn;

	  	$kategori = htmlspecialchars($data["kategori"]);

	    $sql = "INSERT INTO kategori (nama_kat, k_flag) VALUES ('" . $kategori . "', 1)";

	    mysqli_query($conn, $sql);

	    return mysqli_affected_rows($conn);
	}
}

if (!function_exists('hapus'))   {
	function hapus($id_kat){
		global $conn;

		mysqli_query($conn, "UPDATE kategori SET k_flag=0 WHERE id_kategori = $id_kat");
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('edit'))   {
	function edit($data) {
		global $conn;
		$id_kat= $data["id_kat"];
	  	$kategori = htmlspecialchars($data["kategori"]);

	    $sql = "UPDATE kategori SET nama_kat= '$kategori' WHERE id_kategori= $id_kat";

	    mysqli_query($conn, $sql);

	    return mysqli_affected_rows($conn);
	}
}    

if (!function_exists('hapuspeng'))   {
	function hapuspeng($user){
		global $conn;

		mysqli_query($conn, "DELETE FROM user WHERE u_username = $user");
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('hapusmet'))   {
	function hapusmet($id){
		global $conn;

		mysqli_query($conn, "UPDATE metode_bayar SET m_flag=0 WHERE id_metode = $id");
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('blokir'))   {
	function blokir($usern){
		global $conn;

		$kueri="UPDATE user SET u_flag=0 WHERE u_username = $usern";
		mysqli_query($conn, $kueri);
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('editmet'))   {
	function editmet($data) {
		global $conn;
		$id=$data["m_id"];
		$nama= htmlspecialchars($data["nama"]);
	  $keterangan = htmlspecialchars($data["keterangan"]);

	  $sql = "UPDATE metode_bayar 
	  	      SET nama_metode= '$nama', 
	    					keterangan = '$keterangan' 
	    			WHERE id_metode = $id ";

	    mysqli_query($conn, $sql);

	    return mysqli_affected_rows($conn);
	}   
}

if (!function_exists('tambahmet'))   {
	function tambahmet($data) {
		global $conn;

	  	$nama = htmlspecialchars($data["nama"]);
	  	$keterangan = htmlspecialchars($data["keterangan"]);

	    $sql = "INSERT INTO metode_bayar (nama_metode, keterangan, m_flag) 
	    				VALUES ('" . $nama . "', '" . $keterangan . "', 1)";

	    mysqli_query($conn, $sql);

	    return mysqli_affected_rows($conn);
	}
}

if (!function_exists('confirm'))   {
	function confirm($idtrans){
		global $conn;

		$sql = "UPDATE transaksi
						JOIN pembayaran USING (id_transaksi)
						SET 
  					transaksi.status_trans = 'Menunggu Pengiriman',
  					pembayaran.status_bayar = 'Pembayaran Terkonfirmasi'
						WHERE id_transaksi = $idtrans ";

		mysqli_query($conn, $sql);
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('editabout'))   {
	function editabout($data) {
		global $conn;

	  $informasi = htmlspecialchars($data["informasi"]);

	    $sql = "UPDATE about_us SET informasi= '".$informasi."' WHERE id_about= 1";

	    mysqli_query($conn, $sql);

	    return mysqli_affected_rows($conn);
	}
}    

if (!function_exists('editcontact'))   {
	function editcontact($data) {
		global $conn;
		
		$id_contact= $data["id_contact"];
	  $nama = htmlspecialchars($data["nama"]);
	  $alamat = htmlspecialchars($data["alamat"]);
	  $info = htmlspecialchars($data["info"]);

	    $sql = "UPDATE contact_us 
	    				SET c_nama= '$nama' ,
	    						c_address = '$alamat',
	    						c_contact = 'info'
	    				WHERE id_contact= $id_contact";

	    mysqli_query($conn, $sql);

	    return mysqli_affected_rows($conn);
	}
}    

if (!function_exists('batalkan'))   {
	function batalkan($idtrans){
		global $conn;

		$sql = "UPDATE transaksi
						JOIN pembayaran USING (id_transaksi)
						SET 
  					transaksi.status_trans = 'Pesanan Dibatalkan',
  					pembayaran.status_bayar = 'Pesanan Dibatalkan'
						WHERE id_transaksi = $idtrans ";

		mysqli_query($conn, $sql);
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('blokir'))   {
	function blokir($usern){
		global $conn;

		mysqli_query($conn, "UPDATE user SET u_flag=0 WHERE u_username = $usern");
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('pulihkan'))   {
	function pulihkan($id_kat){
		global $conn;

		mysqli_query($conn, "UPDATE kategori SET k_flag=1 WHERE id_kategori = $id_kat");
		return mysqli_affected_rows($conn);
	}
}

if (!function_exists('hapusart'))   {
	function hapusart($idart){
		global $conn;

		mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel = $idart");
		return mysqli_affected_rows($conn);
	}
}
?>