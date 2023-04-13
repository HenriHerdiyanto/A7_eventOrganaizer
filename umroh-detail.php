<?php 
include "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
// $sql_call = mysqli_query($koneksi,"SELECT paket.nama, hotel.nama as hotel, fasilitas.fasilitas, berangkat.tanggal FROM paket LEFT JOIN fasilitas ON paket.id = fasilitas.id_paket LEFT JOIN hotel ON paket.id = hotel.id_paket LEFT JOIN berangkat ON paket.id = berangkat.id_paket  where paket.id= $id ");
$sql_call = mysqli_query($koneksi,"SELECT * FROM paket where id = $id");
$row = mysqli_num_rows($sql_call);
$sql_call = mysqli_fetch_array($sql_call);


$sql_fasilitas = mysqli_query($koneksi,"SELECT * FROM fasilitas where id_paket = $id ");
$sql_hotel = mysqli_query($koneksi,"SELECT * FROM hotel where id_paket = $id ");
$sql_berangkat = mysqli_query($koneksi,"SELECT * FROM berangkat where id_paket = $id ");
?>
<style>
    .header{
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
        background-image:url('admin/assets/img/header-umroh.jpg');
    }
    .judul{
        /* width: 100px; */
    padding-top: 2%;
    padding-bottom: 2%;
    border: 5px solid black;
    border-radius:10px;
    margin-top:5rem;
    margin-left:auto;
    margin-right:auto;
    background-color:rgb(255,255,255);
    font-family: Oswald;
    font-size:3rem;
    font-weight:bold;
    animation: Color 4s linear infinite;
    -webkit-animation: Color 4s ease-in-out infinite;
    text-shadow: 10px 10px #F0F0F0;
    }


    @keyframes Color{
    0%{
        color:#000;
    }
    
    40%{
        color:#00BFFF;
    }
    60%{
        color:#AC92EC;
    }
    100%{
        color:#000;
    }
    }

    @-moz-keyframes Color{
    0%{
        color:#000;
    }
    
    40%{
        color:#00BFFF;
    }
    60%{
        color:#AC92EC;
    }
    100%{
        color:#000;
    }
    }

    @-webkit-keyframes Color{
    0%{
        color:#000;
    }

    40%{
        color:#00BFFF;
    }

    60%{
        color:#AC92EC;
    }
    100%{
        color:#000;
    }
    }
</style>
<main id="main">

  <section class="header">
    <div class="d-flex justify-content-center">
      <div class=" text-white text-center w-50 h-25">  
          <!-- <h1 class="judul ">Layanan Umroh & Haji</h1> -->
          <!-- <hr style="width:20%;height:5px;border-width:0;color:white;background-color:gray; margin-left: auto; margin-right: auto;" > -->
      </div>
    </div>
  </section>
  <!-- ======= About Section ======= -->
  <section id="about" class=" bg-white " >
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                 <img src="admin/assets/img/umroh/<?=$sql_call['foto']?>" class=" w-100 img-fluid rounded" alt="">
            </div>
            <div class="col-sm-7">
                <h1><?=$sql_call['nama']?></h1><hr>
                <h4>Fasilitas</h4>
                <ul>
                    <?php
                    foreach($sql_fasilitas as $value => $key){
                        echo "<li>".$key['fasilitas']."</li>";
                     }
                     ?>
                </ul><br>

                <h4>Paket Hotel</h4>
                <ul>
                    <?php
                    foreach($sql_hotel as $value => $key){
                        echo "<li>".$key['nama']."</li>";
                     }
                     ?>
                </ul><br>

                <h4>Tanggal Keberangkatan</h4>
                <ul>
                    <?php
                    foreach($sql_berangkat as $value => $key){
                        echo "<li>".$key['tanggal']."</li>";
                     }
                     ?>
                </ul>
                <hr><h3>Deskripsi</h3>
                <p><?=$sql_call['deskripsi']?></p>
                <div class="text-end text-danger">
                    <h2 class="fw-bold"><?= "Rp ".number_format($sql_call['harga'],0,",",".")?></h2>
                </div>
            </div>
        </div>
    

    </div>
  </section><!-- End About Section -->

 

</main><!-- End #main -->
<?php include "footer.php" ?>