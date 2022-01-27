<?php 
		error_reporting(0);
		include 'db.php';
		$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
		$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BukaGadget</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
		<h1><a class="logo" href="index.php"><img src="./produk/BukaGadget.png" alt="logo" height="100" width="100" align="left"></a></h1>
		<ul>
			<li><a href="produk.php">Produk</a></li> 
	</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="Cari Produk">
			</form>
		</div>	
	</div>
	<!-- new produk -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">
				<?php
					if($_GET['search'] != '' || $_GET['kat'] != ''){

						$where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
					}
					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
					if(mysqli_num_rows($produk) > 0){
						while ($p = mysqli_fetch_array($produk)) {
				?>
				<a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
				<div class="col-4">
					<img src="produk/<?php 	echo $p['product_image'] ?>">
					<p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
					<p class="harga">Rp. <?php echo number_format($p['product_price']); ?></p>
				</div>
				</a>
			<?php }}else{ ?>

				<p>Produk Tidak Ada</p>
			<?php } ?>
			</div>
		</div>	
	</div>	

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p>Jl. Mangga</p>

			<h4>Email</h4>
			<p><?php echo $a->admin_address ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a->admin_telp ?></p>
			<small>Copyright &copy; 2021 - BukaGadget</small>
		</div>
	</div>	

</body>
</html>