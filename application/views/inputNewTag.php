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
      <h1 class="h3 mb-0 text-gray-800">Input New Tag</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Input</li>
        <li class="breadcrumb-item active" aria-current="page">New tag</li>
      </ol>
    </div>
    <div class="row mb-3">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1"># of Tags Scanned</div>
                <div id="total_scanned" class="h5 mb-0 font-weight-bold mr-2">0</div>
              </div>
              <div class="col-auto">
                <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--  Master Data -->
      <div class="col">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" bis_skin_checked="1">
            <h6 class="m-0 font-weight-bold text-primary ">Tags Scanned</h6>
          </div>
          <div class="table-responsive p-3">
            <table id="epc_table" class="table table-bordered align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th style="width:20%;" scope='col'>No</th>
                  <th style="width:80%;" scope='col-7'>EPC</th>
                </tr>
              </thead>
              <tbody>
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
            <select id='select_type' class="form-control">
              <?php foreach ($data as $value) { ?>
                <option value="<?php echo $value->Type; ?>"><?php echo $value->Type; ?></option>
              <?php } ?>
            </select>
            <div class="align-self-end" bis_skin_checked="1">
            </div>
            <div class="my-2 text-right">
              <button type="button" type="submit" id="btn_submit" class="btn btn-primary text-right">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div aria-live="polite" aria-atomic="true">
          <div class="toast text-white bg-success" style="position: absolute; bottom: 0; right: 0;">
            <div class="toast-header">
              <strong class="mr-auto">Success</strong>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              <img src="assets/img/check-circle.svg" alt="Bootstrap" width="32" height="32">
              <strong class="mr-auto">Data Berhasil Dimasukkan</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" language="javascript">
    // Create a client instance
    client = new Paho.MQTT.Client("192.168.1.86", 9001, "web_" + parseInt(Math.random() * 100, 10));

    // set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    //############# ATTENTION: Enter Your MQTT user and password details ########  
    var options = {
      userName: "AdminMQTT",
      password: "pwd123",
      onSuccess: onConnect,
      onFailure: doFail
    }

    var i = 0;
    const epcs = [];

    // connect the client
    client.connect(options);

    // called when the client connects
    function onConnect() {
      // Once a connection has been made, make a subscription and send a message.
      console.log("onConnect");

      client.subscribe("rfid_tags_epc_out");

    }

    function doFail(e) {
      console.log("GAGAL");
      console.log(e);
    }

    // called when the client loses its connection
    function onConnectionLost(responseObject) {
      if (responseObject.errorCode !== 0) {
        console.log("onConnectionLost:" + responseObject.errorMessage);
      }
    }

    function onMessageArrived(message) {
      console.log(message.payloadString);
      var mess = message.payloadString;
      epcs[i] = mess;
      i++;
      document.getElementById("total_scanned").innerHTML = i;
      var table = document.getElementById("epc_table").getElementsByTagName('tbody')[0];
      var row = table.insertRow();
      var cell1 = row.insertCell();
      var cell2 = row.insertCell();
      cell1.innerHTML = i;
      cell2.innerHTML = mess;
    }
    $('#btn_submit').on('click', function() {
      var form = $(this);
      var actionUrl = "<?php echo base_url() . 'InputNewTag/NewTag'; ?>";
      var type_new = $('#select_type').val();
      $.ajax({
        type: "POST",
        dataType: "json",
        url: actionUrl,
        data: {
          epc_send: epcs,
          type_send: type_new
        },
        success: function(data) {
          $("#epc_table tbody tr").remove();
          document.getElementById("total_scanned").innerHTML = 0;
          i = 0;
          epcs.length = 0;
          $('.toast').toast({
            delay: 2500
          });
          $('.toast').toast('show');
        },
        error: function(request, exception) {
          alert("GAGAL");
        },
      });
    });
  </script>
</body>

</html>