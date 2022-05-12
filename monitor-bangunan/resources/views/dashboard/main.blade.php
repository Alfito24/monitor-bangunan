@extends('dashboard.master')
@section('container')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h1>Daftar Proyek</h1>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @foreach ($user as $u)
                    <div class="col-md-3 mb-3">
                        @foreach ($u->proyek as $p)
                        <div class="card h-100">
                            <img class="img-fluid" alt="100%x280"
                                src=https://cdn.discordapp.com/attachments/906163180328325130/914060163638505542/AlmondCrispyCheese_1.jpg>
                            <div class="card-body">
                                <h5 class="card-title">{{ $p->namaProyek }}</h5>
                                <br>
                                <h6 class="card-title">{{ $p->tanggalProyek }}</h6>
                                <br>
                                <a href="/varianoleh/21" class="stretched-link"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
            <!-- Main row -->

        </div>
        <!-- /.row (main row) -->
    @endsection
