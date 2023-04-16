<?php
include "header.php";
$result = mysqli_query($koneksi, "SELECT * FROM mobil");
$link_to_google = "https://google.com";

?>



<main id="main">
  <!-- <section class="container static">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/portfolio/portfolio-details-1.jpg" class="d-block w-100" alt="porto1">
        </div>
        <div class="carousel-item">
          <img src="assets/img/portfolio/portfolio-details-2.jpg" class="d-block w-100" alt="porto2">
        </div>
        <div class="carousel-item">
          <img src="assets/img/portfolio/portfolio-details-3.jpg" class="d-block w-100" alt="porto3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section> -->

  <?php foreach ($result as $key => $value) : ?>

    <section class="container border" style="height: auto;">
      <div class="row">
        <!-- <div class="col-4">
          <img src="admin/image/<?= $value['gambar'] ?>"alt="mobil" width="300px" class="img-fluid">
        </div> -->
        <div class="container text-center">
          <div class="row">
            <div class="col-3">
              <img src="admin/image/<?= $value['gambar'] ?>" alt="mobil" width="300px" class="img-fluid">
            </div>
            <div class="col-3">
              <p>Paket 1</p>
              <p>
              <ol class="list-group" style="font-size:medium;">
                <li class="list-group-item">Tanpa Supir</li>
                <li class="list-group-item">Bensin Sendiri</li>
                <li class="list-group-item">Mobil Ambil Sendiri</li>
              </ol>
              <ol class="list-group mt-2">
                <li class="list-group-item">Rp. <?php echo $value['harga_p1'] ?></li>
              </ol>
              </p>
            </div>
            <div class="col-3">
              <p>Paket 2</p>
              <p>
              <ol class="list-group">
                <li class="list-group-item">Dengan Supir</li>
                <li class="list-group-item">Bensin Sendiri</li>
                <li class="list-group-item">Mobil Ambil Sendiri</li>
              </ol>
              <ol class="list-group mt-2">
                <li class="list-group-item">Rp. <?php echo $value['harga_p2'] ?></li>
              </ol>
              </p>
            </div>
            <div class="col-3">
              <p>Paket 3</p>
              <p>
              <ol class="list-group">
                <li class="list-group-item">Dengan Supir</li>
                <li class="list-group-item">Bensin Disediakan</li>
                <li class="list-group-item">Di Jemput</li>
              </ol>
              <ol class="list-group mt-2">
                <li class="list-group-item">Rp. <?php echo $value['harga_p3'] ?></li>
              </ol>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <ul class="list-group">
                <li class="list-group-item"> Plate <?= $value['plate'] ?> </li>
              </ul>
            </div>
            <div class="col-9">
              <ul class="list-group">
                <li class="list-group-item"> <?= $value['deskripsi'] ?> </li>
              </ul>
            </div>
            <div class="col">

            </div>
          </div>
          <div class="container text-center mt-4">
            <div class="row">
              <div class="col-3">
              </div>
              <div class="col-3">
                <a href='<?php echo $link_to_google; ?>' target='_blank'>
                  <button class="btn btn-success">
                    <i class="fa-brands fa-whatsapp"></i>
                    Pesan Paket 1
                  </button>
                </a>
              </div>
              <div class="col-3">
                <a href='<?php echo $link_to_google; ?>' target='_blank'>
                  <button class="btn btn-success">
                    <i class="fa-brands fa-whatsapp"></i>
                    Pesan Paket 2
                  </button>
                </a>
              </div>
              <div class="col-3">
                <a href='<?php echo $link_to_google; ?>' target='_blank'>
                  <button class="btn btn-success">
                    <i class="fa-brands fa-whatsapp"></i>
                    Pesan Paket 3
                  </button>
                </a>
              </div>
              <!-- <div class="col-8">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="tab" href="#paket1" style="color: black;">Paket 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#paket2" style="color: black;">Paket 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#paket3" style="color: black;">Paket 3</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#paket4" style="color: black;">Deskripsi Mobil</a>
            </li>
          </ul>
          <form class="card-body tab-content">
            <div class="tab-pane active" id="paket1">
              <p>
              <ol class="list-group list-group-numbered">
                <li class="list-group-item">Tanpa Supir</li>
                <li class="list-group-item">Bensin Sendiri</li>
                <li class="list-group-item">Mobil Ambil Sendiri</li>
              </ol>
              <ul class="list-group mt-3">
                <li class="list-group-item"> Rp. <?= $value['harga_p1'] ?> </li>
              </ul>
              </p>
              <a href="youtube.com">
                <button class="btn btn-success">
                  <i class="fa-brands fa-whatsapp"></i>
                  Pesan Paket 1
                </button>
              </a>

            </div>
            <div class="tab-pane" id="paket2">
              <p>
              <ol class="list-group list-group-numbered">
                <li class="list-group-item">Dengan Supir</li>
                <li class="list-group-item">Bensin Sendiri</li>
                <li class="list-group-item">Mobil Ambil Sendiri</li>
              </ol>
              <ul class="list-group mt-3">
                <li class="list-group-item"> Rp. <?= $value['harga_p2'] ?> </li>
              </ul>
              </p>
              <button class="btn btn-success" type="submit">
                <i class="fa-brands fa-whatsapp"></i>
                Pesan Paket 2
              </button>
            </div>
            <div class="tab-pane" id="paket3">
              <p>
              <ol class="list-group list-group-numbered">
                <li class="list-group-item">Dengan Supir</li>
                <li class="list-group-item">Bensin Disediakan</li>
                <li class="list-group-item">Di Jemput</li>
              </ol>
              <ul class="list-group mt-3">
                <li class="list-group-item"> Rp. <?= $value['harga_p2'] ?> </li>
              </ul>
              </p>
              <button class="btn btn-success" type="submit">
                <i class="fa-brands fa-whatsapp"></i>
                Pesan Paket 3
              </button>
            </div>
            <div class="tab-pane" id="paket4">
              <ol class="list-group list-group-numbered">
                <p class="pt-1">
                <ul class="list-group">
                  <li class="list-group-item"> Plate <?= $value['plate'] ?> </li>
                </ul>
                <ul class="list-group mt-1">
                  <li class="list-group-item"> <?= $value['deskripsi'] ?> </li>
                </ul>
                </p>
              </ol>
            </div>
          </form>
        </div> -->
            </div>
    </section>
    <br>
  <?php endforeach ?>

</main><!-- End #main -->
<?php
include "footer.php"
?>