<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require('../config.php');
$nama           = "";
$paspor         = "";
$tempat         = "";
$tanggal_lahir  = "";
$gender         = "";
$alamat         = "";
$domisili       = "";
$pekerjaan      = "";
$hp             = "";
$email          = "";
$paket          = "";
$ayah           = "";
$ibu            = "";
$foto           = "";
$id_umroh       = "";
$status         = "";

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
require('header.php'); 
?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container ps-5 mt-5  justify-content-center">
            <div class="card">
                <h5 class="card-header  bg-primary bg-gradient text-light">Input Data Umroh</h5>
                <div class="card-body mt-4 mb-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                        <label for="firstname" class="col-form-label">Nama Lengkap</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                        <div  class="input-group input-group-sm mb-3 ">
                            <input type="text"  name="nama" value="<?php echo $nama ?>" class="form-control text-capitalize" required>
                        </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">No Paspor</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="text" name="paspor" value="<?php echo $paspor ?>" class="form-control " required>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Jenis Kelamin</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <select name="gender" class="form-select form-control" required>
                                    <option value="">--Pilih--</option>
                                    <option value="L" <?php echo ($gender == 'L') ? "selected": "" ?>>Laki-laki</option>
                                    <option value="P" <?php echo ($gender == 'P') ? "selected": "" ?>>Perempuan</option>
                                </select>  
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                        <label class="col-form-label">Tempat/Tanggal Lahir</label>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="text" name="tempat_lahir" value="<?php echo $tempat ?>" class="form-control " required>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir ?>" class="form-control " required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Alamat Lengkap(sesuai KTP)</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <textarea  name="alamat" class="form-control" rows="3" required><?php echo $alamat ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Alamat Sekarang</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <textarea name="domisili" class="form-control" rows="3" required><?php echo $domisili ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Pekerjaan</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="text" value="<?php echo $pekerjaan ?>" name="pekerjaan" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Nomor HP</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="text" value="<?php echo $hp ?>" name="hp" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Email</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="text" value="<?php echo $email ?>" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Nama Ibu Kandung</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="text" value="<?php echo $ibu ?>" name="ibu" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Nama Ayah Kandung</label>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-1">
                            <div  class="input-group input-group-sm mb-3 ">
                                <input type="text" value="<?php echo $ayah ?>" name="ayah" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-md-6 mb-1">
                            <label class="col-form-label">Paket Umroh</label>
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
<?php require('footer.php'); ?>
