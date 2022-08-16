<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800" style="display: block;">History</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">History</li>
      </ol>
    </div>
    <!-- Start Comment
    <form id="filter-tanggal" style="display: block;">
      <div class="row form-group">
        <label for="date" class="col-sm-1 col-form-label">Date Start</label>
        <div class="col-sm-4">
          <div class="input-group date" id="datepicker2">
            <input id="min" name="min" type="text" class="form-control2">
            <span class="input-group-append">
              <span class="input-group-text bg-white">
                <img src="assets/img/calendar.svg" alt="Bootstrap" width="16" height="16">
              </span>
            </span>
            <div class="col">
              <button type="button" class="button btn-sm btn btn-primary float-sm-center">Reset</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row form-group">
        <label for="date" class="col-sm-1 col-form-label">Date End</label>
        <div class="col-sm-4">
          <div class="input-group date" id="datepickerr">
            <input id="max" name="max" type="text" class="form-controlr">
            <span class="input-group-append">
              <span class="input-group-text bg-white">
                <img src="assets/img/calendar.svg" alt="Bootstrap" width="16" height="16">
              </span>
            </span>
          </div>
        </div>
      </div>
    </form>
    End Comment-->
    <div class="row">
      <!-- Datatables Master Data -->
      <div class="col">
        <div class="card mb-4">
          <div class="card-header d-flex flex-row align-items-center justify-content-between">
            <h1 id="header_history" class="display-4 mb-0 text-gray-800" style="display: none;">History</h1>
            <div class="align-self-end my-2 text-right">
              <button id="btn_backward" class="btn btn-lg btn-info" style="display: none;">Back</button>
            </div>
          </div>
          <div id="header_table" class="table-responsive p-3" style="display: block;">
            <table id="header_table_id" class="table display align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Customer</th>
                  <th>Transaksi</th>
                  <th>Waktu</th>
                  <th>Total</th>
                  <th>Log</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $value) { ?>
                  <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->Customer; ?></td>
                    <td><?php echo $value->Transaksi; ?></td>
                    <td><?php echo $value->timestamp; ?></td>
                    <td><?php echo $value->total_tag; ?></td>
                    <td>
                      <button type="button" value="<?php echo $value->id; ?>" class="btn-detail-class btn btn-primary float-sm-center">Detail</button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div id="item_table" class="table-responsive p-3" style="display: none;">
            <table id="item_table_id" class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>EPC</th>
                  <th>Type</th>
                  <th>Customer</th>
                  <th>Waktu</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" language="javascript">
    $(function() {
      $('#datepickerr').datepicker();
      $('#datepicker2').datepicker();
      $('table.display').DataTable({
        "paging": false
      });
      var table = $('#item_table_id').DataTable();

      $('.btn-detail-class').on('click', function() {
        var button = $(this);
        var actionUrl = "<?php echo base_url() . 'History/choose_ID'; ?>";
        $.ajax({
          type: "POST",
          dataType: "json",
          url: actionUrl,
          data: {
            id_send: button.val()
          },
          success: function(data) {
            document.getElementById("header_table").style.display = "none";
            // document.getElementById("filter-tanggal").style.display = "none";
            document.getElementById("item_table").style.display = "block";
            document.getElementById("btn_backward").style.display = "block";
            document.getElementById("header_history").style.display = "block";
            document.getElementById("header_history").innerHTML = button.val();

            data.table_send.forEach(element => {
              table.row.add([element.EPC, element.Type, element.Customer, element.Waktu]).draw(false);
            });
          },
          error: function(request, exception) {
            alert("GAGAL");
          },
        });
        $('#btn_backward').on('click', function() {
          document.getElementById("header_table").style.display = "block";
          // document.getElementById("filter-tanggal").style.display = "block";
          document.getElementById("header_history").style.display = "none";
          document.getElementById("item_table").style.display = "none";
          document.getElementById("btn_backward").style.display = "none";
          table.clear().draw(false);
        });
      });
    });
  </script>
</body>

</html>