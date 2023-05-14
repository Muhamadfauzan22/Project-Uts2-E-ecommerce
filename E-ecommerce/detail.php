


<?php
        require_once 'dbcon.php';



        if(isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $sql = "SELECT * FROM product WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
   ?>

<?php
    include_once 'templates/header.php';
?>


<div class="container py-5">
  <div class="row">
    <div class="col-md-6">
      <img src="assets/img/<?= $row['nama']?>.png" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h1 class="mb-3"><?=  $row['nama']   ?></h1>
      <h3 class="mb-3 text-muted"><?=  $row['sku']   ?></h3>
      <h2 class="mb-3 text-danger">Rp <?=  number_format($row['sell_price'], 0, ',', '.')    ?></h2>
      <p class="mb-4">Stok Tersedia : <?=  $row['stock']   ?></p>
      <form method="post" action="sukses.php">
      
        <div class="mb-3">
            <label for="qty" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="qty" min="1" value="1" name="qty">
        </div>

        <input type="hidden" name="sell_price" value="<?=  $row['sell_price']   ?>" class="visually-hidden">

        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer ID</label>
            <input type="number" class="form-control" id="customer_id" min="1" value="1" name="customer_id">
        </div>

        <input type="hidden" name="product_id" value="<?=  $row['id']   ?>" class="visually-hidden">

        <button type="submit" name="submit" class="btn btn-primary mb-3">Beli Sekarang!</button>
      </form>
    </div>
  </div>
</div>




<?php
    include_once 'templates/footer.php';
?>