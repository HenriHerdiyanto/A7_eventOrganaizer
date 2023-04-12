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
                        <h5 class="card-title">Insert Mobil</h5>
                        <?php
                        if (isset($_POST["submit"])) {
                            $nama_mobil = $_POST["nama_mobil"];
                            $plate_mobil = $_POST["plate_mobil"];
                            $deskripsi_mobil = $_POST["deskripsi_mobil"];
                            $harga_pkt1 = $_POST["harga_pkt1"];
                            $harga_pkt2 = $_POST["harga_pkt2"];
                            $harga_pkt3 = $_POST["harga_pkt3"];
                            $filename = $_FILES['gambar']['name'];
                            // JIKA SEMUANYA TIDAK KOSONG
                            $filetmpname = $_FILES['gambar']['tmp_name'];
                            $folder = 'image/';
                            // GAMBAR DI SIMPAN KE DALAM FOLDER
                            move_uploaded_file($filetmpname, $folder . $filename);
                            $sql = "INSERT INTO mobil (nama_mobil, plate, deskripsi, gambar, harga_p1, harga_p2, harga_p3) VALUES ('$nama_mobil', '$plate_mobil', '$deskripsi_mobil', '$filename', '$harga_pkt1', '$harga_pkt2', '$harga_pkt3')";
                            $query = mysqli_query($koneksi, $sql);
                            // var_dump($query);
                            if ($query) {
                                echo "<script>alert('Data berhasil disimpan');window.location='daftar-mobil.php';</script>";
                            } else {
                                echo "<script>alert('Data gagal disimpan');window.location='insert-mobil.php';</script>";
                            }
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <label for="">Nama Mobil</label>
                            <input type="text" name="nama_mobil" id="nama_mobil" class="form-control"><br>
                            <label for="">Plate Mobil</label>
                            <input type="text" name="plate_mobil" id="plate_mobil" class="form-control"><br>
                            <label for="">Deskripsi Mobil</label>
                            <textarea name="deskripsi_mobil" id="deskripsi_mobil" cols="30" rows="10" class="form-control"></textarea><br>
                            <label for="">Gambar Mobil</label>
                            <input type="file" name="gambar" class="form-control"><br>
                            <label for="">Harga Paket 1</label>
                            <input type="text" name="harga_pkt1" id="harga_pkt1" class="form-control"><br>
                            <label for="">Harga Paket 2</label>
                            <input type="text" name="harga_pkt2" id="harga_pkt2" class="form-control"><br>
                            <label for="">Harga Paket 3</label>
                            <input type="text" name="harga_pkt3" id="harga_pkt3" class="form-control"><br>
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