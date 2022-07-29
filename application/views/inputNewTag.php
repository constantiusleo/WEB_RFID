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

          <form action="<?php echo base_url() . 'InputNewTag/NewTag'; ?>" method="post">
            <input class="form-control" name="number" id="number" type="hidden" value="1">
            <div class="table-responsive p-3">
              <table id="epc_table" class="table table-bordered align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th style="width:20%;" scope='col'>No</th>
                    <th style="width:80%;" scope='col-7'>EPC</th>
                  </tr>
                </thead>
                <tbody>
                  <td>
                    <center>
                      <div id="no1" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:block;margin-bottom:5px;margin-top:5px">1</div>
                      <div id="no2" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">2</div>
                      <div id="no3" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">3</div>
                      <div id="no4" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">4</div>
                      <div id="no5" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">5</div>
                      <div id="no6" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">6</div>
                      <div id="no7" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">7</div>
                      <div id="no8" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">8</div>
                      <div id="no9" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">9</div>
                      <div id="no10" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">10</div>
                      <div id="no11" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">11</div>
                      <div id="no12" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">12</div>
                      <div id="no13" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">13</div>
                      <div id="no14" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">14</div>
                      <div id="no15" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">15</div>
                      <div id="no16" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;">16</div>
                    </center>
                  </td>
                  <td>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_1" id="epc_1" type="text" step="any" autofocus style="text-align:center;height:40px;font-size: 15px;font-weight:bold;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_2" id="epc_2" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_3" id="epc_3" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_4" id="epc_4" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_5" id="epc_5" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_6" id="epc_6" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_7" id="epc_7" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_8" id="epc_8" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_9" id="epc_9" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_10" id="epc_10" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_11" id="epc_11" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_12" id="epc_12" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_13" id="epc_13" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_14" id="epc_14" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_15" id="epc_15" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px"></center>
                    <center><input class="form-control" onfocus="this.value=''" name="epc_16" id="epc_16" type="text" step="any" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;"></center>
                  </td>
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
    client = new Paho.MQTT.Client("192.168.1.88", 9001, "web_" + parseInt(Math.random() * 100, 10));
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
      var mess = message.payloadString;
      i++;
      document.getElementById("total_scanned").innerHTML = i;

      var focused = document.activeElement.getAttribute("name");
      document.getElementById(focused).value = mess;
      document.getElementById("number").value = i;
      var table = document.getElementById("");
      var newpos = i + 1;
      var nomor_next = "no".concat(newpos);
      var posisi_next = "epc_".concat(newpos);
      document.getElementById(nomor_next).style.display = "block";
      document.getElementById(posisi_next).style.display = "block";
      document.getElementById(posisi_next).focus();
    }
  </script>
</body>

</html>