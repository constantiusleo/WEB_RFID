<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pilih Customer</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Scan RFID</li>
      <li class="breadcrumb-item active" aria-current="page">Pilih Customer</li>
    </ol>
  </div>
  <div class="row mb-3">
    <!-- PALET BIRU Available Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Biru</div>
              <div class="h5 mb-0 font-weight-bold text-success mr-2"><?php echo $palet_biru_available ?></div>
            </div>
            <div class="col-auto">
              <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- PALET HIJAU Available Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Hijau</div>
              <div class="h5 mb-0 font-weight-bold text-success mr-2"><?php echo $palet_hijau_available ?></div>
            </div>
            <div class="col-auto">
              <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- PALET BIRU Delivery Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Biru</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-warning mr-2"><?php echo $palet_biru_in_delivery ?></div>
            </div>
            <div class="col-auto">
              <img src="assets/img/truck.svg" alt="Bootstrap" width="32" height="32">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- PALET HIJAU Delivery  Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Hijau</div>
              <div class="h5 mb-0 font-weight-bold text-warning mr-2"><?php echo $palet_hijau_in_delivery ?></div>
            </div>
            <div class="col-auto">
              <img src="assets/img/truck.svg" alt="Bootstrap" width="32" height="32">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card mb-4" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">
          <form action="<?php echo base_url() . 'ScanRFID/index'; ?>" method="post">
            <div class="form-group" bis_skin_checked="1">
              <select class="form-control" name=customer>
                <?php foreach ($data as $value) { ?>
                  <option><?php echo $value->Customer; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary text-right">Next</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>