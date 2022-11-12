<?php
require_once('koneksi.php');
	
	// berikut script untuk proses edit barang ke database 
	if(!empty($_POST['id'])){
		// menangkap data post 
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$jumlah = $_POST['jumlah'];
		
		$data[] = $id;
		$data[] = $nama;
		$data[] = $jumlah;
		
		// simpan data barang
		
		$sql = 'UPDATE obat SET id=?,nama=?,jumlah=? WHERE id=?';
		$row = $koneksi->prepare($sql);
		$row->execute($data);
		
		// redirect
		echo '<script>alert("Berhasil Edit Data");window.location="index.php"</script>';
	}
	// untuk menampilkan data barang berdasarkan id obat
	$id = $_GET['id'];
	$sql = "SELECT * FROM obat WHERE id= ?";
	$row = $koneksi->prepare($sql);
	$row->execute(array($id));
	$hasil = $row->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Edit Barang - <?php echo $hasil['nama'];?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			 <br/>
			 <h3>Edit Barang - <?php echo $hasil['nama'];?></h3>
			 <br/>
			<div class="row">
				 <div class="col-lg-6">
					 <form action="" method="POST">
						 <div class="form-group">
							 <label>ID</label>
							 <input type="number" value="<?php echo $hasil['id'];?>" class="form-control" name="id">
						 </div>
						 <div class="form-group">
							 <label>Nama Obat</label>
							 <input type="text" value="<?php echo $hasil['nama'];?>" class="form-control" name="nama">
						 </div>
						 <div class="form-group">
							 <label>Jumlah Obat</label>
							 <input type="number" value="<?php echo $hasil['jumlah'];?>" class="form-control" name="jumlah">
						 </div>
						 <input type="hidden" value="<?php echo $hasil['id'];?>" name="id">
						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
					 </form>
				  </div>
			</div>
		</div>
	</body>
</html>