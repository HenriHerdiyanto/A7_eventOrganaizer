<?php require_once "header.php"; ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Editors</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Editors</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Insert Event</h5>
                        <form action="" method="POST">
                            <label for="">Nama Event</label>
                            <input type="text" name="nama_event" id="nama_event" class="form-control"><br>
                            <label for="">Tanggal Event</label>
                            <input type="date" name="tanggal_event" id="tanggal_event" class="form-control"><br>
                            <label for="">Deskripsi Event</label>
                            <textarea name="deskripsi_event" id="deskripsi_event" cols="30" rows="10" class="form-control"></textarea><br>
                            <label for="">Gambar Event</label>
                            <input type="file" name="gambar_event" id="gambar_event" class="form-control"><br>
                            <label for="">Status Event</label>
                            <select name="status_event" id="status_event" class="form-control">
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include "footer.php"; ?>