@extends('template.main-landing')
@section('title-name', 'Register')
@section('header')
    @include('template.header-landing')
@endsection

@section('css')
    <link href="css/register.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="container2">
            <h1 class="text-center">Registrasi Proyek</h1>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="/proyekform">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Nama Proyek</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Proyek</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1">
                        </div>
                        {{-- <div class="mb-3 form-group" hidden>
                            <label for="exampleInputEmail1" class="form-label">User ID</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1">
                        </div> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('template.footer-landing')
@endsection
