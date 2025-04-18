<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Menu</div>
        <a class="nav-link" href="">
          <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
          Beranda
        </a>
        <a class="nav-link" href="{{ route('dashboard') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-dashboard"></i></div>
          Dashboard
        </a>
        <div class="sb-sidenav-menu-heading">Data</div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsDataMaster" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Data Master
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayoutsDataMaster" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="">Data User</a>
            <a class="nav-link" href="">Data Diabetes User</a>
          </nav>
        </div>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsPrediksi" aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Prediksi
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseLayoutsPrediksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="">Prediksi Data</a>
          </nav>
        </div>

        <div class="sb-sidenav-menu-heading">Lain-Lain</div>
        <a class="nav-link" href="">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
          Keluar
        </a>
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <div class="small">Login: ADMIN</div>
    </div>
  </nav>
</div>