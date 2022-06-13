@extends('dashboard.master')
@section('css')
    <link href="css/dashboard/menu-utama.css" rel="stylesheet">
@endsection
@section('js')
    <script src="js/dashboard/menu-utama.js"></script>
    <script>
        function verifyAnswer() {
            //get the selected value from the dropdown list
            var x = "myAns";
            var mylist = document.getElementById(x);
            var result = mylist.options[mylist.selectedIndex].text;
            if (result == 'No') {
                //disable all the radio button
                document.getElementById("e1").disabled = true;
                document.getElementById("e2").disabled = true;
                document.getElementById("e3").disabled = true;
                document.getElementById("e4").disabled = true;
                document.getElementById("e5").disabled = true;
                document.getElementById("r1").disabled = true;
                document.getElementById("r2").disabled = true;
                document.getElementById("r3").disabled = true;
                document.getElementById("r4").disabled = true;
                document.getElementById("r5").disabled = true;
            } else {
                //enable all the radio button
                document.getElementById("e1").disabled = false;
                document.getElementById("e2").disabled = false;
                document.getElementById("e3").disabled = false;
                document.getElementById("e4").disabled = false;
                document.getElementById("e5").disabled = false;
                document.getElementById("r1").disabled = false;
                document.getElementById("r2").disabled = false;
                document.getElementById("r3").disabled = false;
                document.getElementById("r4").disabled = false;
                document.getElementById("r5").disabled = false;
            }
        }
    </script>
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

                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <button type="button" class="btn btn-primary mt-2" data-toggle="collapse"
                                                data-target="#demo">Klik di sini untuk
                                                menambah stakeholder</button>
                                            <div id="demo" class="collapse container">
                                                <form action="/tambahStakeholder" method="POST">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="mb-3 mt-3">
                                                                @csrf
                                                                <label for="email" class="form-label">Email
                                                                    Stakeholder</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    aria-describedby="emailHelp" name="email">
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
                                                                <th>Stakeholder</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        @foreach ($survey as $sv)
                                                            @foreach ($responden as $res)
                                                                @if ($res->survey_id === $sv->survey_id)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $loop->iteration }}</td>
                                                                                <td>{{ $sv->nama_survey }}</td>
                                                                                <td>{{ date('d-m-Y', strtotime($sv->tanggal_dibuat)) }}
                                                                                </td>
                                                                                <td>{{ date('d-m-Y', strtotime($sv->tanggal_kadaluwarsa)) }}
                                                                                </td>
                                                                                <td>{{ $res->nama }}</td>
                                                                                @if ($res->status == '1')
                                                                                    <td>
                                                                                        <h6><span
                                                                                                class="badge bg-secondary">Belum
                                                                                                Diisi</span></h6>
                                                                                    </td>
                                                                                @elseif($res->status == '2')
                                                                                    <td><span class="badge bg-success">Sudah
                                                                                            Diisi</span>
                                                                                    </td>
                                                                                @else
                                                                                    <td><span
                                                                                            class="badge bg-danger">Expired
                                                                                        </span>
                                                                                    </td>
                                                                                @endif
                                                                            </tr>
                                                                        </tbody>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </table>

                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <button style="margin-left:10px" type="button" class="btn btn-primary mt-2"
                                                data-toggle="collapse" data-target="#demo">Klik di sini untuk
                                                menambah survey</button>
                                            <div id="demo" class="collapse container">
                                                <form action="/tambahSurvey" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="hidden" name="proyek_id" id="proyek_id"
                                                            value="{{ $proyek->id }}">
                                                        <div class="  col-4">
                                                            <div class="mb-3 mt-3">
                                                                <label for="nama_survey" class="form-label">Nama
                                                                    Survey</label>
                                                                <input type="text" class="form-control" id="nama_survey"
                                                                    aria-describedby="emailHelp" name="nama_survey">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3 mt-3">
                                                                <label for="tanggalMulai" class="form-label">Tanggal
                                                                    Dimulai</label>
                                                                <input type="date" class="form-control" id="tanggalMulai"
                                                                    aria-describedby="emailHelp" name="tanggal_dibuat">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3 mt-3">
                                                                <label for="tanggalBerakhir" class="form-label">Tanggal
                                                                    Berakhir</label>
                                                                <input type="date" class="form-control"
                                                                    id="tanggalBerakhir" aria-describedby="emailHelp"
                                                                    name="tanggal_kadaluwarsa">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @foreach ($stakeholder as $stakeholder)
                                                        <div class="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ $stakeholder->user_id }}"
                                                                    id="flexCheckDefault" name="responden[]">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    {{ $stakeholder->nama }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{-- <div class="row">
                                                                            <div class="col-8">
                                                                                <div class="form-group">
                                                                                    <label><strong>Variabel :</strong></label><br>
                                                                                    @foreach ($listVariabel as $list)
                                                                                    <label><input type="checkbox" name="category[]"
                                                                                        value="{{ $list->id }}">{{ $list->isiVariabel }}</label>
                                                                                        <br>
                                                                                        @endforeach

                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                    <div class="row mb-3">
                                                        <div class="col-4">
                                                            <button type="submit" id="buttonStoreStakeholder"
                                                                class="btn btn-primary mt-2">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="survey" role="tabpanel" aria-labelledby="settings-tab">
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Hasil Survey
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            {{-- <form role="form">
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
                                                                            </form> --}}
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
