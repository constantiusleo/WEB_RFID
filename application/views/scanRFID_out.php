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
            <h1 class="display-2 mb-0 text-gray-800"><?php echo $customer; ?></h1>

            <ol class="breadcrumb">
                <div class="text-right">
                    <a class="btn btn-secondary btn-lg" href="<?= base_url('#'); ?>" role="button">Kembali ke Dashboard</a>
                    <a class="btn btn-warning btn-lg" href="<?= base_url('PilihCustomer'); ?>" role="button">Pilih Customer Selanjutnya</a>
                    <div class="my-2">
                        <button type="button" type="submit" id="btn_submit" class="btn btn-primary btn-lg btn-block ">Submit</button>
                    </div>
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
                <div class="card mb-4">
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
                </div>
            </div>
            <div class="row">
                <div aria-live="polite" aria-atomic="true">
                    <div id="toast_success" class="toast text-white bg-success" style="position: absolute; bottom: 0; right: 0;">
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
                    <div id="toast_warning" class="toast text-white bg-warning" style="position: absolute; bottom: 0; right: 0;">
                        <div class="toast-header">
                            <strong class="mr-auto">WARNING</strong>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            <strong id="warning_text_id" class="mr-auto"></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" language="javascript">
        // Create a client instance
        client = new Paho.MQTT.Client("192.168.0.234", 9001, "web_rfid_" + parseInt(Math.random() * 100, 10));
        //ganti IP dengan milik Aisin atau IP untuk testing serta ganti protocol yang sesuai websocket atau tcp/ip

        // set callback handlers
        client.onConnectionLost = onConnectionLost;
        client.onMessageArrived = onMessageArrived;

        //############# ATTENTION: Enter Your MQTT user and password details ########  
        var options = {
            onSuccess: onConnect,
            onFailure: doFail
        }

        var i = 0;
        var type_i = 0;
        const type_arr = [];
        const epcs = [];
        var isDirty = false;

        // connect the client
        client.connect(options);

        // called when the client connects
        function onConnect() {
            // Once a connection has been made, make a subscription and send a message.
            console.log("onConnect");

            client.subscribe("rfid_tags_epc_out"); //ganti dengan topik yang sesuai

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
            var cust = "<?php echo $customer; ?>";
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo site_url() . 'ScanRFID_Out/TagScanned'; ?>",
                data: {
                    epc_send: mess,
                    epc_customer: cust
                },
                success: function(data) {
                    if (data.status && !(epcs.includes(mess))) {
                        epcs[i] = mess;
                        isDirty = true;
                        i++;
                        if (data.epc_status == "IN_DELIVERY") {
                            $("#toast_warning").toast({
                                delay: 7500
                            });
                            document.getElementById("warning_text_id").innerHTML =
                                "Tag memiliki status IN_DELIVERY, pastikan seluruh tag telah melalui gate yang sesuai!";
                            $("#toast_warning").toast('show');
                        }
                        var table = document.getElementById("epc_table").getElementsByTagName('tbody')[0];
                        var row = table.insertRow();
                        var cell1 = row.insertCell();
                        var cell2 = row.insertCell();
                        var cell3 = row.insertCell();
                        cell1.innerHTML = mess;
                        cell2.innerHTML = data.epc_type;
                        cell3.innerHTML = data.epc_time;
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
                    } else if (epcs.includes(mess)) {
                        $("#toast_warning").toast({
                            delay: 7500
                        });
                        document.getElementById("warning_text_id").innerHTML =
                            "Recurring Tag has been scanned: ".concat(mess);
                        $("#toast_warning").toast('show');

                    } else {
                        $("#toast_warning").toast({
                            delay: 7500
                        });
                        document.getElementById("warning_text_id").innerHTML =
                            "Unidentified Tag has been scanned: ".concat(mess);
                        $("#toast_warning").toast('show');
                    }
                },
                error: function(request, exception) {
                    alert(request.responseText);
                },
            });
        }

        $('#btn_submit').on('click', function() {
            var actionUrl = "<?php echo base_url() . 'ScanRFID_Out/TagUpdate'; ?>";
            var cust = "<?php echo $customer; ?>";
            isDirty = false;
            $.ajax({
                type: "POST",
                dataType: "json",
                url: actionUrl,
                data: {
                    epc_data_send: epcs,
                    epc_customer: cust,
                    epc_total: i
                },
                success: function(data) {
                    $("#epc_table tbody tr").remove();
                    for (let index = 0; index <= type_i; index++) {
                        document.getElementById("card_".concat(index)).style.display = "none";
                        document.getElementById("card_header_".concat(index)).innerHTML = " ";
                        document.getElementById("card_total_".concat(index)).innerHTML = 0;
                    }
                    i = 0;
                    type_i = 0;
                    type_arr.length = 0;
                    epcs.length = 0;
                    $("#toast_success").toast({
                        delay: 2500
                    });
                    $("#toast_success").toast('show');
                },
                error: function(request, exception) {
                    alert("Oh no! Something went wrong :(");
                },
            });
        });
        window.onload = function() {
            window.addEventListener("beforeunload", function(e) {
                if (!isDirty) {
                    return undefined;
                }

                var confirmationMessage = 'It looks like you have been editing something. ' +
                    'If you leave before saving, your changes will be lost.';

                (e || window.event).returnValue = confirmationMessage; //Gecko + IE
                return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
            });
        };
    </script>
</body>

</html>