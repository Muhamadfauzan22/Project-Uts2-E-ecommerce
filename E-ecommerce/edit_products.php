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

    if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $sku = $_POST['sku'];
            $nama = $_POST['nama'];
            $purchase_price = $_POST['purchase_price'];
            $sell_price = $_POST['sell_price'];
            $stock = $_POST['stock'];
            $min_stock = $_POST['min_stock'];
            $product_type_id = $_POST['product_type_id'];
            $restock_id = $_POST['restock_id'];
    
        $sql = "UPDATE product SET sku = :sku, nama = :nama, purchase_price = :purchase_price, sell_price = :sell_price,
                        stock = :stock, min_stock = :min_stock, product_type_id = :product_type_id, restock_id = :restock_id WHERE id = :id";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':purchase_price', $purchase_price);
        $stmt->bindParam(':sell_price', $sell_price);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':min_stock', $min_stock);
        $stmt->bindParam(':product_type_id', $product_type_id);
        $stmt->bindParam(':restock_id', $restock_id);
    
        $stmt->execute();
    
        header('Location: products.php');
    
    
    }

        $sqljenis = "SELECT * FROM product_type";
        $rowjenis = $conn->prepare($sqljenis);
        $rowjenis->execute();


        $sqljenis2 = "SELECT * FROM restock";
        $rowjenis2 = $conn->prepare($sqljenis2);
        $rowjenis2->execute();
?>


<?php
    include_once 'templates/admin-header.php';
?>

<div class="container mt-5">
    <h3>Edit Produk</h3>
    <hr>
  <form method="post">

  <input type="hidden" id="id" name="id" value="<?=  $row['id']   ?>">


  <div class="mb-3">
      <label for="sku" class="form-label">SKU</label>
      <input type="text" class="form-control" id="sku" name="sku" required value="<?=  $row['sku']   ?>">
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">Nama Produk</label>
      <input type="text" class="form-control" id="name" name="nama" required value="<?=  $row['nama']   ?>">
    </div>

    <div class="mb-3">
      <label for="purchase_price" class="form-label">Harga Beli</label>
      <input type="text" class="form-control" id="purchase_price" name="purchase_price" required value="<?=  $row['purchase_price']   ?>">
    </div>

    <div class="mb-3">
      <label for="sell_price" class="form-label">Harga Jual</label>
      <input type="text" class="form-control" id="sell_price" name="sell_price" required value="<?=  $row['sell_price']   ?>">
    </div>

    <div class="mb-3">
      <label for="stock" class="form-label">Stok</label>
      <input type="text" class="form-control" id="stock" name="stock" required value="<?=  $row['stock']   ?>">
    </div>

    <div class="mb-3">
      <label for="min_stock" class="form-label">Min Stok</label>
      <input type="text" class="form-control" id="min_stock" name="min_stock" required value="<?=  $row['min_stock']   ?>">
    </div>

    <div class="mb-3">
  <label for="exampleFormControlSelect1" class="form-label">Kategori Produk</label>
  <select class="form-select" id="exampleFormControlSelect1" name="product_type_id">
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


<div class="mb-3">
  <label for="exampleFormControlSelect1" class="form-label">Nomor Restock</label>
  <select class="form-select" id="exampleFormControlSelect1" name="restock_id">
    <option selected>Pilih</option>
    <?php
        while($jenis2 = $rowjenis2->fetch(PDO::FETCH_ASSOC)){              
    ?>  
    <option value="<?= $jenis2['id'] ?>"><?= $jenis2['restock_number']  ?></option>
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