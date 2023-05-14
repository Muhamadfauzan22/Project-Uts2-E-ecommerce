<?php
        require_once 'dbcon.php';

        if(isset($_POST['submit'])){

            
            $nama = $_POST['nama'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $kartu = $_POST['kartu'];
           
    
        $sql = "INSERT INTO customer (nama, gender, phone, email, alamat, card_id) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nama, $gender, $phone, $email, $alamat, $kartu]);
    
        header("Location: customers.php");
        }


        $sqljenis = "SELECT * FROM kartu";
        $rowjenis = $conn->prepare($sqljenis);
        $rowjenis->execute();

   ?>


<?php
    include_once 'templates/admin-header.php';
?>

<div class="container mt-5">
    <h3>Tambah Pelanggan</h3>
    <hr>
  <form method="post">

    <div class="mb-3">
      <label for="nama" class="form-label">Nama Pelanggan</label>
      <input type="text" class="form-control" id="nama" name="nama" required>
    </div>

    <div class="form-group mb-4">
  <label for="gender">Jenis Kelamin</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="L">
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
      <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
  <label for="alamat">Alamat</label>
  <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
</div>


    <div class="mb-3 mt-3">
  <label for="exampleFormControlSelect1" class="form-label">Kategori Kartu Member</label>
  <select class="form-select" id="exampleFormControlSelect1" name="kartu">
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