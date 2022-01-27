<?php 
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
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="Cari Produk">
			</form>
		</div>	
	</div>

	<div image>
		<center>
		<img class="tengah" src="./img/Pamflet.png" width="1000px" height="400px">
		</center>
	</div>
	

	<!-- category -->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php
					$Kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($Kategori) > 0){
						while ($k = mysqli_fetch_array($Kategori)) {
				?>
						<a href="produk.php?kat=<?php echo $k['category_id'] ?>">
						<div class="col-5">
							<img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;">
							<p><?php echo $k['category_name'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>	
	</div>

	<!-- new produk -->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php
					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while ($p = mysqli_fetch_array($produk)) {
				?>
				<a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
				<div class="col-4">
					<img src="produk/<?php 	echo $p['product_image'] ?>">
					<p class="nama"><?php echo substr($p['product_name'], 0, 30); ?></p>
					<p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
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