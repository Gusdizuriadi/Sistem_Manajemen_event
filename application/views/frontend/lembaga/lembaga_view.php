<main id="main" class="main-page">
 <!--==========================
      Schedule Section
    ============================-->
    <section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Lembaga</h2>
          <p>Lembaga yang bekerja sama dengan IRPI</p>
        </div>
    
					<div class="row">
          <?php  foreach ($lembaga as $key => $value){?>
						<div class="col-lg-4">
									<h3 class="fa fa-institution"> <?php echo $value->nama_lembaga?></h3>
									<p><?php echo $value->deskripsi_lembaga?></p>
						</div>
            <?php  } ?>
					</div>
			</div>
    </section>		
</main>
