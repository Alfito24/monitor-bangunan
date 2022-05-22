@extends('dashboard.master')
@section('css')
    <link href="css/dashboard/menu-utama.css" rel="stylesheet">
@endsection
@section('js')
    <script src="js/dashboard/menu-utama.js"></script>
@endsection
@section('container')
    @foreach ($proyek as $proyek)
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="cycle-tab-item active">
                                <a class="nav-link" role="tab" data-toggle="tab" href="#stakeholder">Stakeholder</a>
                            </li>
                            <li class="cycle-tab-item">
                                <a class="nav-link" role="tab" data-toggle="tab" href="#variabel">Survey</a>
                            </li>
                            <li class="cycle-tab-item">
                                <a class="nav-link" role="tab" data-toggle="tab" href="#survey">Hasil Survey</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="cycle-tab-container">

                            <div class="tab-content">
                                <div class="tab-pane fade" id="stakeholder" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Data Stakeholder</h3>
                                                    <div class="card-tools">
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search"
                                                                class="form-control float-right" placeholder="Search">

                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default"><i
                                                                        class="fas fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                                    <table class="table table-head-fixed text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Stakeholder</th>
                                                                <th>Peran</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                       
                                                        @foreach ($stakeholder as $s)
                                                            @if ($s->id !== Auth::id())
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $s->nama }}</td>
                                                                        <td>{{ $s->peran }}</td>
                                                                        <td>
                                                                            <a
                                                                                href="/dashboard/profil/{{ $proyek->id }}/{{ $s->user_id }}"><button
                                                                                    type="button"
                                                                                    class="btn btn-info btn-sm">Detail</button></a>
                                                                            |
                                                                            <a
                                                                                href="/hapusStakeholder/{{ $proyek->id }}/{{ $s->user_id }}"><button
                                                                                    type="button"
                                                                                    class="btn btn-danger btn-sm">Delete</button></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                    <button type="button" class="btn btn-primary mt-2"
                                                        data-toggle="collapse" data-target="#demo">Klik di sini untuk
                                                        menambah stakeholder</button>
                                                    <div id="demo" class="collapse container">
                                                        <form action="/tambahStakeholder" method="POST">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="mb-3 mt-3">
                                                                        @csrf
                                                                        <label for="email" class="form-label">Email
                                                                            Stakeholder</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email" aria-describedby="emailHelp"
                                                                            name="email">
                                                                        <input type="hidden" id="proyekId" name="proyekId"
                                                                            value="{{ $proyek->id }}">
                                                                        <button type="submit" id="buttonStoreStakeholder"
                                                                            class="btn btn-primary mt-2">Simpan</button>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <button type="submit" class="btn btn-default"><i
                                                                                class="fas fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="variabel" role="tabpanel" aria-labelledby="messages-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Data Survey</h3>
                                                    <div class="card-tools">
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search"
                                                                class="form-control float-right" placeholder="Search">

                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default"><i
                                                                        class="fas fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                                    <table class="table table-head-fixed text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Survey</th>
                                                                <th>Tanggal Dimulai</th>
                                                                <th>Tanggal Berakhir</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Survey Sekolah</td>
                                                                <td>2022-05-07</td>
                                                                <td>2022-07-07</td>
                                                                <td> <a class="btn btn-success btn-sm text-light"
                                                                        href="/isisurvey">Available</a></td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <button style="margin-left:10px" type="button" class="btn btn-primary mt-2"
                                                        data-toggle="collapse" data-target="#demo">Klik di sini untuk
                                                        menambah survey</button>
                                                    <div id="demo" class="collapse container">
                                                        <form action="/tambahStakeholder" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="email" class="form-label">Nama Survey</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email" aria-describedby="emailHelp"
                                                                            name="email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="tanggalMulai" class="form-label">Tanggal Dimulai</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggalMulai" aria-describedby="emailHelp"
                                                                            name="tanggalMulai">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3 mt-3">
                                                                        <label for="tanggalBerakhir" class="form-label">Tanggal Berakhir</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggalBerakhir" aria-describedby="emailHelp"
                                                                            name="tanggalBerakhir">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" >
                                                                <div class="col-8">
                                                                    <div class="form-group">
                                                                        <label><strong>Variabel :</strong></label><br>
                                                                        <label><input type="checkbox" name="category[]" value="Laravel"> Variabel 1</label> <br>
                                                                        <label><input type="checkbox" name="category[]" value="JQuery"> Variabel 2</label> <br>
                                                                        <label><input type="checkbox" name="category[]" value="Bootstrap"> Variabel 3</label> <br>
                                                                        <label><input type="checkbox" name="category[]" value="Codeigniter"> Variabel 4</label> <br>
                                                                        <label><input type="checkbox" name="category[]" value="JQuery UI"> Variabel 5</label>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3" >
                                                                <div class="col-4">
                                                                    <button type="submit" id="buttonStoreStakeholder"
                                                                            class="btn btn-primary mt-2">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="survey" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Tambah Survey
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form role="form">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            placeholder="Enter email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password</label>
                                                        <input type="password" class="form-control"
                                                            id="exampleInputPassword1" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">File input</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="exampleInputFile">
                                                                <label class="custom-file-label"
                                                                    for="exampleInputFile">Choose
                                                                    file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="">Upload</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1">Check me
                                                            out</label>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    @endforeach
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
