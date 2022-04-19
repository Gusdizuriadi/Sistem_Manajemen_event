<!--==========================
    Intro Section
  ============================-->
  
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">daftar dan ikuti <span></span><br><span> Event</span></h1>
	    <a href="<?php echo site_url('frontend/pendaftaran');?>" class="about-btn scrollto">Daftar Sebagai Peserta</a>
	  </div>
  </section>
  <main id="main">


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
          <?php foreach ($event_h as $key => $value){?>
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

  

	
	<!--==========================
      Gallery Section
    ============================-->
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Stakeholder</h2>
          <p>Kerja sama IRPI dengan Perguruan Tinggi, Lembaga Riset, Pemerintah, Software House dan Swasta</p>
        </div>
      </div>

      
      <div class="owl-carousel gallery-carousel">
      <?php foreach ($stakeholder as $key => $s){?>
        <a href="<?php echo base_url('uploads/sponsor/'.$s->logo_stakeholder) ?>" class="venobox" data-gall="gallery-carousel"><img src="<?php echo base_url('uploads/sponsor/'.$s->logo_stakeholder) ?>" alt=""></a>
        <?php } ?>
      </div>
      
    </section>


    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp">
      <form method="POST" action="<?php echo site_url('frontend/event');?>">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <button >WEBINAR/SEMINAR</button>
          </div>
        </form>
        <form method="POST" action="<?php echo site_url('frontend/event');?>">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <button >WORKSHOP/PELATIHAN</button>
          </div>
        </form>
        <form method="POST" action="https://journal.irpi.or.id/">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <button >OPEN JURNAL SYSTEM</button>
            </div>
          </div>
         </form>
      </div>
  </section>
  
  
</main>
  