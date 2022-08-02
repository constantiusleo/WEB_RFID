<!doctype html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">History</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">History</li>
      </ol>
    </div>
    <div class="row">
      <!-- Datatables Master Data -->
      <div class="col">
        <div class="card mb-4">
          <div class="card-header d-flex flex-row align-items-center justify-content-between">
          </div>
          <div id="header_table" class="table-responsive p-3" style="display: block;">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Customer</th>
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
                    <td><?php echo $value->timestamp; ?></td>
                    <td><?php echo $value->total_tag; ?></td>
                    <td>
                      <button value="<?php echo $value->id; ?>" class="btn btn-primary float-sm-center">Detail</button>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div id="item_table" class="table-responsive p-3" style="display: none;">
            <table class="table align-items-center table-flush" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>EPC</th>
                  <th>Type</th>
                  <th>Customer</th>
                  <th>Waktu_Keluar</th>
                  <th>Waktu_Masuk</th>
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
    $('button').on('click', function() {
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
          document.getElementById("item_table").style.display = "block";
          var table = document.getElementById("item_table").getElementsByTagName('tbody')[0];
          data.table_send.forEach(element => {
            var row = table.insertRow();
            var cell1 = row.insertCell();
            var cell2 = row.insertCell();
            var cell3 = row.insertCell();
            var cell4 = row.insertCell();
            var cell5 = row.insertCell();
            var cell6 = row.insertCell();
            cell1.innerHTML = element.id;
            cell2.innerHTML = element.EPC;
            cell3.innerHTML = element.Type;
            cell4.innerHTML = element.Customer;
            cell5.innerHTML = element.Waktu_Keluar;
            cell6.innerHTML = element.Waktu_Masuk;
          });
        },
        error: function(request, exception) {
          alert("GAGAL");
        },
      });
    });
  </script>
</body>

</html>