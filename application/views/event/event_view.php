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
                                        <th>Nama event</th>
                                        <th>Narasumber</th>
                                        <th>narasumber pendamping</th>
                                        <th>tema event</th>
                                        <th>subtema event</th>
                                        <th>kategori</th>
                                        <th>bidang ilmu</th>
                                        <th>lembaga</th>
                                        <th>deskripsi event</th>
                                        <th>tanggal deadline event</th>
                                        <th>tanggal pelaksaan event</th>
                                        <th>link event</th>
                                        <th>brosur event</th>
                                        <th>nomor informasi event</th>
                                        <th>status event</th>
                                        <th>Aksi
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $no = 1;
                                      foreach ($event as $ev) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $ev->nama_event?></td>
                                            <td><?php echo $ev->nama_narasumber ?></td>
                                            <td><?php echo $ev->narasumber_pendamping ?></td>
                                            <td><?php echo $ev->tema_event ?></td>
                                            <td><?php echo $ev->subtema_event ?></td>
                                            <td><?php echo $ev->nama_kategori_agenda?></td>
                                            <td><?php echo $ev->nama_bidang_ilmu ?></td>
                                            <td><?php echo $ev->nama_lembaga ?></td>
                                            <td><?php echo $ev->deskripsi_event ?></td>
                                            <td><?php echo $ev->tanggal_deadline_event?></td>
                                            <td><?php echo $ev->tanggal_pelaksanaan_event?></td>
                                            <td><?php echo $ev->link_event ?></td>
                                            <td>
                                                <div class="col-sm-12 ">
                                                    <a href="<?php echo base_url("uploads/event/{$ev->brosur_event}") ?>" data-lightbox="example-set" data-title="">
                                                        <img src="<?php echo base_url("uploads/event/{$ev->brosur_event}") ?>" class="img-fluid m-b-10" alt="">
                                                     </a>
                                                </div>
                                            </td>
                                            <td><?php echo $ev->nomor_informasi_event ?></td>
                                            <td><?php echo $ev->status_event ?></td>
                                            <td>
                                                <?php echo anchor("event/detail/{$ev->id_event}", "<i class='feather icon-eye'></i>Detail", ['class' => 'btn btn-sm btn-gradient-info']) ?>
                                                <?php echo anchor("event/update/{$ev->id_event}", "<i class='feather icon-edit'></i>Edit", ['class' => 'btn btn-sm btn-gradient-warning']) ?>
                                                <?php echo anchor("event/delete/{$ev->id_event}", "<i class='feather icon-trash-2'></i>Hapus", ['class' => 'btn btn-sm btn-gradient-danger remove-data']) ?>
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