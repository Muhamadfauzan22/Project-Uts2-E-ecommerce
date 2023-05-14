<?php
        require_once 'dbcon.php';

        if(isset($_POST['submit'])){

            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $purchase_price = $_POST['purchase_price'];
            $sell_price = $_POST['sell_price'];
            $stock = $_POST['stock'];
            $min_stock = $_POST['min_stock'];
            $ptype = $_POST['ptype'];
            $restock = $_POST['restock'];
    
        $sql = "INSERT INTO product (sku, nama, purchase_price, sell_price, stock, min_stock, product_type_id, restock_id) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$sku, $name, $purchase_price, $sell_price, $stock, $min_stock, $ptype, $restock]);
    
        header("Location: products.php");
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
    <h3>Tambah Produk</h3>
    <hr>
  <form method="post">
    <div class="mb-3">
      <label for="sku" class="form-label">SKU</label>
      <input type="text" class="form-control" id="sku" name="sku" required>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">Nama Produk</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="mb-3">
      <label for="purchase_price" class="form-label">Harga Beli</label>
      <input type="text" class="form-control" id="purchase_price" name="purchase_price" required>
    </div>

    <div class="mb-3">
      <label for="sell_price" class="form-label">Harga Jual</label>
      <input type="text" class="form-control" id="sell_price" name="sell_price" required>
    </div>

    <div class="mb-3">
      <label for="stock" class="form-label">Stok</label>
      <input type="text" class="form-control" id="stock" name="stock" required>
    </div>

    <div class="mb-3">
      <label for="min_stock" class="form-label">Min Stok</label>
      <input type="text" class="form-control" id="min_stock" name="min_stock" required>
    </div>

    <div class="mb-3">
  <label for="exampleFormControlSelect1" class="form-label">Kategori Produk</label>
  <select class="form-select" id="exampleFormControlSelect1" name="ptype">
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
  <select class="form-select" id="exampleFormControlSelect1" name="restock">
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