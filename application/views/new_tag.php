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
        <!-- PALET BIRU Available Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Biru</div>
                            <div class="h5 mb-0 font-weight-bold text-success mr-2">192</div>
                        </div>
                        <div class="col-auto">
                            <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PALET HIJAU Available Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Hijau</div>
                            <div class="h5 mb-0 font-weight-bold text-success mr-2">193</div>
                        </div>
                        <div class="col-auto">
                            <img src="assets/img/house-door.svg" alt="Bootstrap" width="32" height="32">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PALET BIRU Delivery Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Biru</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-warning mr-2">120</div>
                        </div>
                        <div class="col-auto">
                            <img src="assets/img/truck.svg" alt="Bootstrap" width="32" height="32">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PALET HIJAU Delivery  Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Palet Hijau</div>
                            <div class="h5 mb-0 font-weight-bold text-warning mr-2">133</div>
                        </div>
                        <div class="col-auto">
                            <img src="assets/img/truck.svg" alt="Bootstrap" width="32" height="32">
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
                    <table class="table table-bordered align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope='col'>No</th>
                                <th scope='col-7'>EPC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>0C00 2802 9C13 0124 9000 3B3B 2C01</th>
                            </tr>
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
                    <form>
                        <select class="form-control">
                            <option>PALET HIJAU</option>
                            <option>PALET BIRU</option>
                            <option>BOX 331</option>
                        </select>
                        <div class="form-group align-self-end" bis_skin_checked="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>