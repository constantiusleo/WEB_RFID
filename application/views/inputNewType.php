<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input New Type</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Input</li>
      <li class="breadcrumb-item active" aria-current="page">New Type</li>
    </ol>
  </div>
  <div class="row">
    <!-- Datatables Master Data -->
    <div class="col">
      <div class="card mb-4">

        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>Type</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($data as $value) { ?>
                <tr>
                  <td><?php echo $value->Type; ?></td>
                  <td>
                    <form action="<?= site_url('InputNewType/del') ?>" method="post">
                      <input type="hidden" name="type" value="<?= $value->Type ?>">
                      <button onclick="return confirm('Apakah ingin menghapus Type <?php echo $value->Type; ?> ?')" class="btn btn-danger float-sm-right">Delete
                      </button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Form Basic -->

    <div class="col">
      <div class="card mb-4" bis_skin_checked="1">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" bis_skin_checked="1">
          <h6 class="m-0 font-weight-bold text-primary">Form Type Baru</h6>
        </div>
        <div class="card-body" bis_skin_checked="1">
          <form action="<?php echo base_url() . 'InputNewType/NewType'; ?>" method="post">
            <div class="form-group" bis_skin_checked="1">
              <input type="text" name="type" class="form-control" placeholder="Masukan Type Baru">
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