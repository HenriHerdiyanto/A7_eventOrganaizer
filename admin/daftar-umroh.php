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
                                        <th colspan="2" >TTL</th>
                                        <th>Gender</th>
                                        <th>Alamat</th>
                                        <th>Domisili</th>
                                        <th>Pekerjaan</th>
                                        <th>Nomor Hp</th>
                                        <th>Email</th>
                                        <th>Paket</th>
                                        <th>Tanggal</th>
                                        <th>Foto</th>
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
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["ayah"]; ?></td>
                                            <td><?php echo $data["ibu"]; ?></td>
                                            <td><?php echo $data["paspor"]; ?></td>
                                            <td><?php echo $data["tempat_lahir"]; ?></td>
                                            <td><?php echo $data["tanggal_lahir"]; ?></td>
                                            <td>
                                                <?php 
                                                    if($data["gender"] == "L"){
                                                        echo "Laki-Laki";
                                                    }else{
                                                        echo "perempuan";
                                                    }
                                                 ?>
                                            </td>
                                            <td><?php echo $data["alamat"]; ?></td>
                                            <td><?php echo $data["domisili"]; ?></td>
                                            <td><?php echo $data["pekerjaan"]; ?></td>
                                            <td><?php echo $data["hp"]; ?></td>
                                            <td><?php echo $data["email"]; ?></td>
                                            <td><?php echo $data["paket"]; ?></td>
                                            <td><?php echo $data["tanggal"]; ?></td>
                                            <td><a href="assets/img/umroh/<?php echo $data["foto"]; ?>">Lihat Foto</a></td>
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