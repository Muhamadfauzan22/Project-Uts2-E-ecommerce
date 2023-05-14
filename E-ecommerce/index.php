<?php
require_once 'dbcon.php';

$sql = " SELECT * FROM product";
$stmt = $conn->prepare($sql);
$stmt->execute();

?>


<?php
include_once 'templates/header.php';
?>

<div id="carousel" class="carousel slide" data-bs-ride="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/banner.png" class="d-block banner w-100" alt="...">
    </div>
  </div>
</div>

<div id="product" class="container mt-4">
  <div class="row container">

    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
    ?>
      <div class="card" style="width: 18rem;">
        <img src="assets/img/<?= $row['nama'] ?>.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $row['nama']   ?></h5>
          <h5 class="card-title">Rp. <?= number_format($row['sell_price'], 0, ',', '.')    ?></h5>
          <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-primary Selengkapnya">Selengkapnya</a>
        </div>
      </div>

    <?php
    endwhile;
    ?>
  </div>
</div>

<div id="tentang-kami" id="about-us-section">
  <div class="about-us-image">
  </div>
  <div class="about-us-info">
    <h2>Tentang Kami</h2>
    <p>Kami adalah perusahaan yang berdedikasi untuk menyediakan produk kesehatan dan kecantikan yang berkualitas tinggi kepada pelanggan kami. Kami percaya bahwa kecantikan sejati berasal dari kesehatan yang baik, dan itulah mengapa kami hanya menggunakan bahan-bahan alami dan terbaik untuk produk kami. Selalu memperhatikan kualitas dan keamanan produk, kami berusaha untuk memenuhi kebutuhan pelanggan kami dengan layanan terbaik dan produk yang terbaik.</p>
  </div>
</div>


<?php
include_once 'templates/footer.php';
?>