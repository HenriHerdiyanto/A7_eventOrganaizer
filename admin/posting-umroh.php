<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require('header.php'); 

$nama           = "";
// $paspor         = "";
// $tempat         = "";
// $tanggal_lahir  = "";
// $gender         = "";
// $alamat         = "";
// $domisili       = "";
// $pekerjaan      = "";
// $hp             = "";
$deskripsi      = "";
$hotel          = "";
$berangkat      = "";
$layanan        = "";
$foto           = "";
$id_umroh       = "";
$status         = "";
$fasilitas      = "";
$foto_umroh     ="";

if(isset($_GET['id'])){
    $id_umroh = $_GET['id'];
    $proses  = $_GET['proses'];
    if($proses == "edit"){
        $query_call = mysqli_query($koneksi,"SELECT * FROM paket where id = $id_umroh");
        $sql_call = mysqli_fetch_assoc($query_call);
        $nama           = $sql_call['nama'];
        $layanan        = $sql_call['layanan'];
        $deskripsi      = $sql_call['deskripsi'];
        $harga          = $sql_call['harga'];

        // $fasilitas      = $_sql_call['fasilitas'];
        // $hotel          = $_sql_call['hotel'];
        // $berangkat      = $_sql_call['berangkat'];
    }
    elseif($proses == "delete"){
        $sql_fasilitas = mysqli_query($koneksi,"SELECT * FROM fasilitas where id_paket = $id_umroh ");
        $sql_hotel = mysqli_query($koneksi,"SELECT * FROM hotel where id_paket = $id_umroh ");
        $sql_berangkat = mysqli_query($koneksi,"SELECT * FROM berangkat where id_paket = $id_umroh ");

        foreach($sql_fasilitas as $value => $key){
            $sql_delete = mysqli_query($koneksi,"DELETE FROM fasilitas where id_paket = $id_umroh");
          
        }
        foreach($sql_hotel as $value => $key){
            $sql_delete = mysqli_query($koneksi,"DELETE FROM hotel where id_paket = $id_umroh");
            echo "<div class='bg-secondary text-white border border-white'>".$key['nama']."</div>";
         }
         foreach($sql_berangkat as $value => $key){
            $sql_delete = mysqli_query($koneksi,"DELETE FROM berangkat where id_paket = $id_umroh");
         }
         $sql_delete = mysqli_query($koneksi,"DELETE FROM paket where id = $id_umroh");

        if($sql_delete){
            echo "<script type='text/javascript'> 
            alert('Hapus Data Berhasil');
            window.location.replace('list-umroh.php');
            </script>";
        exit;
        }else{
            echo "<script type='text/javascript'> 
            alert('Hapus Data Berhasil');
            window.location.replace('daftar-umroh.php');
            </script>";
        exit;
        }
    }
}

