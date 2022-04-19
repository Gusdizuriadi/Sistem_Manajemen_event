<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?= $title ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!"><?= $parent ?></a></li>
                    <li class="breadcrumb-item"><a href="#!"><?= $title ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?= $title ?></h5>
                <div class="card-header-right">
                    <div class="float-right">
                    </div>
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $form_open ?>
                <div class="form-row">
                    <?= $nama_event ?>
                    <?= $inputnama_event ?>
                    <?= $fe_namaevent ?>
                    <div class="valid-feedback"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?= $narasumber ?>
                        <?= $ddnarasumber ?>
                    </div>
                </div>
                <div class="form-row">
                    <?= $narasumber_pendamping ?>
                    <?= $inputnarasumber_pendamping ?>
                    <div class="valid-feedback"></div>
                </div>
                <div class="form-row">
                            <?= $tema_event ?>
                            <?= $inputtema_event ?>  
                    <div class="valid-feedback"></div>
                </div>
                <div class="form-row">
                    <?= $subtema_event ?>
                    <?= $inputsubtema_event ?>
                    <div class="valid-feedback"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?= $kategori_agenda ?>
                        <?= $ddkategori_agenda ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?= $bidang_ilmu ?>
                        <?= $ddbidang_ilmu ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?= $lembaga ?>
                        <?= $ddlembaga ?>
                    </div>
                </div>
                <div class="form-row">
                    <?= $deskripsi_event ?>
                    <?= $inputdeskripsi_event ?>
                    <div class="valid-feedback"></div>
                 </div>   
                <div class="form-row col-md-6">
                    <?= $tanggal_deadline_event ?>
                    <?= $inputtanggal_deadline_event ?>
                    <div class="valid-feedback"></div>
                </div>
                <div class="form-row col-md-6">
                    <?= $tanggal_pelaksanaan_event ?>
                    <?= $inputtanggal_pelaksanaan_event ?>
                    <div class="valid-feedback"></div>
                </div>
                <div class="form-row">
                    <?= $link_event ?>
                    <?= $inputlink_event ?>
                    <div class="valid-feedback"></div>
                </div>
                <div class="form-row pt-3">
                    <div class="col-sm-6">
                        <?= $brosur_event ?>
                        <?= $inputbrosur_event ?>
                    </div>   
                </div>
                <div class="form-group col-md-6">
                        <?= $nomor_informasi_event ?>
                        <?= $inputnomor_informasi_event ?>
                        <div class="valid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                        <?= $status_event ?>
                        <?= $inputstatus_event ?>
                        <div class="valid-feedback"></div>
                </div>
                <div class="form-row pt-2">
                   <?= $inputid_event ?>
                   <?= $submit ?>
                   <?= $formclose  ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>