<style>
    table,
    tr,
    td,
    th {
        text-align: center;
    }


    .badge {
        display: inline-block;
        padding: .25em .4em;
        font-size: 100%;
        font-weight: 00;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>



<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10"><?= $title ?></h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>"><i class="feather icon-home"></i></a></li>
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
                        <?php echo $btntambah ?>
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
            <div class="card-body p-3 mt-2">
                <div class="">
                    <div class="customer-scroll" style="height:auto;position:relative;">
                        <div class="table-responsive">
                            <table id="table-style-hover" class="table  table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Divisi</th>
                                        <th>Nama Pengurus</th>
                                        <th>tempat lahir</th>
                                        <th>tanggal lahir</th>
                                        <th>jenis kelamin</th>
                                        <th>pendidikan terakhir</th>
                                        <th>bidang ilmu</th>
                                        <th>pekerjaan</th>
                                        <th>afiliasi Pengurus</th>
                                        <th>email</th>
                                        <th>No Telepon</th>
                                        <th>alamat</th>
                                        <th>provinsi</th>
                                        <th>kabupaten</th>
                                        <th>foto</th>
                                        <th>Aksi
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $no = 1;
                                      foreach ($pengurus as $pen) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $pen->nama_divisi?></td>
                                            <td><?php echo $pen->nama_pengurus ?></td>
                                            <td><?php echo $pen->tempat_lahir_pengurus ?></td>
                                            <td><?php echo $pen->tanggal_lahir_pengurus ?></td>
                                            <td><?php echo $pen->jenis_kelamin_pengurus ?></td>
                                            <td><?php echo $pen->nama_bidang_ilmu ?></td>
                                            <td><?php echo $pen->pekerjaan_pengurus ?></td>
                                            <td><?php echo $pen->afiliasi_pengurus ?></td>
                                            <td><?php echo $pen->email_pengurus ?></td>
                                            <td><?php echo $pen->telp_pengurus?></td>
                                            <td><?php echo $pen->alamat_pengurus ?></td>
                                            <td><?php echo $pen->nama_provinsi ?></td>
                                            <td><?php echo $pen->nama_kabupaten ?></td>
                                            <td>
                                                <div class="col-sm-12 ">
                                                    <a href="<?php echo base_url("uploads/pengurus/{$pen->foto_pengurus}") ?>" data-lightbox="example-set" data-title="">
                                                        <img src="<?php echo base_url("uploads/pengurus/{$pen->foto_pengurus}") ?>" class="img-fluid m-b-10" alt="">
                                                     </a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo anchor("pengurus/update/{$pen->id_pengurus}", "<i class='feather icon-edit'></i>Edit", ['class' => 'btn btn-sm btn-gradient-warning']) ?>
                                                <?php echo anchor("pengurus/delete/{$pen->id_pengurus}", "<i class='feather icon-trash-2'></i>Hapus", ['class' => 'btn btn-sm btn-gradient-danger remove-data']) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>