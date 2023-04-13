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
    button,
button::after {
 padding: 16px 20px;
 font-size: 18px;
 background: linear-gradient(45deg, transparent 5%, #ff013c 5%);
 border: 0;
 color: #fff;
 letter-spacing: 3px;
 line-height: 1;
 box-shadow: 6px 0px 0px #00e6f6;
 outline: transparent;
 position: relative;
}

button::after {
 --slice-0: inset(50% 50% 50% 50%);
 --slice-1: inset(80% -6px 0 0);
 --slice-2: inset(50% -6px 30% 0);
 --slice-3: inset(10% -6px 85% 0);
 --slice-4: inset(40% -6px 43% 0);
 --slice-5: inset(80% -6px 5% 0);
 content: "HOVER ME";
 display: block;
 position: absolute;
 top: 0;
 left: 0;
 right: 0;
 bottom: 0;
 background: linear-gradient(45deg, transparent 3%, #00e6f6 3%, #00e6f6 5%, #ff013c 5%);
 text-shadow: -3px -3px 0px #f8f005, 3px 3px 0px #00e6f6;
 clip-path: var(--slice-0);
}

button:hover::after {
 animation: 1s glitch;
 animation-timing-function: steps(2, end);
}

@keyframes glitch {
 0% {
  clip-path: var(--slice-1);
  transform: translate(-20px, -10px);
 }

 10% {
  clip-path: var(--slice-3);
  transform: translate(10px, 10px);
 }

 20% {
  clip-path: var(--slice-1);
  transform: translate(-10px, 10px);
 }

 30% {
  clip-path: var(--slice-3);
  transform: translate(0px, 5px);
 }

 40% {
  clip-path: var(--slice-2);
  transform: translate(-5px, 0px);
 }

 50% {
  clip-path: var(--slice-3);
  transform: translate(5px, 0px);
 }

 60% {
  clip-path: var(--slice-4);
  transform: translate(5px, 10px);
 }

 70% {
  clip-path: var(--slice-2);
  transform: translate(-10px, 10px);
 }

 80% {
  clip-path: var(--slice-5);
  transform: translate(20px, -10px);
 }

 90% {
  clip-path: var(--slice-1);
  transform: translate(-10px, 0px);
 }

 100% {
  clip-path: var(--slice-1);
  transform: translate(0);
 }
}
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
                    <h5 class="card-title"><?=$data['nama']?></h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer ">
                    <div class="text-center">
                    <a href="umroh-detail.php?id=<?=$data['id'] ?>" ><button>Detail Paket</button></a>
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