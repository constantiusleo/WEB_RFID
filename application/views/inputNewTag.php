<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input New Tag</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Input</li>
      <li class="breadcrumb-item active" aria-current="page">New tag</li>
    </ol>
  </div>
  <div class="row">
    <!--  Master Data -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" bis_skin_checked="1">
          <h6 class="m-0 font-weight-bold text-primary ">RFID READER</h6>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Start Scanning</button>
        <div class="table-responsive p-3">
          <table class="table table-bordered align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope='col'>No</th>
                <th scope='col-7'>EPC</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <th>0C00 2802 9C13 0124 9000 3B3B 2C01</th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card mb-4" bis_skin_checked="1">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" bis_skin_checked="1">
          <h6 class="m-0 font-weight-bold text-primary ">RFID READER</h6>
        </div>
        <div class="card-body" bis_skin_checked="1">
          <form action="<?php echo base_url() . 'InputNewTag/NewTag'; ?>" method="post">
            <select name='select_type' class="form-control">
              <?php foreach ($data as $value) { ?>
                <option value="<?php echo $value->Type; ?>"><?php echo $value->Type; ?></option>
              <?php } ?>
            </select>
            <div class="form-group align-self-end" bis_skin_checked="1">
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-primary text-right">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>