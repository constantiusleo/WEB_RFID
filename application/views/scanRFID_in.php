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
            <h1 id="last_customer" class="display-2 mb-0 text-gray-800">BOX MASUK</h1>
            <ol class="breadcrumb">
                <div class="text-right">
                    <a class="btn btn-primary btn-lg btn-block " href="<?= base_url('#'); ?>" role="button">Kembali ke Dashboard</a>
                </div>
            </ol>
        </div>
        <div class="row mb-3">
            <div class="col-xl-3 col-md-6 mb-4">
                <div id="card_0" class="card" style="display:none;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div id="card_header_0" class="text-xl font-weight-bold text-uppercase mb-1"> </div>
                                <div id="card_total_0" class="h3 mb-0 font-weight-bold mr-2">0</div>
                            </div>
                            <div class="col-auto">
                                <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div id="card_1" class="card" style="display:none;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div id="card_header_1" class="text-xl font-weight-bold text-uppercase mb-1"> </div>
                                <div id="card_total_1" class="h3 mb-0 font-weight-bold mr-2">0</div>
                            </div>
                            <div class="col-auto">
                                <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div id="card_2" class="card" style="display:none;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div id="card_header_2" class="text-xl font-weight-bold text-uppercase mb-1"> </div>
                                <div id="card_total_2" class="h3 mb-0 font-weight-bold mr-2">0</div>
                            </div>
                            <div class="col-auto">
                                <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div id="card_3" class="card" style="display:none;">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div id="card_header_3" class="text-xl font-weight-bold text-uppercase mb-1"> </div>
                                <div id="card_total_3" class="h3 mb-0 font-weight-bold mr-2">0</div>
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
                <form action="<?php echo base_url() . 'ScanRFID_Out/TagScanned'; ?>" method="post">
                    <div class="card mb-4">
                        <div class="table-responsive p-3">
                            <table id="epc_table" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:40%;">EPC</th>
                                        <th style="width:30%;">Customer</th>
                                        <th style="width:15%;">Type</th>
                                        <th style="width:15%;">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript" language="javascript">
        // Create a client instance
        client = new Paho.MQTT.Client("192.168.43.18", 9001, "web_" + parseInt(Math.random() * 100, 10));
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
        var type_i = 0;
        const type_arr = [];
        const epcs = [];

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
            epcs[i] = mess;
            i++;
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo site_url() . 'ScanRFID_In/TagScanned'; ?>",
                data: {
                    epc_send: mess
                },
                success: function(data) {
                    if (data.status == false) {
                        getMessageErrorScan(data.status);
                    } else {
                        var table = document.getElementById("epc_table").getElementsByTagName('tbody')[0];
                        var row = table.insertRow();
                        var cell1 = row.insertCell();
                        var cell2 = row.insertCell();
                        var cell3 = row.insertCell();
                        var cell4 = row.insertCell();
                        cell1.innerHTML = epcs[(i - 1)];
                        cell2.innerHTML = data.epc_customer;
                        cell3.innerHTML = data.epc_type;
                        cell4.innerHTML = data.epc_time;
                        document.getElementById("last_customer").innerHTML = data.epc_customer;
                        if (type_arr.length == 0) {
                            type_arr[type_i] = data.epc_type;
                            document.getElementById("card_0").style.display = "block";
                            document.getElementById("card_header_0").innerHTML = data.epc_type;
                            document.getElementById("card_total_0").innerHTML++;
                            type_i++;
                        } else if (type_arr.includes(data.epc_type)) {
                            let index = type_arr.indexOf(data.epc_type);
                            document.getElementById("card_total_".concat(index)).innerHTML++;
                        } else {
                            type_arr[type_i] = data.epc_type;
                            document.getElementById("card_".concat(type_i)).style.display = "block";
                            document.getElementById("card_header_".concat(type_i)).innerHTML = data.epc_type;
                            document.getElementById("card_total_".concat(type_i)).innerHTML++;
                            type_i++;
                        }
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