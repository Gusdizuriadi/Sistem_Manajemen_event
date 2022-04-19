<main id="main" class="main-page">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2>Profil</h2>
          <p>SK, Layanan dan Kegiatan, Visi dan Misi</p>
        </div>

        <?php foreach ($profil as $key => $value){?>
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo base_url('uploads/profil/'.$value->gambar) ?>" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-6">
            <div class="details">
              <h2><?php echo $value->nama_profil?></h2>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
              </div>

              <p><?php echo $value->deskripsi_profil?></p>
            </div>
          </div> 
        </div>
        <?php } ?>
      </div>

    </section>

  </main>