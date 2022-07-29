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
            <h1 class="h3 mb-0 text-gray-800">Scan RFID</h1>
            <ol class="breadcrumb">
                <div class="text-right">
                    <a class="btn btn-secondary" href="<?= base_url('#'); ?>" role="button">Kembali ke Dashboard</a>
                    <a class="btn btn-primary" href="<?= base_url('PilihCustomer'); ?>" role="button">Pilih Customer Selanjutnya</a>
                </div>
            </ol>
        </div>
        <div class="row">
            <!-- Datatables Master Data -->
            <div class="col">
                <form action="<?php echo base_url() . 'ScanRFID/TagScanned'; ?>" method="post">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $customer; ?></h6>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary text-right">Submit</button>
                            </div>
                        </div>
                        <input class="form-control" name="costumer_data" id="costumer_data" type="hidden" value=<?php echo $customer; ?>>
                        <input class="form-control" name="number" id="number" type="hidden" value="0">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:60%;">EPC</th>
                                        <th style="width:20%;">Type</th>
                                        <th style="width:20%;">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                    <td>
                                        <center>
                                            <div id="type_1" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:block;margin-bottom:5px;margin-top:5px"></div>
                                            <div id="type_2" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_3" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_4" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_5" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_6" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_7" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_8" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_9" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_10" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_11" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_12" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_13" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_14" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_15" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                            <div id="type_16" style="text-align:center;height:40px;font-size: 15px;font-weight:bold;display:none;margin-bottom:5px;"></div>
                                        </center>
                                    </td>
                                </tbody>
                                <tfoot>
                                    <th style="width:60%;"><?php echo $data; ?>></th>
                                    <th style="width:20%;">Type</th>
                                    <th style="width:20%;">Waktu</th>
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
        $(".form-control").change(function() {
            var epc_data = $("input").val();
            $.post("<?php echo base_url() . 'ScanRFID/TagType'; ?>", {
                epc_send: epc_data
            }, function(data) {
                $("#type_".concat(i)).html(data)
            });
        });
        // called when a message arrives
        function onMessageArrived(message) {
            console.log(message.payloadString);
            var mess = message.payloadString;
            i++;

            var focused = document.activeElement.getAttribute("name");
            document.getElementById(focused).value = mess;
            document.getElementById("number").value = i;
            var table = document.getElementById("");
            var newpos = i + 1;
            var posisi_next = "epc_".concat(newpos);
            document.getElementById(posisi_next).style.display = "block";
            document.getElementById(posisi_next).focus();
        }
    </script>
</body>

</html>