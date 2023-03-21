<?php require_once "header.php"; ?>
<main id="main" class="main">


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Event</h5>
                        <a href="insert-event.php" class="btn btn-primary">Tambah Event</a><br><br>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Event</th>
                                    <th>Tanggal Event</th>
                                    <th>Deskripsi Event</th>
                                    <th>Gambar Event</th>
                                    <th>Status Event</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM event";
                                $query = mysqli_query($koneksi, $sql);
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data["nama_event"]; ?></td>
                                        <td><?php echo $data["tanggal"]; ?></td>
                                        <td><?php echo $data["deskripsi"]; ?></td>
                                        <td><img src="image/<?php echo $data["gambar"]; ?>" alt="" width="100px"></td>
                                        <td><?php echo $data["status"]; ?></td>
                                        <td>
                                            <a href="edit-event.php?id=<?php echo $data["id_event"]; ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete-event.php?id=<?php echo $data["id_event"]; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include "footer.php"; ?>