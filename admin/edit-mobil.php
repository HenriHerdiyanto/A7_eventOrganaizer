<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require_once "header.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mobil WHERE id_mobil = '$_GET[id]'");
?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Mobil</h5>
                        <?php
                        if (isset($_POST['submit'])) {
                            $nama_mobil = $_POST['nama_mobil'];
                            $plate_mobil = $_POST['plate_mobil'];
                            $deskripsi_mobil = $_POST['deskripsi_mobil'];
                            $harga_mobil = $_POST['harga_mobil'];
                            $gambar = $_FILES['gambar']['name'];
                            $tmp = $_FILES['gambar']['tmp_name'];
                            $gambarbaru = date('dmYHis') . $gambar;
                            $path = "image/" . $gambarbaru;
                            if (move_uploaded_file($tmp, $path)) {
                                $query = mysqli_query($koneksi, "UPDATE mobil SET nama_mobil='$nama_mobil', plate='$plate_mobil', deskripsi='$deskripsi_mobil', gambar='$gambarbaru', harga='$harga_mobil' WHERE id_mobil='$id'");
                                if ($query) {
                                    echo "<script>alert('Data berhasil diupdate');window.location='daftar-mobil.php';</script>";
                                } else {
                                    echo "<script>alert('Data gagal diupdate');window.location='daftar-mobil.php';</script>";
                                }
                            } else {
                                $query = mysqli_query($koneksi, "UPDATE mobil SET nama_mobil='$nama_mobil', plate='$plate_mobil', deskripsi='$deskripsi_mobil', harga='$harga_mobil' WHERE id_mobil='$id'");
                                if ($query) {
                                    echo "<script>alert('Data berhasil diupdate');window.location='daftar-mobil.php';</script>";
                                } else {
                                    echo "<script>alert('Data gagal diupdate');window.location='daftar-mobil.php';</script>";
                                }
                            }
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <label for="">Nama Mobil</label>
                                <input type="text" name="nama_mobil" id="nama_mobil" class="form-control" value="<?php echo $data['nama_mobil']; ?>"><br>
                                <label for="">Plate Mobil</label>
                                <input type="text" name="plate_mobil" id="plate_mobil" class="form-control" value="<?php echo $data['plate']; ?>"><br>
                                <label for="">Deskripsi Mobil</label>
                                <textarea name="deskripsi_mobil" id="deskripsi_mobil" cols="30" rows="10" class="form-control"><?php echo $data['deskripsi']; ?></textarea><br>
                                <img src="image/<?php echo $data['gambar']; ?>" alt=""><br>
                                <input type="file" name="gambar" class="form-control"><br>
                                <label for="">Harga Mobil</label>
                                <input type="text" name="harga_mobil" id="harga_mobil" class="form-control"><br>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?php
require_once "footer.php";
?>