<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">RFID Tag</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
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
  <!-- Row -->
  <div class="row">
    <!-- Datatables Number of Tags -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">All Tags</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Type</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($s_type as $value) { ?>
                <tr>
                  <td><?php echo $value->Type; ?></td>
                </tr>
              <?php } ?>
            </tbody>
            </tfoot>
            <tr>
              <th>Total</th>
              <th><?php echo $total ?></th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

    <!-- Row -->
    <!-- Datatables Available Inventory -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Available Inventory</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Type</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo 'PALET HIJAU' ?></td>
                <td><?php echo $palet_hijau_available ?></td>
              </tr>
              <tr>
                <td><?php echo 'PALET BIRU' ?></td>
                <td><?php echo $palet_biru_available ?></td>
              </tr>
              <tr>
                <td><?php echo 'BOX 331' ?></td>
                <td><?php echo $box_331_available ?></td>
              </tr>
            </tbody>
            </tfoot>
            <tr>
              <th>Total</th>
              <th><?php echo $total_available ?></th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

    <!-- Row -->
    <!-- Datatables In Delivery -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">In Delivery</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Type</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo 'PALET HIJAU' ?></td>
                <td><?php echo $palet_hijau_in_delivery ?></td>
              </tr>
              <tr>
                <td><?php echo 'PALET BIRU' ?></td>
                <td><?php echo $palet_biru_in_delivery ?></td>
              </tr>
              <tr>
                <td><?php echo 'BOX 331' ?></td>
                <td><?php echo $box_331_in_delivery ?></td>
              </tr>
            </tbody>
            </tfoot>
            <tr>
              <th>Total</th>
              <th><?php echo $total_delivery ?></th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- Datatables Master Data -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Master Data</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>EPC</th>
                <th>Type</th>
                <th>Customer</th>
                <th>Waktu</th>
                <th>Status</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>EPC</th>
                <th>Type</th>
                <th>Customer</th>
                <th>Waktu</th>
                <th>Status</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($data as $value) { ?>
                <tr>
                  <td><?php echo $value->EPC; ?></td>
                  <td><?php echo $value->Type; ?></td>
                  <td><?php echo $value->Customer; ?></td>
                  <td><?php echo $value->Last_Seen; ?></td>
                  <td><?php if ($value->Status == 'AVAILABLE') { ?>
                      <span class="badge badge-success">AVAILABLE</span>
                    <?php } else if ($value->Status == 'IN_DELIVERY') { ?>
                      <span class="badge badge-warning">IN_DELIVERY</span>
                    <?php } ?>
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