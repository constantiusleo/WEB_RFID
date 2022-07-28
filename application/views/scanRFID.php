<!doctype html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
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
                                        <th>EPC</th>
                                        <th>Type</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>
                                        <center><input class="form-control" name="no1" id="no1" type="text" value="1" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no2" id="no2" type="text" value="2" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no3" id="no3" type="text" value="3" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no4" id="no4" type="text" value="4" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no5" id="no5" type="text" value="5" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no6" id="no6" type="text" value="6" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no7" id="no7" type="text" value="7" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no8" id="no8" type="text" value="8" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no9" id="no9" type="text" value="9" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no10" id="no10" type="text" value="10" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no11" id="no11" type="text" value="11" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no12" id="no12" type="text" value="12" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no13" id="no13" type="text" value="13" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no14" id="no14" type="text" value="14" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no15" id="no15" type="text" value="15" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;margin-bottom:5px"></center>
                                        <center><input class="form-control" name="no16" id="no16" type="text" value="16" style="text-align:center;height:40px;font-size: 13px;font-weight:bold;border:1px solid #FFFFFF;background: transparent;display:none;"></center>

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
            var nomor_next = "no".concat(newpos);
            var posisi_next = "epc_".concat(newpos);
            document.getElementById(nomor_next).style.display = "block";
            document.getElementById(posisi_next).style.display = "block";
            document.getElementById(posisi_next).focus();
        }
    </script>
</body>

</html>