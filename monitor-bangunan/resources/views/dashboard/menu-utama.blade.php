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
<style>
    .box{
        width: 100%;
        max-height: 500px;
        box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
-webkit-box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
-moz-box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
    }
    .box2{
        width: 90%;
        max-height: 130px;
        box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
-webkit-box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
-moz-box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
    }
    .kriteria{
        width:350px;
    }
    .table-kriteria td{
        text-align: justify;
    }
    .simbol , .skor , .nomor{
        width: 100px;
    }
</style>
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
                                                                    @if ($sv->id !== Auth::id())
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
                                            <div class="card-header">
                                                <ul class="nav nav-tabs">
                                                    <li class="cycle-tab-item active">
                                                        <a class="nav-link" role="tab" data-toggle="tab" href="#informasi-toko">Ringkasan</a>
                                                    </li>
                                                    <li class="cycle-tab-item">
                                                        <a class="nav-link" role="tab" data-toggle="tab" href="#gambar-1">Demografi Responden </a>
                                                    </li>
                                                    <li class="cycle-tab-item">
                                                        <a class="nav-link" role="tab" data-toggle="tab" href="#gambar-2">Skor Kriteria</a>
                                                    </li>
                                                    <li class="cycle-tab-item">
                                                        <a class="nav-link" role="tab" data-toggle="tab" href="#gambar-3">Relasi Kriteria-Responden</a>
                                                    </li>
                                                    <li class="cycle-tab-item">
                                                        <a class="nav-link" role="tab" data-toggle="tab" href="#gambar-4">Rincian</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="cycle-tab-container">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade" id="informasi-toko" role="tabpanel" aria-labelledby="profile-tab">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-9">
                                                                        <div class="box">
                                                                           <div class="container">
                                                                            <h3 class="mb-3">Rekomendasi Prioritas</h3>
                                                                           </div>
                                                                           <table class="table table-kriteria mt-3">
                                                                            <thead>
                                                                              <tr>
                                                                                <th scope="col" class="nomor">#</th>
                                                                                <th scope="col" class="simbol">Simbol</th>
                                                                                <th scope="col" class="kriteria">Kriteria</th>
                                                                                <th scope="col" class="skor">Skor</th>
                                                                              </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                              <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>V1</td>
                                                                                <td>Bangunan menyediakan kemudahan akses terhadap fasilitas publik (transportasi umum, pendidikan, rekreasi, tempat kerja, pusat perbelanjaan, olahraga, dll).</td>
                                                                                <td>5.00</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>V2</td>
                                                                                <td>Bangunan tidak merusak nilai budaya masyarakat/warga sekitar.</td>
                                                                                <td>5.00</td>
                                                                              </tr>
                                                                              <tr>
                                                                                <th scope="row">3</th>
                                                                                <td >V3</td>
                                                                                <td>Tertatanya alur keluar masuk kendaraan pada bangunan.</td>
                                                                                <td>5.00</td>
                                                                              </tr>
                                                                            </tbody>
                                                                          </table>
                                                                        </div>
                                                                        <a href="" class="btn btn-dark text-light">Lihat rincian...</a>
                                                                    </div>
                                                                    <div class="col-3">
                                                                       <div class="row">
                                                                           <div class="col-12 box2">
                                                                               <div class="row">
                                                                                   <div class="col-8 align-middle d-flex">
                                                                                      <p class="align-self-center" style="font-size: 1.2rem">Jumlah Kriteria</p>
                                                                                   </div>
                                                                                   <div class="col-4 d-flex">
                                                                                       <h1 style="font-size: 60px" class="align-self-center">5</h1>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                       <div class="row mt-4">
                                                                           <div class="col-12 box2">
                                                                               <div class="row">
                                                                                   <div class="col-8 align-middle d-flex">
                                                                                      <p class="align-self-center" style="font-size: 1.2rem">Jumlah Responden</p>
                                                                                   </div>
                                                                                   <div class="col-4 d-flex">
                                                                                       <h1 style="font-size: 60px" class="align-self-center">5</h1>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                       <div class="row mt-4">
                                                                            <div class="col-12 box2">
                                                                                <h4>Skor Keseluruhan : </h4>
                                                                                <p><span class="" style="font-size: 60px;color:green">5.00</span><span style="font-size: 1.5rem">/5</span></p>
                                                                            </div>
                                                                       </div>
                                                                       <div class="row mt-4">
                                                                        <div class="col-12 box2">
                                                                            <div class="row">
                                                                                <div class="col-3 d-flex">
                                                                                    <h1 style="font-size: 60px" class="align-self-center">5</h1>
                                                                                </div>
                                                                                <div class="col-9 align-middle d-flex">
                                                                                    <p class="align-self-center" style="font-size: 1.1rem">kriteria <span style="color:red;font-weight:bold" class="fw-bold">belum mencapai</span> ekspektasi responden</p>
                                                                                 </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                       <div class="row mt-4">
                                                                        <div class="col-12 box2">
                                                                            <div class="row">
                                                                                <div class="col-3 d-flex">
                                                                                    <h1 style="font-size: 60px" class="align-self-center">5</h1>
                                                                                </div>
                                                                                <div class="col-9 align-middle d-flex">
                                                                                    <p class="align-self-center" style="font-size: 1.1rem">kriteria <span style="font-weight:bold" class="fw-bold">sesuai dengan</span> ekspektasi responden</p>
                                                                                 </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                       <div class="row mt-4">
                                                                        <div class="col-12 box2">
                                                                            <div class="row">
                                                                                <div class="col-3 d-flex">
                                                                                    <h1 style="font-size: 60px" class="align-self-center">5</h1>
                                                                                </div>
                                                                                <div class="col-9 align-middle d-flex">
                                                                                    <p class="align-self-center" style="font-size: 1.1rem">kriteria <span style="color:green;font-weight:bold" class="fw-bold">melebihi</span> ekspektasi responden</p>
                                                                                 </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <section class="variabel-relevansi">
        <h5>Relevansi Variabel</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Relevansi</th>
                    <th scope="col">Ekspektasi</th>
                    <th scope="col">Realita</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listVariabel as $lv)
                    <tr>
                        <th scope="row">{{ $lv->id }}</th>
                        <td>{{ $lv->isiVariabel }}</td>
                        <td>
                            <form>
                                <!-- create a list relevansi -->
                                <select id="myAns" onchange="verifyAnswer()" class="form-select">
                                    <option value="choose"> --choose -- </option>
                                    <option value="yes"> Yes </option>
                                    <option value="no"> No </option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form id="$lv->id">
                                <label> <input type="radio" name="ekspektasi" id="e1" value="1"> 1 </label>
                                <label> <input type="radio" name="ekspektasi" id="e2" value="2"> 2 </label>
                                <label> <input type="radio" name="ekspektasi" id="e3" value="3"> 3 </label>
                                <label> <input type="radio" name="ekspektasi" id="e4" value="4"> 4 </label>
                                <label> <input type="radio" name="ekspektasi" id="e5" value="5"> 5 </label>

                            </form>
                        </td>
                        <td>
                            <form id="$lv->id">
                                <label> <input type="radio" name="realita" id="r1" value="1"> 1 </label>
                                <label> <input type="radio" name="realita" id="r2" value="2"> 2 </label>
                                <label> <input type="radio" name="realita" id="r3" value="3"> 3 </label>
                                <label> <input type="radio" name="realita" id="r4" value="4"> 4 </label>
                                <label> <input type="radio" name="realita" id="r5" value="5"> 5 </label>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
