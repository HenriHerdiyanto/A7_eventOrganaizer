<?php include "header.php" ?>

<main id="main">
  <section class="container static">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/portfolio/p12.jpeg" class="d-block w-100" alt="a">
        </div>
        <div class="carousel-item">
          <img src="assets/img/portfolio/p12.jpeg" class="d-block w-100" alt="b">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <section class="container">
  <div class="row">
    <div class="col-4" style="background-color: red;">
      col-4
    </div>    
    <div class="col-8" style="background-color: blue;">
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
      <form class="card-body tab-content" style="background-color: green;">
        <div class="tab-pane active" id="paket1">
          <p class="card-text" >
            <div>Tanpa Supir</div>
            <div>Tanpa Supir</div>
            <div>Tanpa Supir</div>
          </p>
        </div>
        <div class="tab-pane" id="paket2">
          <p class=" card-text">List Paket 2</p>
        </div>
        <div class="tab-pane" id="paket3">
          <p class=" card-text">List Paket 3</p>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
      </form>
    </div>
  </div>
  </section>

</main><!-- End #main -->
<?php include "footer.php" ?>