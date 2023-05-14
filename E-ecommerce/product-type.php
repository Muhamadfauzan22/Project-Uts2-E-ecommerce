<?php
      require_once 'dbcon.php' ;

      $sql = " SELECT * FROM product_type";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
    
?>

<?php
    include_once 'templates/admin-header.php';
?>

<div class="container">
<div class="row">
  <div class="col-md-12">
  <h3>KELOLA KATEGORI </h3>
  <a class="btn btn-primary" href="form_ptype.php" role="button">Tambah Kategori</a>
  <table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
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
      <td>
                    <a href="edit_product_type.php?id=<?= $row['id'] ?>">EDIT</a>
                    <a href="delete_ptype.php?id=<?= $row['id'] ?>"  
                        onclick="if(!confirm('Anda Yakin Hapus Kategori <?=$row['nama']?>?')) {return false}"
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