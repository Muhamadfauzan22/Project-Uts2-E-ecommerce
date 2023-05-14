<?php
    require_once 'dbcon.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql = "SELECT * FROM orders WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $order_number = $_POST['order_number'];
            $tgl = $_POST['tgl'];
            $qty = $_POST['qty'];
            $total_price = $_POST['total_price'];
            $customer_id = $_POST['customer_id'];
            $product_id = $_POST['product_id'];
    
        $sql = "UPDATE orders SET order_number = :order_number, tgl = :tgl, qty = :qty, total_price = :total_price,
                        customer_id = :customer_id, product_id = :product_id WHERE id = :id";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':order_number', $order_number);
        $stmt->bindParam(':tgl', $tgl);
        $stmt->bindParam(':qty', $qty);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':product_id', $product_id);
    
        $stmt->execute();
    
        header('Location: orders.php');
    
    
    }

    $sqljenis = "SELECT * FROM product_type";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();
?>


<?php
    include_once 'templates/admin-header.php';
?>

<div class="container mt-5">
    <h3>Edit Pesanan</h3>
    <hr>
  <form method="post">

  <input type="hidden" id="id" name="id" value="<?=  $row['id']   ?>">


    <div class="mb-3">
      <label for="order_number" class="form-label">Nomor Order</label>
      <input type="text" class="form-control" id="order_number" name="order_number" value="<?=  $row['order_number']   ?>" required>
    </div>

    <div class="mb-3">
      <label for="tgl" class="form-label">Tanggal </label>
      <input type="text" class="form-control" id="tgl" name="tgl" value="<?=  $row['tgl']   ?>" required>
    </div>


    <div class="mb-3">
      <label for="qty" class="form-label">Kuantitas</label>
      <input type="text" class="form-control" id="qty" name="qty" required value="<?=  $row['qty']   ?>">
    </div>

    <div class="mb-3">
      <label for="total_price" class="form-label">Total Harga</label>
      <input type="number" class="form-control" id="total_price" name="total_price" required value="<?=  $row['total_price']   ?>">
    </div>

    <div class="mb-3">
      <label for="customer_id" class="form-label">ID Pelanggan</label>
      <input type="text" class="form-control" id="customer_id" name="customer_id" required value="<?=  $row['customer_id']   ?>">
    </div>


    <div class="mb-3 mt-3">
  <label for="exampleFormControlSelect1" class="form-label">Kategori Produk</label>
  <select class="form-select" id="exampleFormControlSelect1" name="product_id">
    <option selected>Pilih</option>
    <?php
        while($jenis = $rowjenis->fetch(PDO::FETCH_ASSOC)){              
    ?>  
    <option value="<?= $jenis['id'] ?>"><?= $jenis['nama']  ?></option>
    <?php
        }
    ?>
  </select>
</div>




   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<?php
    include_once 'templates/admin-footer.php';
?>