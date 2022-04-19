<main id="main" class="main-page">
 <section class="ftco-section contact-section">
 	<div class="container">
 		<div class="row d-flex mb-5 contact-info">
 			<div class="col-md-4">
 				
 			</div>
 			<div class="col-md-8 d-flex">
			    <?php $attributes = array('method' => 'post'); ?>
 			      
				<?php echo form_open('frontend/pendaftaran', $attributes); ?>
 				<div class="bg-light align-self-stretch box p-4 " style="border-radius: 1%;">
 					<div class="col-md-12 text-center heading-section ftco-animate">
 						<h2 class="mb-4" class="hp"><span>FORM </span>PENDAFTARAN</h2><br>
 					</div>
 					<div class="row clearfix">
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" class="form-control" placeholder="Nama Peserta" name="nama_peserta" value="<?= (isset($pendaftaran_peserta['nama_peserta']))  ? $pendaftaran_peserta['nama'] : ""; ?>" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" class="form-control" placeholder="Jenis Kelamin" name="jenis_kelamin" value="<?= (isset($pendaftaran_peserta['jenis_kelamin_peserta']))  ? $pendaftaran_peserta['jenis_kelamin_peserta'] : ""; ?>" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" class="form-control" placeholder="Pendidikan" value="<?= (isset($pendaftaran_peserta['pendidikan_peserta']))  ? $pendaftaran_peserta['pendidikan_peserta'] : ""; ?>" name="pendidikan_peserta" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" class="form-control datepicker" placeholder="Afiliasi" value="<?= (isset($pendaftaran_peserta['afiliasi_peserta']))  ? $pendaftaran_peserta['afiliasi_peserta'] : ""; ?>" name="afiliasi_peserta" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" id="umur" class="form-control" placeholder="Email" value="<?= (isset($pendaftaran_peserta['email_peserta']))  ? $pendaftaran_peserta['email_peserta'] : ""; ?>" name="email" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" class="form-control" placeholder="No Hp" value="<?= (isset($pendaftaran_peserta['telp_peserta']))  ? $pendaftaran_peserta['telp_peserta'] : ""; ?>" name="telp_peserta" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
					 <div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" class="form-control" placeholder="Alamat" value="<?= (isset($pendaftaran_peserta['alamat_peserta']))  ? $pendaftaran_peserta['alamat_peserta'] : ""; ?>" name="alamat" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<select name="provinsi" id="asd" class="form-control">
 										<option value="<?= (isset($pendaftaran_peserta['id_provinsi']))  ? $pendaftaran_peserta['id_provinsi'] : ""; ?>" selected="" disabled="">-- Pilih Provinsi --</option>
										 
 									</select>

 								</div>
 							</div>
 						</div>
 					</div>
					 <div class="row clearfix">
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<select name="kabupaten" id="asd" class="form-control">
 										<option value="" selected="" disabled="">-- Pilih Kabupaten --</option>

 									</select>

 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<select name="event" id="asd" class="form-control">
 										<option value="" selected="" disabled="">-- Pilih Event --</option>
 								

 									</select>

 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="row clearfix">
 						<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <h5>Judul Kelas</h5>
                         </div> -->
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<div class="form-group" style="margin-bottom: 1.8rem;">
 								<div class="form-line">
 									<input type="text" class="form-control" value="<?= (isset($profile['alamat']))  ? $profile['alamat'] : ""; ?>" placeholder="Status Peserta" name="status_peserta" required autocomplete="off" />
 								</div>
 							</div>
 						</div>
 					</div>
 					<br>
 					<div class="row clearfix">
 						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 							<center><input type="submit" name="submit" value="DAFTAR" class="btn btn-info" style="color: white;font-size:24px;width:300px;height:60px;"></center>
							 <?php echo form_close() ;?>
 							<!-- <center><button class="btn btn-warning" style="color: white;font-size:24px;width:300px;height:60px;">SIMPAN</button></center> -->
 						</div>
 					</div>
 					</form>
 					<br>
 				</div>
 			</div>

 		</div>
 	</div>
 </section>
 </main>