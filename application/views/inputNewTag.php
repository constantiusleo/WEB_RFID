<!doctype html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
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
                <div class="text-xs font-weight-bold text-uppercase mb-1">Tags Scanned</div>
                <div id="total_scanned" class="h5 mb-0 font-weight-bold text-success mr-2">0</div>
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
            <h6 class="m-0 font-weight-bold text-primary ">RFID READER</h6>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Start Scanning</button>
          <div class="table-responsive p-3">
            <table id="epc_table" class="table table-bordered align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope='col'>No</th>
                  <th scope='col-7'>EPC</th>
                </tr>
              </thead>
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
  <script type="text/javascript" language="javascript">
    // Create a client instance
    client = new Paho.MQTT.Client("192.168.1.88", 8080, "web_" + parseInt(Math.random() * 100, 10));
    // client = new Paho.MQTT.Client("13.76.228.167", 8083,"web_" + parseInt(Math.random() * 100, 10));

    // set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    //############# ATTENTION: Enter Your MQTT user and password details ########  
    var options = {
      userName: "admin_mqtt_test",
      password: "aii2022",
      onSuccess: onConnect,
      onFailure: doFail
    }

    var i = 0;

    // connect the client
    client.connect(options);

    // called when the client connects
    function onConnect() {
      // Once a connection has been made, make a subscription and send a message.
      console.log("onConnect");

      client.subscribe("rfid_tags_epc");

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

    // called when a message arrives
    function onMessageArrived(message) {
      console.log(message.payloadString);
      i++;
      document.getElementById("total_scanned").innerHTML = i;

      var table = document.getElementById("epc_table");
      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      cell1.innerHTML = i;
      cell2.innerHTML = message.payloadString;
    }
  </script>
</body>

</html>