<?php
    require_once 'dbcon.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql = "SELECT * FROM customer WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $card_id = $_POST['card_id'];
    
        $sql = "UPDATE customer SET nama = :nama, gender = :gender, phone = :phone, email = :email,
                        alamat = :alamat, card_id = :card_id WHERE id = :id";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':card_id', $card_id);
    
        $stmt->execute();
    
        header('Location: customers.php');
    
    
    }

    $sqljenis = "SELECT * FROM kartu";
    $rowjenis = $conn->prepare($sqljenis);
    $rowjenis->execute();
?>


<?php
    include_once 'templates/admin-header.php';
?>

<div class="container mt-5">
    <h3>Edit Pelanggan</h3>
    <hr>
  <form method="post">

  <input type="hidden" id="id" name="id" value="<?=  $row['id']   ?>">


    <div class="mb-3">
      <label for="nama" class="form-label">Nama Pelanggan</label>
      <input type="text" class="form-control" id="nama" name="nama" value="<?=  $row['nama']   ?>" required>
    </div>

    <div class="form-group mb-4">
  <label for="gender">Jenis Kelamin</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="L" checked>
    <label class="form-check-label" for="laki-laki">
      Laki-laki
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="perempuan" value="P">
    <label class="form-check-label" for="perempuan">
      Perempuan
    </label>
  </div>
</div>


    <div class="mb-3">
      <label for="phone" class="form-label">NO HP</label>
      <input type="text" class="form-control" id="phone" name="phone" required value="<?=  $row['phone']   ?>">
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" required value="<?=  $row['email']   ?>">
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" required value="<?=  $row['alamat']   ?>">
    </div>


    <div class="mb-3 mt-3">
  <label for="exampleFormControlSelect1" class="form-label">Kategori Kartu Member</label>
  <select class="form-select" id="exampleFormControlSelect1" name="card_id">
    <option selected>Pilih</option>
    <?php
        while($jenis = $rowjenis->fetch(PDO::FETCH_ASSOC)){              
    ?>  
    <option value="<?= $jenis['id'] ?>"><?= $jenis['name']  ?></option>
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