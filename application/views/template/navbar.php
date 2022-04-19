<nav class="pcoded-navbar menupos-fixed ">
    <div class="navbar-wrapper ">
        <div class="navbar-brand header-logo">
            <a href="#" class="b-brand">
                <div class="b-bg">
                    I
                </div>
                <span class="b-title">Administrator Irpi</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Navigasi</label>
                </li>
                <li data-username="home" class="nav-item"><a href="<?= site_url('home') ?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a></li>
                <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Data Master</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="<?= site_url('provinsi') ?>" class="">Provinsi</a></li>
                        <li class=""><a href="<?= site_url('kabupaten') ?>" class="">Kabupaten</a></li>
                        <li class=""><a href="<?= site_url('kecamatan') ?>" class="">Kecamatan</a></li>
                        <li class=""><a href="<?= site_url('kategori_agenda') ?>" class="">Kategori Agenda</a></li>
                        <li class=""><a href="<?= site_url('bidang_ilmu') ?>" class="">Bidang Ilmu</a></li>
                        <li class=""><a href="<?= site_url('lembaga') ?>" class="">Lembaga</a></li>
                        <li class=""><a href="<?= site_url('divisi') ?>" class="">Divisi</a></li>
                    </ul>
                </li>
                <li data-username="widget statistic data chart" class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-mic"></i></span><span class="pcoded-mtext">Data Proses</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="<?= site_url('pengurus') ?>" class="">Pengurus</a></li>
                        <li class=""><a href="<?= site_url('narasumber') ?>" class="">Narasumber</a></li>
                        <li class=""><a href="<?= site_url('event') ?>" class="">Event</a></li>
                        <li class=""><a href="<?= site_url('pendaftaran_peserta') ?>" class="">Pendaftaran Peserta</a></li>
                        <li class=""><a href="<?= site_url('stakeholder') ?>" class="">Stakeholder</a></li>
                    </ul>
                </li>
                

                <li data-username="animations" class="nav-item"><a href="<?= site_url('profil') ?>" class="nav-link">
                <span class="pcoded-micon"><i class="fa fa-institution"></i></span>
                <span class="pcoded-mtext">Profil</span></a></li>

    
                
            </ul>
        </div>
    </div>
</nav>