if(isset($_POST['input'])){
    $kode           = $_POST['kode'];
    $nama           = $_POST['nama'];
    $layanan        = $_POST['layanan'];
    $deskripsi      = $_POST['desk'];
    $harga          = $_POST['harga'];
    $harga_umroh    = str_replace(".","",$harga);
    $fasilitas      = $_POST['fasilitas'];
    $hotel          = $_POST['hotel'];
    $berangkat      = $_POST['berangkat'];

  $direktori= "assets/img/umroh/";
  $fileName = $_FILES['foto']['name'];
  move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$fileName);

  $sql_input = mysqli_query($koneksi,"INSERT INTO paket SET nama='$nama', deskripsi='$deskripsi', layanan='$layanan', harga='$harga_umroh', foto='$fileName', kode='$kode'");

  if($sql_input){
    $sql_umroh = mysqli_query($koneksi,"SELECT * FROM paket where kode = '$kode'");
    $umroh_sql = mysqli_fetch_assoc($sql_umroh);
    $number = $umroh_sql['id'];
    foreach($fasilitas as $key => $value){
        echo $value."<br>";
        $sql = mysqli_query($koneksi,"INSERT INTO fasilitas SET fasilitas='$value', id_paket='$number'");
        
    }
    foreach($hotel as $key => $value){
        echo $value."<br>";
        $sql = mysqli_query($koneksi,"INSERT INTO hotel SET nama='$value', id_paket='$number'");
        
    }
    foreach($berangkat as $key => $value){
        echo $value."<br>";
        $sql = mysqli_query($koneksi,"INSERT INTO berangkat SET tanggal='$value', id_paket='$number'");
        
    }
    echo "<script type='text/javascript'> 
    alert('Input Data Berhasil');
    window.location.replace('list-umroh.php');
    </script>";
    exit;
  }else{
    echo "<script type='text/javascript'> 
    alert('Input Data Gagal');
    window.location.replace('daftar-umroh.php');
      </script>";
    exit;
  }
}elseif(isset($_POST['edit'])){
    $nama           = $_POST['nama'];
    $layanan        = $_POST['layanan'];
    $deskripsi      = $_POST['desk'];
    $harga          = $_POST['harga'];
    $harga_umroh    = str_replace(".","",$harga);
    $fasilitas      = $_POST['fasilitas'];
    $hotel          = $_POST['hotel'];
    $berangkat      = $_POST['berangkat'];

  $direktori= "assets/img/umroh/";
  $fileName = $_FILES['foto']['name'];
  move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$fileName);
  if(!empty($fileName)){
    $foto_umroh = ", foto='$fileName'";
  }

  $sql_edit = mysqli_query($koneksi,"UPDATE paket SET nama='$nama', deskripsi='$deskripsi', layanan='$layanan', harga='$harga_umroh' ".$foto_umroh."  WHERE id = $id_umroh");

  if($sql_edit){
    $sql_fasilitas = mysqli_query($koneksi,"SELECT * FROM fasilitas where id_paket = $id_umroh ");
    $sql_hotel = mysqli_query($koneksi,"SELECT * FROM hotel where id_paket = $id_umroh ");
    $sql_berangkat = mysqli_query($koneksi,"SELECT * FROM berangkat where id_paket = $id_umroh ");

    foreach($sql_fasilitas as $value => $key){
        $sql_delete = mysqli_query($koneksi,"DELETE FROM fasilitas where id_paket = $id_umroh");
      
    }
    foreach($sql_hotel as $value => $key){
        $sql_delete = mysqli_query($koneksi,"DELETE FROM hotel where id_paket = $id_umroh");
     }
     foreach($sql_berangkat as $value => $key){
        $sql_delete = mysqli_query($koneksi,"DELETE FROM berangkat where id_paket = $id_umroh");
     }
    
    foreach($fasilitas as $key => $value){
        if ($value != ""){
            $sql = mysqli_query($koneksi,"INSERT INTO fasilitas SET fasilitas='$value', id_paket='$id_umroh'");
        } 
        
    }
    foreach($hotel as $key => $value){
        if ($value != ""){
        $sql = mysqli_query($koneksi,"INSERT INTO hotel SET nama='$value', id_paket='$id_umroh'");
        }
        
    }
    foreach($berangkat as $key => $value){
        if ($value != ""){
        $sql = mysqli_query($koneksi,"INSERT INTO berangkat SET tanggal='$value', id_paket='$id_umroh   '");
        }
        
    }
        echo "<script type='text/javascript'> 
        alert('Edit Data Berhasil');
        window.location.replace('list-umroh.php');
        </script>";
        exit;
    }else{
        echo "<script type='text/javascript'> 
        alert('Edit Data Gagal');
       
        </script>";
      exit;
    }
}


