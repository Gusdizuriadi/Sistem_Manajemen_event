<!DOCTYPE html>
<html lang="en">
<body>
    <div class="page-wrapper p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <?= $form_open ?>
                    <h2 class="text-center"><span>FORMULIR </span>PENDAFTARAN</h2> <br>
                    <form method="POST">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_nama ?></label>
                                        <?= $input_nama;  ?>
                                        <div class="invalid-feedback">
                                          <?= $invalid_nama ?>
                                       </div>
                                       <div class="valid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_jenis_kelamin_peserta ?></label>
                                    <?= $input_jenis_kelamin_peserta ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_pendidikan_peserta ?></label>
                                    <?= $input_pendidikan_peserta;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_afiliasi_peserta ?></label>
                                    <?= $input_afiliasi_peserta;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_email_peserta ?></label>
                                    <?= $input_email_peserta;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_telp_peserta ?></label>
                                    <?= $input_telp_peserta;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_alamat_peserta ?></label>
                                    <?= $input_alamat_peserta;  ?>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <label class="label"><?= $label_provinsi ?></label>
                                    <div>
                                      <?= $ddprovinsi;  ?>
                                    </div>
                                </div>
                            </div>
                           <div class="col-5">
                                <div class="input-group">
                                    <label class="label"><?= $label_kabupaten;  ?></label>
                                    <div>
                                      <?= $ddkabupaten;  ?>
                                    </div>
                                </div>
                            </div>
                           <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_event ?></label>
                                    <div>
                                       <?= $ddevent;  ?>
                                  </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label"><?= $label_status_peserta ?></label>
                                    <?= $input_status_peserta;  ?>
                                </div>
                            </div>
                        <div class="p-t-12">
                         <?= $input_id ?>
                         <?= $submit ?>
                         <?= $form_close  ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
