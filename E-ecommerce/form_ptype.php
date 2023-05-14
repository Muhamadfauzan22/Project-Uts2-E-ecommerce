<?php
        require_once 'dbcon.php';

        if(isset($_POST['submit'])){

            $name = $_POST['name'];
    
        $sql = "INSERT INTO product_type (nama) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name]);
    
        header("Location: product-type.php");
        }
   ?>


<?php
    include_once 'templates/admin-header.php';
?>

<div class="container mt-5">
    <h3>Tambah Kategori</h3>
    <hr>
  <form method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<?php
    include_once 'templates/admin-footer.php';
?>