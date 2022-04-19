<style>
    .img-thumbnail {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        height: auto;
        min-width: auto;
        max-width: auto;
        max-height: 550px;
        min-height: 500px;
    }

    ximg {
        left: 0px;
    }

    .imgA1 {
        height: auto;
        position: relative;
        width: 100%;
        z-index: 3;
    }

    .pembicara {
        max-height: 80px;
        min-width: 80px;
        min-height: 80px;
        height: auto;
    }

    .card-pembicara {
        min-height: 450px;
    }

    .sponsor {
        max-height: 50px;
    }

    .sampul {
        max-height: 200px;
        min-height: 200px;
        min-width: 320px;
        max-width: 320px;
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
                    <li class="breadcrumb-item"><a href="#!"><?= $parent ?></a></li>
                    <li class="breadcrumb-item"><a href="#!"><?= $title ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-xl-4">
        <div class="card">
            <img class="img-fluid img-thumbnail" src="<?php echo base_url() ?>uploads/event/<?= $brosur_event ?>" alt="Profile-user">

            <div class="card-body text-center">
                <h3><?= $nama_event ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-8 ">
        <div class="card"  style="height:650px;">
            <div class="card-header">
                <h5><?= $title ?></h5>
                <div class="card-header-right">
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
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-danger btn-icon" href="#!" role="button"><i class="fas fa-street-view"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Nama Event</div>
                        <p class="chat-header text-muted"><?= $nama_event ?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-info btn-icon" href="#!" role="button"><i class="fas fa-money"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Tanggal Pelaksanaan Event</div>
                        <p class="chat-header text-muted"><?= $tanggal_pelaksanaan_event ?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-warning btn-icon" href="#!" role="button"><i class="fas fa-tag"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Agenda</div>
                        <p class="chat-header text-muted"><?php echo $id_kategori_agenda ?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-primary btn-icon" href="#!" role="button"><i class="fas fa-graduation-cap"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Bidang Ilmu</div>
                        <p class="chat-header text-muted"><?php echo $id_bidang_ilmu ?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-success btn-icon" href="#!" role="button"><i class="fas fa-user"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Narasumber 1</div>
                        <p class="chat-header text-muted"><?php echo$id_narasumber ?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-success btn-icon" href="#!" role="button"><i class="fas fa-user"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Narasumber 2</div>
                        <p class="chat-header text-muted"><?= $narasumber_pendamping ?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-info btn-icon" href="#!" role="button"><i class="fas fa-money"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Deadline Pendaftaran</div>
                        <p class="chat-header text-muted"><?= $tanggal_deadline_event ?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-danger btn-icon" href="#!" role="button"><i class="fas fa-bank"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Lembaga Penyelenggara</div>
                        <p class="chat-header text-muted"><?php echo $id_lembaga?></p>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a class="btn btn-outline-warning btn-icon" href="#!" role="button"><i class="fas fa-list"></i>
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="chat-header">Deskripsi</div>
                        <p class="chat-header text-muted"><?= $deskripsi_event ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>