<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$nama           = "";
// $paspor         = "";
// $tempat         = "";
// $tanggal_lahir  = "";
// $gender         = "";
// $alamat         = "";
// $domisili       = "";
// $pekerjaan      = "";
// $hp             = "";
$deskripsi          = "";
$paket          = "";
$berangkat           = "";
$layanan            = "";
$foto           = "";
$id_umroh       = "";
$status         = "";
$fasilitas      = "";

if(isset($_GET['id'])){
    $id_umroh = $_GET['id'];
    $proses  = $_GET['proses'];
    if($proses == "edit"){
        $query_call = mysqli_query($koneksi,"SELECT * FROM umroh where id = $id_umroh");
        $sql_call = mysqli_fetch_assoc($query_call);
        $nama           = $sql_call['nama'];
        $paspor         = $sql_call['paspor'];
        $tempat         = $sql_call['tempat_lahir'];
        $tanggal_lahir  = $sql_call['tanggal_lahir'];
        $gender         = $sql_call['gender'];
        $alamat         = $sql_call['alamat'];
        $domisili       = $sql_call['domisili'];
        $pekerjaan      = $sql_call['pekerjaan'];
        $hp             = $sql_call['hp'];
        $email          = $sql_call['email'];
        $paket          = $sql_call['paket'];
        $ayah           = $sql_call['ayah'];
        $ibu            = $sql_call['ibu'];
        $foto           = $sql_call['foto'];
        $status         = $sql_call['status']; 
    }
    elseif($proses == "delete"){
        $sql_delete = mysqli_query($koneksi,"DELETE FROM umroh where id = $id_umroh");
        if($sql_delete){
            echo "<script type='text/javascript'> 
            alert('Hapus Data Berhasil');
            window.location.replace('daftar-umroh.php');
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
    $nama           = $_POST['nama'];
    $paspor         = $_POST['paspor'];
    $tempat         = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $gender         = $_POST['gender'];
    $alamat         = $_POST['alamat'];
    $domisili       = $_POST['domisili'];
    $pekerjaan      = $_POST['pekerjaan'];
    $hp             = $_POST['hp'];
    $email          = $_POST['email'];
    $paket          = $_POST['paket'];
    $ayah           = $_POST['ayah'];
    $ibu            = $_POST['ibu'];
    $status         = $_POST['status'];

  $direktori= "assets/img/umroh/";
  $fileName = $_FILES['foto']['name'];
  move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$fileName);

  $sql_input = mysqli_query($koneksi,"INSERT INTO umroh SET nama='$nama', paspor='$paspor', tempat_lahir='$tempat', tanggal_lahir='$tanggal_lahir', gender='$gender', alamat='$alamat', domisili='$domisili', pekerjaan='$pekerjaan', hp='$hp', email='$email', paket='$paket', ayah='$ayah', ibu='$ibu', tanggal=DATE_FORMAT(CURDATE(),'%d-%m-%Y'), foto='$fileName', status='$status' ");

  if($sql_input){
    echo "<script type='text/javascript'> 
    alert('Input Data Berhasil');
    window.location.replace('daftar-umroh.php');
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
    $paspor         = $_POST['paspor'];
    $tempat         = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $gender         = $_POST['gender'];
    $alamat         = $_POST['alamat'];
    $domisili       = $_POST['domisili'];
    $pekerjaan      = $_POST['pekerjaan'];
    $hp             = $_POST['hp'];
    $email          = $_POST['email'];
    $paket          = $_POST['paket'];
    $ayah           = $_POST['ayah'];
    $ibu            = $_POST['ibu'];
    $status         = $_POST['status'];

    $direktori= "assets/img/umroh/";
    $fileName = $_FILES['foto']['name'];
    if(!empty($fileName) ){
      move_uploaded_file($_FILES['foto']['tmp_name'],$direktori.$fileName);
      $sql_edit = mysqli_query($koneksi,"UPDATE umroh SET nama='$nama', paspor='$paspor', tempat_lahir='$tempat', tanggal_lahir='$tanggal_lahir', gender='$gender', alamat='$alamat', domisili='$domisili', pekerjaan='$pekerjaan', hp='$hp', email='$email', paket='$paket', ayah='$ayah', ibu='$ibu', tanggal=DATE_FORMAT(CURDATE(),'%d-%m-%Y'), foto='$fileName', status='$status' where id = $id_umroh ");
    }else{
        $sql_edit = mysqli_query($koneksi,"UPDATE umroh SET nama='$nama', paspor='$paspor', tempat_lahir='$tempat', tanggal_lahir='$tanggal_lahir', gender='$gender', alamat='$alamat', domisili='$domisili', pekerjaan='$pekerjaan', hp='$hp', email='$email', paket='$paket', ayah='$ayah', ibu='$ibu', tanggal=DATE_FORMAT(CURDATE(),'%d-%m-%Y'), status='$status' where id = '$id_umroh' ");
    }

    if($sql_edit){
        echo "<script type='text/javascript'> 
        alert('Edit Data Berhasil');
        window.location.replace('daftar-umroh.php');
        </script>";
      exit;
    }else{
        echo "<script type='text/javascript'> 
        alert('Edit Data Gagal');
        window.location.replace('daftar-umroh.php');
        </script>";
      exit;
    }
}
echo "<br><br>";
require('header.php'); 
?>
<style>
.field_wrapper div {
    margin-bottom: 10px;
}
.remove_input_button {
    margin-top: 10px;
    margin-left: 15px;
    vertical-align: text-bottom;
}
.add_input_button {
    margin-top: 10px;
    margin-left: 10px;
    vertical-align: text-bottom;
}
</style>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="container justify-content-center">
                        <div class="card">
                            <h5 class="card-header  bg-primary bg-gradient text-light">Input Data Umroh</h5>
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
                                                <option value="L" <?php echo ($layanan == 'Umroh Regular') ? "selected": "" ?>>Umroh Regular</option>
                                                <option value="P" <?php echo ($layanan == 'Umroh & Tour') ? "selected": "" ?>>Umroh & Tour</option>
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
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="field_wrapper">
                                            <div>
                                                <div  class="input-group input-group-sm mb-3 ">
                                                    <input type="text" name="input_field[]" class="form-control" value="<?php echo $fasilitas ?>"/>
                                                    <a href="javascript:void(0);" class="add_input_button" title="Add field">
                                                    &nbsp;&nbsp;&nbsp;<i class="bi bi-plus-circle fs-4 text-primary"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Paket Hotel</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div  class="input-group input-group-sm mb-3 ">
                                            <select name="paket" class="form-select form-control" required>
                                                <option value="">--Pilih--</option>
                                                <option value="Quad" <?php echo ($paket == 'Quad') ? "selected": "" ?>>Quad</option>
                                                <option value="Triple" <?php echo ($paket == 'Triple') ? "selected": "" ?>>Triple</option>
                                                <option value="Double" <?php echo ($paket == 'Double') ? "selected": "" ?>>Double</option>
                                            </select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Tanggal Keberangkatan</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="field_wrapper">
                                            <div>
                                                <div  class="input-group input-group-sm mb-3 ">
                                                    <input type="text" name="input_field[]" class="form-control" value="<?php echo $berangkat ?>"/>
                                                    <a href="javascript:void(0);" class="add_input_button" title="Add field">
                                                    &nbsp;&nbsp;&nbsp;<i class="bi bi-plus-circle fs-4 text-primary"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-6 mb-1">
                                        <label class="col-form-label">Deskripsi</label>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="form-group">
                                            <label for="htmeditor">Body</label>
                                            <textarea id="htmeditor" name="body"><?php echo $body ?></textarea> <script src="https://htmeditor.com/js/htmeditor.min.js"      htmeditor_textarea="htmeditor"      full_screen="no"      editor_height="480"     run_local="no"> </script> 
                                        </div>
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
                                            <label class="col-form-label">Foto Profil</label>
                                        </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="input-group input-group-sm mb-3 ">
                                            <input type="file" name="foto"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                        <div class="col-xl-3 col-md-6 mb-1">
                                            <label class="col-form-label">Status Pembayaran</label>
                                        </div>
                                    <div class="col-xl-6 col-md-6 mb-1">
                                        <div class="input-group input-group-sm mb-3 ">
                                            <select name="status" class="form-select form-control" required>
                                                <option value="">--Pilih--</option>
                                                <option value="diangsur" <?php echo ($status == 'diangsur') ? "selected": "" ?>>diangsur</option>
                                                <option value="Lunas" <?php echo ($status == 'Lunas') ? "selected": "" ?>>Lunas</option>
                                            </select>  
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
		var new_field_html = '<div><input type="text" name="input_field[]" class="mt-3"  value=""/><a href="javascript:void(0);" class="remove_input_button" title="Remove field">&nbsp;&nbsp;&nbsp;<i class="bi bi-dash-circle text-primary fs-4"></i></a></div>';
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
	</script>
<?php require('footer.php'); ?>
