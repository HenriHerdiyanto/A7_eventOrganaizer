<?php
include "header.php";
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Daftarkan Event Kamu </h2>
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
                <div class="col-lg-6">
                    <div style="margin-top: -6%;" class="description-event">
                        <h2>Ayo daftarkan event mu !!</h2>
                        <p>Daftarkan event mu di sini, dan dapatkan banyak keuntungan dari kami</p>
                        <img class="img-fluid" src="assets/img/event/EO.JPG" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php
                    if (isset($_POST['submit'])) {
                        $nama_penyelenggara = $_POST['nama_penyelenggara'];
                        $nama_event = $_POST['nama_event'];
                        $tanggal = $_POST['tanggal'];
                        $no_hp = $_POST['no_hp'];
                        $query = mysqli_query($koneksi, "INSERT INTO daftar_event (nama_penyelenggara,nama_event,tanggal,no_hp) VALUES ('$nama_penyelenggara','$nama_event','$tanggal','$no_hp')");
                        if ($query) {
                            echo "<script>alert('Data Berhasil Di Tambahkan. setelah ini Admin Kami akan segera menghubungi anda');window.location='eo.php'</script>";
                        } else {
                            echo "<script>alert('Data Gagal Di Tambahkan');window.location='daftar-Eo.php'</script>";
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <label for="">Nama Penyelenggara</label>
                        <input type="text" name="nama_penyelenggara" class="form-control"><br>
                        <label for="">Nama Event</label>
                        <input type="text" name="nama_event" class="form-control"><br>
                        <label for="">Tanggal Penyelenggaraan</label>
                        <input type="date" name="tanggal" class="form-control"><br>
                        <label for="">Nomor HandPhone</label>
                        <input type="text" name="no_hp" class="form-control"><br>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>