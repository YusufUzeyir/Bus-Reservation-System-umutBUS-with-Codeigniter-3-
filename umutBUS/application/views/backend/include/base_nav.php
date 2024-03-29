  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('backend/home') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bus"></i>
        </div>
        <div class="sidebar-brand-text mx-3">umut-BUS</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>backend/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Gösterge Paneli </span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/bus">
          <i class="fas fa fa-bus"></i>
          <span>Otobüs Yönetimi</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/rota">
          <i class="fas fa fa-compass"></i>
          <span>Terminal Yönetimi</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/planlama">
          <i class="fas fa fa-clipboard-list"></i>
          <span>Rota Yönetimi</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/order">
          <i class="fas fa-bookmark"></i>
          <span>Rezervasyon Listesi</span></a>
        <a class="nav-link" href="<?= base_url() ?>backend/tiket">
          <i class="fas fa-ticket-alt"></i>
          <span>Satılan Biletler</span></a>
        <?php if ($this->session->userdata('level') == '1') { ?>
          <a class="nav-link" href="<?= base_url() ?>backend/raporlama">
            <i class="fa fa fa-file"></i>
            <span>Raporlama</span></a>
          <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Kullanıcı Yönetimi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('backend/musteri') ?>">Müşteri listesi</a>
            <a class="collapse-item" href="<?= base_url() ?>backend/admin">Yönetici</a>
          </div>
        </div>
      </li>
    <?php } else {
        } ?>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">

      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?= base_url('backend/order/vieworder') ?>" method="GET">
            <div class="input-group">
              <input type="text" name="order" class="form-control bg-light border-0 small" placeholder="Ara" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-info">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_admin'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url($this->session->userdata('img_admin')) ?>">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış Yap
                </a>
              </div>
            </li>

          </ul>

        </nav>