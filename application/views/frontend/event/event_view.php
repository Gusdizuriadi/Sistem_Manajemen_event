<main id="main" class="main-page">
  <!--==========================
      event Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Event</h2>
          <p>Webinar, Seminar, Workshop dan Pelatihan</p>
        </div>
      
        <div class="row">
          <?php foreach ($event_e as $value){?>
          <div class="col-lg-3 col-md-6">
            <div class="speaker">
              <img src="<?php echo base_url('uploads/event/'.$value->brosur_event) ?>" alt="Speaker 6" class="img-fluid">
              <div class="details">
			          <h3><a href="<?= base_url('frontend/event/detail_event/'.$value->id_event) ?>"><?php echo $value->nama_event?></a></h3>
              </div>
            </div>
		      </div>
		       <?php } ?>
        </div>
      </div>
    </section>
   </main>