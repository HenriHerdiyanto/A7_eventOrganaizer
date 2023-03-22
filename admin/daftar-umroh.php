<?php require_once "header.php"; ?>
<main id="main" class="main">


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Umroh</h5>
                        <a href="umroh.php" class="btn btn-primary">Tambah Data</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Ayah Kandung</th>
                                        <th>Ibu Kandung</th>
                                        <th>Nomor Paspor</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM umroh";
                                    $query = mysqli_query($koneksi, $sql);
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["ayah"]; ?></td>
                                            <td><?php echo $data["ibu"]; ?></td>
                                            <td><?php echo $data["paspor"]; ?></td>
                                            <td>
                                                <a href="umroh.php?id=<?php echo $data["id"]; ?>&proses=edit" class="btn btn-warning">Edit</a>
                                                <a href="umroh.php?id=<?php echo $data["id"]; ?>&proses=edit" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include "footer.php"; ?>