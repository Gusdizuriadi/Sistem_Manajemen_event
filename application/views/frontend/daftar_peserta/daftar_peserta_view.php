<main id="main" class="main-page">
 <!--==========================
      Schedule Section
    ============================-->
    <section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Daftar Peserta</h2>
          <p>Data Para Peserta Yang Telah Berhasil Mendaftar</p>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-10 mb-lg-0">  
              <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Provinsi</th>
                                <th>Event</th>
                                <th>Status</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($daftar as $pp) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pp->nama_peserta ?></td>
                                    <td><?php echo $pp->email_peserta ?></td>
                                    <td><?php echo $pp->alamat_peserta ?></td>
                                    <td><?php echo $pp->nama_provinsi?></td>
                                    <td><?php echo $pp->nama_event?></td>
                                    <td><?php echo $pp->status_peserta?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 </div>
</section>
</main>
