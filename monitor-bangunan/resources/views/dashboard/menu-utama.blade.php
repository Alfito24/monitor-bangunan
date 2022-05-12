@extends('dashboard.master')
@section('css')
    <link href="css/dashboard/menu-utama.css" rel="stylesheet">
@endsection
@section('js')
    <script src="js/dashboard/menu-utama.js"></script>
@endsection
@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="cycle-tab-item active">
                            <a class="nav-link" role="tab" data-toggle="tab" href="#stakeholder">Stakeholder</a>
                        </li>
                        <li class="cycle-tab-item">
                            <a class="nav-link" role="tab" data-toggle="tab" href="#variabel">Variabel</a>
                        </li>
                        <li class="cycle-tab-item">
                            <a class="nav-link" role="tab" data-toggle="tab" href="#survey">Survey</a>
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
                                                    <tbody>
                                                        <tr>
                                                            <td>183</td>
                                                            <td>John Doe</td>
                                                            <td>11-7-2014</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success btn-sm">Edit</button>
                                                                 |
                                                                <button type="button" class="btn btn-info btn-sm">Detail</button>
                                                                 |
                                                                 <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                                                <h3 class="card-title">Data Variabel</h3>

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
                                                            <th>Variabel</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>xxxx</td>
                                                            <td> <button type="button"
                                                                    class="btn btn-success btn-sm">Add</button></td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
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
                                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
@endsection
