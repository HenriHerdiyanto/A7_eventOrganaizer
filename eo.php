<?php
include "header.php";
$result = mysqli_query($koneksi, "SELECT * FROM event where status='aktif'");
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Event Organaizer</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Portfolio Details</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">
                <?php foreach ($result as $key => $value) : ?>
                    <div class="col-lg-6">
                        <div class="portfolio-slider swiper-container">
                            <div class="swiper-wrapper align-items-center">
                                <div class="swiper-slide">
                                    <img style="width: 100%;" src="admin/image/<?= $value['gambar'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portfolio-description">
                            <h2><?= $value['nama_event'] ?></h2>
                            <p><?= $value['tanggal'] ?></p>
                            <p align="justify">
                                <?= $value['deskripsi'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>