<?php
    require_once 'dbcon.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql = "SELECT * FROM product_type WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
    
    
        $sql = "UPDATE product_type SET nama = :nama WHERE id = :id";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
    
        $stmt->execute();
    
        header('Location: product-type.php');
    
    
    }

    
?>


<?php
    include_once 'templates/admin-header.php';
?>

<div class="container mt-5">
    <h3>Edit Kategori</h3>
    <hr>
  <form method="post">

  <input type="hidden" id="id" name="id" value="<?=  $row['id']   ?>">

    <div class="mb-3">
      <label for="nama" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?=  $row['nama']   ?>" required>
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<?php
    include_once 'templates/admin-footer.php';
?>