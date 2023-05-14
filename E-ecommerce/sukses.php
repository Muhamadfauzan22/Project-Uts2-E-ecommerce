<?php
    require_once 'dbcon.php';

    if(isset($_POST['submit'])){

        $qty = $_POST['qty'];
        $sell_price = $_POST['sell_price'];
        $customer_id = $_POST['customer_id'];
        $product_id = $_POST['product_id'];

    $sql = "INSERT INTO orders (order_number, tgl, qty, total_price, customer_id, product_id) VALUES (CONCAT('PO',ABS(ROUND(RAND() * 899) + 100)), now(), ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$qty, $sell_price, $customer_id, $product_id]);

    header("Location: sukses.php");
    }

?>



<!DOCTYPE html>
<html>
<head>
	<title>Pesanan Berhasil</title>
	<!-- Include the Bootstrap stylesheet -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container my-5">
		<div class="card">
			<div class="card-header">
				<h4>Pesanan Berhasil</h4>
			</div>
			<div class="card-body">
				<p>Terima kasih, pesanan Anda telah berhasil diproses.</p>
				<p>Silakan tunggu konfirmasi dari kami untuk pengiriman barang.</p>
			</div>
			<div class="card-footer">
				<a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
			</div>
		</div>
	</div>

	<!-- Include the jQuery library -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<!-- Include the Bootstrap JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
