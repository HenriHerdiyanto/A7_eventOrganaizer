<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require_once "header.php";
?>
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Insert Event</h5>
                        <?php
                        if (isset($_POST["submit"])) {
                            $nama_event = $_POST["nama_event"];
                            $tanggal_event = $_POST["tanggal_event"];
                            $deskripsi_event = $_POST["deskripsi_event"];
                            $status_event = $_POST["status_event"];
                            $filename = $_FILES['gambar']['name'];
                            // JIKA SEMUANYA TIDAK KOSONG
                            $filetmpname = $_FILES['gambar']['tmp_name'];
                            $folder = 'image/';
                            // GAMBAR DI SIMPAN KE DALAM FOLDER
                            move_uploaded_file($filetmpname, $folder . $filename);
                            $sql = "INSERT INTO event (nama_event, tanggal, deskripsi, gambar, status) VALUES ('$nama_event', '$tanggal_event', '$deskripsi_event', '$filename', '$status_event')";
                            $query = mysqli_query($koneksi, $sql);
                            // var_dump($query);
                            if ($query) {
                                echo "<script>alert('Data berhasil disimpan');window.location='daftar-event.php';</script>";
                            } else {
                                echo "<script>alert('Data gagal disimpan');window.location='insert-event.php';</script>";
                            }
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="">Nama Event</label>
                            <input type="text" name="nama_event" id="nama_event" class="form-control"><br>
                            <label for="">Tanggal Event</label>
                            <input type="date" name="tanggal_event" id="tanggal_event" class="form-control"><br>
                            <label for="">Deskripsi Event</label>
                            <textarea name="deskripsi_event" id="deskripsi_event" cols="30" rows="10" class="form-control"></textarea><br>
                            <label for="">Gambar Event</label>
                            <input type="file" name="gambar" class="form-control"><br>
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