<main id="main" class="main-page">
<!--==========================
      Sponsors Section
    ============================-->
    <section id="hotels" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
		    <h2>Stakeholder</h2>
		    <p>Kerja sama IRPI Dengan Perguruan Tinggi, Lembaga Riset, Pemerintah, Software House dan Swasta</p>
        </div>

        <div class="row">
        <?php foreach ($stakeholder as $key => $s){?>
          <div class="col-lg-3 col-md-3">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?php echo base_url('uploads/sponsor/'.$s->logo_stakeholder) ?>" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a ><?php echo $s->nama_sponsor?></a></h3>
              <p><?php echo $s->keterangan_stakeholder?></p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
 </main>
