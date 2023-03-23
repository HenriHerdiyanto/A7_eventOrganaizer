<?php require_once "header.php"; ?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Umroh</h5>
                        <a href="paket-umroh.php" class="btn btn-primary">Tambah Data</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Ayah Kandung</th>
                                        <th>Ibu Kandung</th>
                                        <th>Nomor Paspor</th>
                                        <th>Status</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM umroh";
                                    $query  = mysqli_query($koneksi, $sql);
                                    $row    = mysqli_num_rows($query);
                                    $no = 1;
                                    if($row > 0){
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["ayah"]; ?></td>
                                            <td><?php echo $data["ibu"]; ?></td>
                                            <td><?php echo $data["paspor"]; ?></td>
                                            <td><?php
                                                if($data['status'] != "Lunas"){
                                                echo "<div class='bg-info text-light fw-bold rounded p-1'>".$data['status']."</div>" ;
                                                }else{
                                                    echo "<div class='bg-success text-light fw-bold rounded p-1'>".$data['status']."</div>" ;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="umroh.php?id=<?php echo $data["id"]; ?>&proses=edit" class="btn btn-warning">Edit</a>
                                                <a href="umroh.php?id=<?php echo $data["id"]; ?>&proses=delete" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } }else{?>
                                    <tr>
                                        <td colspan="7" class="text-center fw-bold text-primary">
                                            <img src="assets/img/bg-empty.png" style="width:50%;height:50%;" alt="bg-empty.png">
                                            <h1><b>Data Kosong</b></h1>
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