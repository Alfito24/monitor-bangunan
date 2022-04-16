@extends('dashboard.master')
@section('container')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>Daftar Proyek</h1>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @foreach ($proyeks as $proyek )
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img class="img-fluid" alt="100%x280"
                            src=https://cdn.discordapp.com/attachments/906163180328325130/914060163638505542/AlmondCrispyCheese_1.jpg>
                        <div class="card-body">
                            <h5 class="card-title">{{ $proyek->namaProyek }}</h5>
                            <br>
                            <h6 class="card-title">{{ $proyek->tanggalProyek }}</h6>
                            <br>
                            <a href="/varianoleh/21" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.row -->
            <!-- Main row -->

        </div>
        <!-- /.row (main row) -->
    @endsection
