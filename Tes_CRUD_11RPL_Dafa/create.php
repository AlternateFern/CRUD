<?php
require_once('koneksi.php');

	if(!empty($_POST['id'])){
        $id = $_POST['id'];
		$nama = $_POST['nama'];
		$jumlah = $_POST['jumlah'];
		
        $data[] = $id;
		$data[] = $nama;
		$data[] = $jumlah;
		
		// simpan data barang
		
		$sql = 'INSERT INTO obat (id,nama,jumlah)VALUES (?,?,?)';
		$row = $koneksi->prepare($sql);
		$row->execute($data);
		
		// redirect
		echo '<script>alert("Berhasil Tambah Data");window.location="index.php"</script>';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Create</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			 <br/>
			 <h3>Tambah Obat</h3>
			 <br/>
			<div class="row">
				 <div class="col-lg-6">
					 <form action="" method="POST">
						 <div class="form-group">
							 <label>ID Obat</label>
							 <input type="number" value="" class="form-control" name="id">
						 </div>
						 <div class="form-group">
							 <label>Nama Obat</label>
							 <input type="text" value="" class="form-control" name="nama">
						 </div>
						 <div class="form-group">
							 <label>Jumlah Obat</label>
							 <input type="number" value="" class="form-control" name="jumlah">
						 </div>
						 <button class="btn btn-primary btn-md" name="create"><i class="fa fa-plus"> </i> Create</button>
					 </form>
				</div>
		    </div>
	    </body>
    </html>