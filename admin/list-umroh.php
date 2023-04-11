<?php require_once "header.php"; ?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Paket Umroh</h5>
                        <a href="posting-umroh.php" class="btn btn-primary">Posting Baru</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Layanan</th>
                                        <th>Fasilitas</th>
                                        <th>Paket Hotel</th>
                                        <th>Keberangkatan</th>
                                        <th>Foto</th>
                                        <th>harga</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM paket";
                                    $query  = mysqli_query($koneksi, $sql);
                                    $row    = mysqli_num_rows($query);
                                    $no = 1;
                                    if($row > 0){
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_paket = $data['id'];

                                        $sql_fasilitas = mysqli_query($koneksi,"SELECT * FROM fasilitas where id_paket = $id_paket ");
                                        $sql_hotel = mysqli_query($koneksi,"SELECT * FROM hotel where id_paket = $id_paket ");
                                        $sql_berangkat = mysqli_query($koneksi,"SELECT * FROM berangkat where id_paket = $id_paket ");
                                        
                                    ?>
                                        <tr class="text-center">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["layanan"]; ?></td>
                                            <td><?php
                                                 foreach($sql_fasilitas as $value => $key){
                                                    echo "<div class='bg-secondary text-white border border-white'>".$key['fasilitas']."</div>";
                                                 }
                                                 ?>
                                            </td>
                                            <td><?php
                                                 foreach($sql_hotel as $value => $key){
                                                    echo "<div class='bg-secondary text-white border border-white'>".$key['nama']."</div>";
                                                 }
                                                 ?>
                                            </td>
                                            <td><?php
                                                 foreach($sql_berangkat as $value => $key){
                                                    echo "<div class='bg-secondary text-white border border-white'>".$key['tanggal']."</div>";
                                                 }
                                                 ?>
                                            </td>

                                            <td><a href="assets/img/umroh/<?php echo $data["foto"]; ?>">Priview</a></td>
                                            <td><?php echo number_format($data["harga"],0,",",".") ?></td>
                                            <td>
                                                <a href="posting-umroh.php?id=<?php echo $data["id"]; ?>&proses=edit" class="btn btn-warning ">Edit</a>
                                                <a href="posting-umroh.php?id=<?php echo $data["id"]; ?>&proses=delete" class="btn btn-danger">Delete</a>
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