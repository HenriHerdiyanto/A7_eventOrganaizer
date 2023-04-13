<?php include "header.php" ?>
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
      <div class=" text-white text-center w-auto ">  
          <h1 class="judul ">Layanan Umroh & Haji</h1>
          <!-- <hr style="width:20%;height:5px;border-width:0;color:white;background-color:gray; margin-left: auto; margin-right: auto;" > -->
      </div>
    </div>
  </section>
  <!-- ======= About Section ======= -->
  <section id="about" class=" bg-white " >
    <div class="container ">
    
      <div class="row d-flex justify-content-center">
        <div class="col-sm-3">
          <div class="card" style="width: auto;" data-aos="fade-right">
            <img src="admin/assets/img/paket1.jpg" style="width:auto;height:12rem;" class=" card-img-top img-fluid" alt="paket1.jpg">
            <div class="card-body">
              <div class="text-center">
                <h3 class="card-title">Umroh Regular </h3><br>
                <a href="umroh-paket.php?p=1" class="btn btn-primary form-control">Lihat Layanan</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card" style="width: auto;" data-aos="fade-right">
            <img src="admin/assets/img/paket2.jpg" style="width:auto;height:12rem;" class="card-img-top img-fluid" alt="paket1.jpg">
            <div class="card-body">
              <div class="text-center">
                <h3 class="card-title">Umroh & Tour</h3><br>               
                <a href="umroh-paket.php?p=2" class="btn btn-primary form-control">Lihat Layanan</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card" style="width: auto;" data-aos="fade-left">
            <img src="admin/assets/img/paket3.jpg" style="width:auto;height:12rem;" class="card-img-top img-fluid" alt="paket1.jpg">
            <div class="card-body">
              <div class="text-center">
                <h3 class="card-title">Halal Tour</h3><br>             
                <a href="umroh-paket.php?p=3" class="btn btn-primary form-control ">Lihat Layanan</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card" style="width: auto;" data-aos="fade-left">
            <img src="admin/assets/img/paket4.jpg" style="width:auto;height:12rem;" class="card-img-top img-fluid" alt="paket1.jpg">
            <div class="card-body">
              <div class="text-center">
                <h3 class="card-title">Haji Plus</h3><br>            
                <a href="umroh-paket.php?p=4" class="btn btn-primary form-control">Lihat Layanan</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

 

</main><!-- End #main -->
<?php include "footer.php" ?>