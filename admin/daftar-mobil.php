<?php require_once "header.php"; ?>
<main id="main" class="main">


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Mobil</h5>
                        <a href="insert-mobil.php" class="btn btn-primary">Tambah Mobil</a><br><br>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mobil</th>
                                    <th>Plate Mobil</th>
                                    <th>Deskripsi Mobil</th>
                                    <th>Gambar Mobil</th>
                                    <th>Harga Paket 1</th>
                                    <th>Harga Paket 2</th>
                                    <th>Harga Paket 3</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM mobil";
                                $query = mysqli_query($koneksi, $sql);
                                $no = 1;
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data["nama_mobil"]; ?></td>
                                        <td><?php echo $data["plate"]; ?></td>
                                        <td><?php echo $data["deskripsi"]; ?></td>
                                        <td><img src="image/<?php echo $data["gambar"]; ?>" alt="" width="100px"></td>
                                        <td><?php echo $data["harga_p1"]; ?></td>
                                        <td><?php echo $data["harga_p2"]; ?></td>
                                        <td><?php echo $data["harga_p3"]; ?></td>

                                        <td>
                                            <a href="edit-mobil.php?id=<?php echo $data["id_mobil"]; ?>" class="btn btn-warning">Edit</a>
                                            <a href="delete-mobil.php?id=<?php echo $data["id_mobil"]; ?>" class="btn btn-danger">Delete</a>
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