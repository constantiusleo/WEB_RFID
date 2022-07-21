<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('#'); ?>">
    <div class="sidebar-brand-icon">
      <img src="<?php echo base_url('assets/img/logo/aiia-logo.png'); ?>">
    </div>
    <div class="sidebar-brand-text mx-3">RFID</div>
  </a>

  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url('#'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item active">
    <a class="nav-link" href="<?= base_url('PilihCustomer'); ?>">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>Scan RFID</span></a>
  </li>
  <li class="nav-item active">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
      <i class="fas fa-fw fa-table"></i>
      <span>Input</span>
    </a>
    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pages</h6>
        <a class="collapse-item active" href="<?= base_url('InputNewType'); ?>">Input New Type</a>
        <a class="collapse-item active" href="<?= base_url('InputNewTag'); ?>">Input New Tag</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="version" id="version-ruangadmin"></div>
</ul>