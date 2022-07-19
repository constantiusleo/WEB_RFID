<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">RFID Tag</h1>   
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active" aria-current="page">RFID Tag</li>
    </ol>
  </div>
  <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Biru</div>
                            <div class="h5 mb-0 font-weight-bold text-success mr-2">192</div>
                        </div>
                        <div class="col-auto">
                        <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
                        </div>
                    </div>
                </div>
            </div>
        </div> 
         <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Hijau</div>
                            <div class="h5 mb-0 font-weight-bold text-success mr-2">193</div>
                        </div>
                        <div class="col-auto">
                        <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Biru</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-warning mr-2">120</div>
                        </div>
                        <div class="col-auto">
                        <img src="assets/img/truck.svg" alt="Bootstrap" width="32" height="32">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Hijau</div>
                            <div class="h5 mb-0 font-weight-bold text-warning mr-2">133</div>
                        </div>
                        <div class="col-auto">
                        <img src="assets/img/truck.svg" alt="Bootstrap" width="32" height="32">
                        </div>
                    </div> 
                </div>
            </div>
        </div>
  <!-- Row -->
  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
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
                  <td><?php echo $value->Status; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

   <!-- Row -->
   <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
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
                  <td><?php echo $value->Status; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>