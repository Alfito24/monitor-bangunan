@extends('dashboard.master', ['proyekId' => $proyekId])
@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Informasi Stakeholder</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="formFileMultiple" class="form-label">Nama Stakeholder</label>
                        <input type="text" id="inputName" class="form-control" value="{{ $users->nama }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Usia</label>
                        <input type="text" id="inputName" class="form-control" value="{{ $users->usia }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Pendidikan Terakhir</label>
                        <input type="text" id="inputName" class="form-control" value="{{ $users->pendidikan }}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Pengetahuan Bangunan</label>
                        <input type="text" id="inputName" class="form-control" value="{{ $users->pengetahuan }}"
                            readonly>
                    </div>



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
    {{-- @if ($users->id == Auth::id())
    <div class="row ">
        <div class="col-12 mb-3">
            <a href="/updateprofil" class="btn btn-success float-right">Edit Profil</a>
        </div>
    </div>
    @endif --}}
    <!-- /.row -->
    <!-- Main row -->
@endsection
