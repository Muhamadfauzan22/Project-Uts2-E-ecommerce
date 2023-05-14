<?php
      require_once 'dbcon.php' ;

      $sql = " SELECT * FROM product";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    
?>


<?php
    include_once 'templates/admin-header.php';
?>

<div class="container">
<div class="row">
  <div class="col-md-12">
  <h3>KELOLA PRODUK</h3>
  <a class="btn btn-primary" href="form_product.php" role="button">Tambah Produk</a>
  <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">ID Produk</th>
      <th scope="col">SKU</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga Beli</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Stok</th>
      <th scope="col">Min Stok</th>
      <th scope="col">ID Kategori Produk</th>
      <th scope="col">ID Restock</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
      $number = 1;
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    ?>

    <tr>
      <th scope="row"><?=  $number      ?></th>
      <td>  <?=  $row['id']      ?>    </td>
      <td>  <?=  $row['sku']      ?>    </td>
      <td> <?=  $row['nama']      ?> </td>
      <td><?=  $row['purchase_price']      ?></td>
      <td> <?=  $row['sell_price']      ?></td>
      <td> <?=  $row['stock']      ?></td>
      <td> <?=  $row['min_stock']      ?></td>
      <td> <?=  $row['product_type_id']      ?></td>
      <td> <?=  $row['restock_id']      ?></td>
      <td>
                    <a href="edit_products.php?id=<?= $row['id'] ?>">EDIT</a>
                    <a href="delete_products.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Product <?=$row['nama']?>?')) {return false}"
                    >
                        HAPUS
                    </a>
                </td>
  
    </tr>

    <?php   
      $number++;
      endwhile;
    ?>
    
  </tbody>
</table>
  </div>
</div>

</div>



<?php
    include_once 'templates/admin-footer.php';
?>