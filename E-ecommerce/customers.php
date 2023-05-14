<?php
      require_once 'dbcon.php' ;

      $sql = " SELECT * FROM customer";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    
?>

<?php
    include_once 'templates/admin-header.php';
?>

<div class="container">
<div class="row">
  <div class="col-md-12">
  <h3>KELOLA PELANGGAN</h3>
  <a class="btn btn-primary" href="form_customer.php" role="button">Tambah Pelanggan</a>
  <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">NO HP</th>
      <th scope="col">Email</th>
      <th scope="col">Alamat</th>
      <th scope="col">ID Kartu</th>
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
      <td>  <?=  $row['nama']      ?>    </td>
      <td> <?=  $row['gender']      ?> </td>
      <td><?=  $row['phone']      ?></td>
      <td> <?=  $row['email']      ?></td>
      <td> <?=  $row['alamat']      ?></td>
      <td> <?=  $row['card_id']      ?></td>
      <td>
                    <a href="edit_customers.php?id=<?= $row['id'] ?>">EDIT</a>
                    <a href="delete_customers.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Pelanggan <?=$row['nama']?>?')) {return false}"
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