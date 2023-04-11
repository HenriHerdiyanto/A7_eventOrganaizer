<?php include "header.php" ?>

<main id="main">
  <section class="container static">
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
  </section>

  <!-- <section>
    <div class="container">
      <div class="d-flex flex-row mb-3 justify-content-center">
        <div class="p-2 me-1">
          <img src="assets/img/mobil.png" alt="mobil" width="300px" class="img-fluid">
        </div>
        <div class="p-2">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-bs-toggle="tab" href="#paket1">Paket 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#paket2">Paket 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#paket3">Paket 3</a>
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
              </p>

            </div>
            <div class="tab-pane" id="paket2">
              <ol class="list-group list-group-numbered">
                <p>
                  <li class="list-group-item">Dengan Supir</li>
                  <li class="list-group-item">Bensin Sendiri</li>
                  <li class="list-group-item">Mobil Ambil Sendiri</li>
              </ol>
              </p>
            </div>
            <div class="tab-pane" id="paket3">
              <ol class="list-group list-group-numbered">
                <p>
                  <li class="list-group-item">Dengan Supir</li>
                  <li class="list-group-item">Bensin Disediakan</li>
                  <li class="list-group-item">Di Jemput</li>
              </ol>
              </p>
            </div>
            <button class="btn btn-success" type="submit">
              <i class="fa-brands fa-whatsapp"></i>
              Pesan Sekarang
            </button>
          </form>
        </div>
      </div>
    </div>
  </section> -->

  <section class="container border">
    <div class="row">
      <div class="col-4">
        <img src="assets/img/mobil.png" alt="mobil" width="300px" class="img-fluid">
      </div>
      <div class="col-8">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#paket1">Paket 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#paket2">Paket 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#paket3">Paket 3</a>
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
            </p>

          </div>
          <div class="tab-pane" id="paket2">
            <ol class="list-group list-group-numbered">
              <p>
                <li class="list-group-item">Dengan Supir</li>
                <li class="list-group-item">Bensin Sendiri</li>
                <li class="list-group-item">Mobil Ambil Sendiri</li>
            </ol>
            </p>
          </div>
          <div class="tab-pane" id="paket3">
            <ol class="list-group list-group-numbered">
              <p>
                <li class="list-group-item">Dengan Supir</li>
                <li class="list-group-item">Bensin Disediakan</li>
                <li class="list-group-item">Di Jemput</li>
            </ol>
            </p>
          </div>
          <button class="btn btn-success" type="submit">
            <i class="fa-brands fa-whatsapp"></i>
            Pesan Sekarang
          </button>
        </form>
      </div>
    </div>
  </section>

  <br>

</main><!-- End #main -->
<?php include "footer.php" ?>