  <main id="main" class="main-page">
    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2>Event Detail</h2>
          <p>Webinar, Seminar, Workshop dan Pelatihan</p>
        </div>

        <?php foreach ($detail_event as $value){?>
        <div class="row">
          <div class="col-md-5">
            <img src="<?php echo base_url('uploads/event/'.$value->brosur_event) ?>" alt="Speaker 1" class="img-fluid">
          </div>

          <div class="col-md-7">
            <div class="details">
              <h2><?php echo $value->nama_event?></h2>
            
              <p class="mb-4 pb-3">EVENT DATE : <?php echo $value->tanggal_pelaksanaan_event?></p>
 
              <p>AGENDA : <?php echo $value->nama_kategori_agenda?></h1> 

              <p>BIDANG ILMU: <?php echo $value->nama_bidang_ilmu?></p> 
              
              <p>NARASUMBER 1 : <?php echo $value->nama_narasumber?></p> 

              <p>NARASUMBER 2 : <?php echo $value->narasumber_pendamping?></p> 

              <p>DEADLINE PENDAFTARAN : <?php echo $value->tanggal_deadline_event?></p> 

              <p>LEMBAGA PENYELENGGARA : <?php echo $value->nama_lembaga?></p> 

              <p class="mb-4 pb-3">DESKRIPSI : <?php echo $value->deskripsi_event?></p>

              <a href="<?php echo site_url('frontend/pendaftaran');?>" class="btn btn-info">Daftar Sebagai Peserta</a>

            </div>
          </div>
        </div>
        <?php } ?>
      </div>

    </section>
  </main>