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
  <div class="row">
    <div class="col">
      <div class="card mb-4" bis_skin_checked="1">
        <div class="card-body" bis_skin_checked="1">
          <form action="<?php echo base_url() . 'ScanRFID_Out'; ?>" method="post">
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