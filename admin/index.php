  <?php include "header.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-lg-3 col-md-6">
              <?php
              $sql = $koneksi->query("SELECT * FROM mobil");
              $jumlah = mysqli_num_rows($sql);
              ?>
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Mobil</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlah ?></h6>
                      <span class="text-success small pt-1 fw-bold">Jumlah Data</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-lg-3 col-md-6">
              <div class="card info-card sales-card">
                <?php
                $sql = $koneksi->query("SELECT * FROM event");
                $jumlah = mysqli_num_rows($sql);
                ?>
                <div class="card-body">
                  <h5 class="card-title">Event Organaizer</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlah ?></h6>
                      <span class="text-success small pt-1 fw-bold">Jumlah Data</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-lg-3 col-md-6">
              <div class="card info-card sales-card">
                <?php
                $sql = $koneksi->query("SELECT * FROM umroh");
                $jumlah = mysqli_num_rows($sql);
                ?>
                <div class="card-body">
                  <h5 class="card-title">Umroh</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $jumlah ?></h6>
                      <span class="text-success small pt-1 fw-bold">Jumlah Data</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Sales Card -->
            <!-- Sales Card -->
            <div class="col-lg-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Paket Wisata</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>150</h6>
                      <span class="text-success small pt-1 fw-bold">Jumlah Data</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Sales Card -->
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php include "footer.php" ?>