?>
<style>
.field_wrapper div {
    margin-bottom: 5px;
}
/* .remove_input_button {
    margin-top: 10px;
    margin-left: 15px;
    vertical-align: text-bottom;
}
.add_input_button {
    margin-top: 10px;
    margin-left: 10px;
    vertical-align: text-bottom;
} */
</style>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="container justify-content-center">
                        <div class="card h-auto">
                            <h5 class="card-header  bg-primary bg-gradient text-light">Input Data Umroh</h5>
                            <?php $random = rand(); ?>
                            <input type="hidden" name="kode" value="<?php echo $random ?>">
                            <div class="card-body mt-4 mb-4">
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                    <label for="firstname" class="col-form-label">Nama Paket</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                    <div  class="input-group input-group-sm mb-3 ">
                                        <input type="text"  name="nama" value="<?php echo $nama ?>" class="form-control text-capitalize" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Layanan</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="input-group input-group-sm mb-3 ">
                                            <select name="layanan" class="form-select form-control" required>
                                                <option value="">--Pilih--</option>
                                                <option value="Umroh Regular" <?php echo ($layanan == 'Umroh Regular') ? "selected": "" ?>>Umroh Regular</option>
                                                <option value="Umroh & Tour" <?php echo ($layanan == 'Umroh & Tour') ? "selected": "" ?>>Umroh & Tour</option>
                                                <option value="Halal Tour" <?php echo ($layanan == 'Halal Tour') ? "selected": "" ?>>Halal Tour</option>
                                                <option value="Haji Plus" <?php echo ($layanan == 'Haji Plus') ? "selected": "" ?>>Haji Plus</option>
                                            </select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Fasilitas</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <div class="field_wrapper">
                                            <div  class="input-group input-group-sm mb-3 ">
                                                <input type="text" name="fasilitas[]" class="form-control" value="<?php echo $fasilitas ?>"/>
                                                <a href="javascript:void(0);" class="add_input_button" title="Add field">
                                                    &nbsp;&nbsp;&nbsp;<i class="bi bi-plus-circle fs-4 text-primary"></i>
                                                </a>
                                            </div>
                                            <?php 
                                            if(isset( $_GET['proses'])){
                                                $sql_fasilitas = mysqli_query($koneksi,"SELECT * FROM fasilitas where id_paket = $id_umroh ");
                                                $row = mysqli_num_rows($sql_fasilitas);

                                                foreach($sql_fasilitas as $value => $key){
                                                    $fasilitas  = $key['fasilitas'];
                                            ?>
                                            <div  class="input-group input-group-sm mb-3 ">
                                                <input type="text" name="fasilitas[]" class="form-control" value="<?php echo $fasilitas ?>"/>
                                                <a href="javascript:void(0);" class="remove_input_button" title="Remove field">
                                                    &nbsp;&nbsp;&nbsp;<i class="bi bi-dash-circle text-danger fs-4"></i>
                                                </a>
                                           </div>
                                           <?php 
                                            } } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Paket Hotel</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <div class="field_hotel">
                                            <div  class="input-group input-group-sm mb-3 ">
                                                <input type="text" name="hotel[]" class="form-control" />
                                                <a href="javascript:void(0);" class="add_input_hotel" title="Add field">
                                                    &nbsp;&nbsp;&nbsp;<i class="bi bi-plus-circle fs-4 text-primary"></i>
                                                </a>
                                            </div>
                                            <?php 
                                            if(isset( $_GET['proses'])){
                                                $sql_hotel = mysqli_query($koneksi,"SELECT * FROM hotel where id_paket = $id_umroh ");
                                                $row = mysqli_num_rows($sql_hotel);
                                               
                                                foreach($sql_hotel as $value => $key){
                                                    $hotel  = $key['nama'];
                                            ?>
                                            <div  class="input-group input-group-sm mb-3 ">
                                                <input type="text" name="hotel[]" class="form-control" value="<?php echo $hotel ?>"/>
                                                <a href="javascript:void(0);" class="remove_input_button" title="Remove field">
                                                    &nbsp;&nbsp;&nbsp;<i class="bi bi-dash-circle text-danger fs-4"></i>
                                                </a>
                                           </div>
                                            <?php 
                                            } } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Tanggal Keberangkatan</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <div class="field_waktu">
                                            <div  class="input-group input-group-sm mb-3 ">
                                               <input type="date" name="berangkat[]" class="form-control" value="<?php echo $berangkat ?>"/>
                                               <a href="javascript:void(0);" class="add_input_waktu" title="Add field">
                                               &nbsp;&nbsp;&nbsp;<i class="bi bi-plus-circle fs-4 text-primary"></i>
                                               </a>
                                           </div>
                                           <?php 
                                            if(isset( $_GET['proses'])){
                                                $sql_berangkat = mysqli_query($koneksi,"SELECT * FROM berangkat where id_paket = $id_umroh ");
                                                $row = mysqli_num_rows($sql_berangkat);
                                               
                                                foreach($sql_berangkat as $value => $key){
                                                    $berangkat  = $key['tanggal'];
                                            ?>
                                           <div  class="input-group input-group-sm mb-3 ">
                                                <input type="date" name="berangkat[]" class="form-control" value="<?php echo $berangkat ?>"/>
                                                <a href="javascript:void(0);" class="remove_input_button" title="Remove field">&nbsp;&nbsp;&nbsp;<i class="bi bi-dash-circle text-danger fs-4"></i></a>
                                            </div>
                                            <?php } }?> 
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Deskripsi</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-4">
                                        <textarea name="desk" id="summernote"><?php echo $deskripsi ?></textarea>
                                    </div>
                                </div>
                                <?php if($id_umroh != "" && $foto != ""){ ?>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1"></div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                    <div class="text-start p-1 ">
                                        <a href="assets/img/umroh/<?php echo $foto ?>">
                                            <img src="assets/img/umroh/<?php echo $foto ?>" class="w-25 p-1 rounded border border-secondary" alt="<?php echo $foto ?>">
                                        </a>
                                    </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="row justify-content-center">
                                        <div class="col-xl-3 col-md-6 mb-1">
                                            <label class="col-form-label">Foto Paket</label>
                                        </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="input-group input-group-sm mb-3 ">
                                            <input type="file" name="foto"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                        <div class="col-xl-3 col-md-6 mb-1">
                                            <label class="col-form-label">Harga</label>
                                        </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="input-group input-group-sm mb-3 ">
                                           <input type="text" name="harga" id="harga" value="<?php echo $harga ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-5 col-md-6 mb-1 "></div>
                                    <?php 
                                        if(empty($id_umroh)){
                                    echo "<div class='col-xl-4 col-md-6 mb-5 text-end '>";
                                    echo "<button type='submit' class='btn btn-primary form-control fw-bold text-uppercase' name='input'>Input</button>";
                                    echo "</div>";
                                    }else{
                                    echo "<div class='col-xl-2 col-md-6 mb-5 text-end  >";
                                    echo "<a href='data-karyawan.php' class='text-decoration-none text-light'><button class='btn btn-danger form-control fw-bold text-uppercase'>Batal</button></a>";
                                    echo "</div>";
                                    echo "<div class='col-xl-2 col-md-6 mb-5 text-end ' >";
                                    echo "<button type='submit' class='btn btn-primary form-control fw-bold text-uppercase' name='edit'>Simpan</button>";
                                    echo "</div>";
                                        }
                                    ?>
                                </div>
                                <?php 
                                $result = mysqli_query($koneksi,"SELECT * FROM umroh");
                                $keynames = array('foo', 'bar', 'baz');
                                $idx = 0;
                                while($row = mysqli_fetch_assoc($result)) {
                                   $dataArray[$keynames[$idx]] = $row;
                                   $idx++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
</main>
    <script type="text/javascript">
		$(document).ready(function(){
            var max_fields = 10;
            var add_input_button = $('.add_input_button');
            var field_wrapper = $('.field_wrapper');
            var new_field_html = '<div><div class="input-group input-group-sm mb-2"><input type="text" name="fasilitas[]" class=" form-control"  value=""/><a href="javascript:void(0);" class="remove_input_button" title="Remove field">&nbsp;&nbsp;&nbsp;<i class="bi bi-dash-circle text-danger fs-4"></i></a></div></div>';
            var input_count = 1; 
            // Add button dynamically
            $(add_input_button).click(function(){
                if(input_count < max_fields){
                    input_count++; 
                    $(field_wrapper).append(new_field_html); 
                }
            });
                // Remove dynamically added button
                $(field_wrapper).on('click', '.remove_input_button', function(e){
                    e.preventDefault();
                    $(this).parent('div').remove();
                    input_count--;
                });

		});

		$(document).ready(function(){
            var max_fields = 10;
            var add_input_button = $('.add_input_waktu');
            var field_wrapper = $('.field_waktu');
            var new_field_html = '<div><div class="input-group input-group-sm mb-2"><input type="date" name="berangkat[]" class=" form-control"  value=""/><a href="javascript:void(0);" class="remove_input_button" title="Remove field">&nbsp;&nbsp;&nbsp;<i class="bi bi-dash-circle text-danger fs-4"></i></a></div></div>';
            var input_count = 1; 
            // Add button dynamically
            $(add_input_button).click(function(){
                if(input_count < max_fields){
                    input_count++; 
                    $(field_wrapper).append(new_field_html); 
                }
            });
                // Remove dynamically added button
                $(field_wrapper).on('click', '.remove_input_button', function(e){
                    e.preventDefault();
                    $(this).parent('div').remove();
                    input_count--;
                });
		});

        $(document).ready(function(){
            var max_fields = 10;
            var add_input_button = $('.add_input_hotel');
            var field_wrapper = $('.field_hotel');
            var new_field_html = '<div><div class="input-group input-group-sm mb-2"><input type="text" name="hotel[]" class=" form-control"  value=""/><a href="javascript:void(0);" class="remove_input_button" title="Remove field">&nbsp;&nbsp;&nbsp;<i class="bi bi-dash-circle text-danger fs-4"></i></a></div></div>';
            var input_count = 1; 
            // Add button dynamically
            $(add_input_button).click(function(){
                if(input_count < max_fields){
                    input_count++; 
                    $(field_wrapper).append(new_field_html); 
                }
            });
                // Remove dynamically added button
                $(field_wrapper).on('click', '.remove_input_button', function(e){
                    e.preventDefault();
                    $(this).parent('div').remove();
                    input_count--;
                });
		});

        var rupiah = document.getElementById('harga');
        rupiah.addEventListener('keyup', function (e) {
            rupiah.value = formatRupiah(this.value);
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
	</script>
<?php require('footer.php'); ?>
