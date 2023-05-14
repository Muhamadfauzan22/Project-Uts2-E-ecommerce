<?php
      require_once 'dbcon.php' ;

      $sql = " SELECT * FROM orders";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    
?>




<?php
    include_once 'templates/admin-header.php';
?>

<div class="container">
<div class="row">
  <div class="col-md-12">
  <h3>KELOLA ORDERAN</h3>
  <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nomor Order</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Kuantitas</th>
      <th scope="col">Total Harga</th>
      <th scope="col">ID Pelanggan</th>
      <th scope="col">ID Produk</th>
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
      <td>  <?=  $row['order_number']      ?>    </td>
      <td> <?=  $row['tgl']      ?> </td>
      <td><?=  $row['qty']      ?></td>
      <td> <?=  $row['total_price']      ?></td>
      <td> <?=  $row['customer_id']      ?></td>
      <td> <?=  $row['product_id']      ?></td>
      <td>
                    <a href="edit_orders.php?id=<?= $row['id'] ?>">EDIT</a>
                    <a href="delete_orders.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Orderan <?=$row['order_number']?>?')) {return false}"
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