<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require_once "header.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM event WHERE id_event = '$_GET[id]'");
?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Event</h5>
                        <?php
                        if (isset($_POST['submit'])) {
                            $nama_event = $_POST['nama_event'];
                            $tanggal_event = $_POST['tanggal_event'];
                            $deskripsi_event = $_POST['deskripsi_event'];
                            $status_event = $_POST['status_event'];
                            $gambar = $_FILES['gambar']['name'];
                            $tmp = $_FILES['gambar']['tmp_name'];
                            $gambarbaru = date('dmYHis') . $gambar;
                            $path = "image/" . $gambarbaru;
                            if (move_uploaded_file($tmp, $path)) {
                                $query = mysqli_query($koneksi, "UPDATE event SET nama_event='$nama_event', tanggal='$tanggal_event', deskripsi='$deskripsi_event', gambar='$gambarbaru', status='$status_event' WHERE id_event='$id'");
                                if ($query) {
                                    echo "<script>alert('Data berhasil diupdate');window.location='daftar-event.php';</script>";
                                } else {
                                    echo "<script>alert('Data gagal diupdate');window.location='daftar-event.php';</script>";
                                }
                            } else {
                                $query = mysqli_query($koneksi, "UPDATE event SET nama_event='$nama_event', tanggal='$tanggal_event', deskripsi='$deskripsi_event', status='$status_event' WHERE id_event='$id'");
                                if ($query) {
                                    echo "<script>alert('Data berhasil diupdate');window.location='daftar-event.php';</script>";
                                } else {
                                    echo "<script>alert('Data gagal diupdate');window.location='daftar-event.php';</script>";
                                }
                            }
                        }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <label for="">Nama Event</label>
                                <input type="text" name="nama_event" id="nama_event" class="form-control" value="<?php echo $data['nama_event']; ?>"><br>
                                <label for="">Tanggal Event</label>
                                <input type="date" name="tanggal_event" id="tanggal_event" class="form-control" value="<?php echo $data['tanggal']; ?>"><br>
                                <label for="">Deskripsi Event</label>
                                <textarea name="deskripsi_event" id="deskripsi_event" cols="30" rows="10" class="form-control"><?php echo $data['deskripsi']; ?></textarea><br>
                                <img src="image/<?php echo $data['gambar']; ?>" alt=""><br>
                                <input type="file" name="gambar" class="form-control"><br>
                                <label for="">Status Event</label>
                                <select name="status_event" id="status_event" class="form-control">
                                    <option><?php echo $data['status']; ?></option>
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
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