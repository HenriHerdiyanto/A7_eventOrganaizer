<?php
require_once "header.php";
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Editors</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Editors</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Insert Event</h5>
                        <?php
                        if (isset($_POST["submit"])) {
                            $nama_event = $_POST["nama_event"];
                            $tanggal_event = $_POST["tanggal"];
                            $deskripsi_event = $_POST["deskripsi"];
                            $gambar_event = $_FILES["gambar_event"]["name"];
                            $status_event = $_POST["status_event"];
                            $sql = "INSERT INTO event SET nama_event = '$nama_event', tanggal";
                            $query = mysqli_query($koneksi, $sql);
                            if ($query) {
                                move_uploaded_file($_FILES["gambar_event"]["tmp_name"], "img/event/" . $_FILES["gambar_event"]["name"]);
                                echo "<script>alert('Data berhasil disimpan');window.location='daftar-event.php';</script>";
                            } else {
                                echo "<script>alert('Data gagal disimpan');window.location='insert-event.php';</script>";
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <label for="">Nama Event</label>
                            <input type="text" name="nama_event" id="nama_event" class="form-control"><br>
                            <label for="">Tanggal Event</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"><br>
                            <label for="">Deskripsi Event</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea><br>
                            <label for="">Gambar Event</label>
                            <input type="file" name="gambar_event" id="gambar_event" class="form-control"><br>
                            <label for="">Status Event</label>
                            <select name="status_event" id="status_event" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include "footer.php"; ?>