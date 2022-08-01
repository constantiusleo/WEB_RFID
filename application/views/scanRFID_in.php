<!doctype html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>


<body>
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4"></div>
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
            <!-- Datatables Master Data -->
            <div class="col">
                <form action="<?php echo base_url() . 'ScanRFID_In/TagScanned'; ?>" method="post">
                    <div class="card mb-4">
                        <input class="form-control" name="number" id="number" type="hidden" value="0">
                        <div class="table-responsive p-3">
                            <table id="epc_table" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:60%;">EPC</th>
                                        <th style="width:20%;">Type</th>
                                        <th style="width:20%;">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript" language="javascript">
        // Create a client instance
        client = new Paho.MQTT.Client("172.16.6.21", 9001, "web_" + parseInt(Math.random() * 100, 10));
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

            client.subscribe("rfid_tags_epc_in");

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
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo site_url() . 'ScanRFID_In/TagScanned'; ?>",
                data: {
                    epc_send: mess,
                },
                success: function(data) {
                    if (data.status == false) {
                        getMessageErrorScan(data.status);
                    } else {
                        var table = document.getElementById("epc_table");
                        var row = table.insertRow(-1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        cell1.innerHTML = mess;
                        cell2.innerHTML = data.epc_received;
                        cell3.innerHTML = data.epc_time;
                    }
                },
                error: function(request, exception) {
                    alert(request.responseText);
                },
            });
        }
    </script>
</body>

</html>