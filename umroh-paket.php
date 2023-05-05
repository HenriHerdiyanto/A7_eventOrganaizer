<?php 
include "header.php"; 

// $judul="";

if(isset($_GET['p'])){
    $paket = $_GET['p'];
    if($paket == "1"){
        $judul = "Umroh Regular";
    }elseif($paket == "2"){
        $judul = "Umroh & Tour";
    }elseif($paket == "3"){
        $judul = "Halal Tour";
    }elseif($paket == "4"){
        $judul = "Haji plus";
    }
}
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
  /* padding-top: 2%;
  padding-bottom: 2%; */
  padding: 10px 100px ;
  margin:10px;
  border: 5px solid black;
  border-radius:10px;
  /* margin-top:5rem;
  margin-left:auto;
  margin-right:auto; */
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
      <div class=" text-white text-center w-auto">  
          <h1 class="judul "><?=$judul?></h1>
          <!-- <hr style="width:20%;height:5px;border-width:0;color:white;background-color:gray; margin-left: auto; margin-right: auto;" > -->
      </div>
    </div>
  </section>
  <!-- ======= About Section ======= -->
  <section id="about" class=" bg-white " >
    <div class="container ">
    
      <div class="row ms-1 me-1 d-flex justify-content-center">
        <?php 
        $sql_call = mysqli_query($koneksi,"SELECT * FROM paket where layanan='$judul'");
        $row = mysqli_num_rows($sql_call);
        while($data = mysqli_fetch_array($sql_call)){
        ?>
        <div class="col-sm-3 mb-3">
            <div class="card h-100">
                <img src="admin/assets/img/umroh/<?=$data['foto']?>" class="card-img-top h-50 w-auto" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center"><?=$data['nama']?></h5><hr>
                    <h6 class="text-start">Pendaftaran Mulai </h6>
                    <p> <?php 
                        $periode = explode(" -- ",$data['periode']);
                        echo "<i class='bi bi-calendar-week text-primary'></i> ".$periode[0];
                        ?></p>
                </div>
                <div class="card-footer ">
                    <div class="text-center">
                    <a href="umroh-detail.php?id=<?=$data['id'] ?>" ><div class="btn btn-outline-primary form-control fw-bold">LIHAT FASILITAS</div></a>
                    </div>
                </div>
            </div>
        </div>
            <?php } if($row < 1){ ?>
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="admin/assets/img/umroh/empty.png" class="img-fluid h-50 w-50" alt=""><br>
                    <h1>Belum Ada Paket Diposting</h1>
                </div>
            </div>
            <?php } ?>
      </div>

    </div>
  </section><!-- End About Section -->

 

</main><!-- End #main -->
<?php include "footer.php" ?>