@extends('dashboard.master')
@section('css')
<link href="css/dashboard/menu-utama.css" rel="stylesheet">
@endsection
@section('container')
<style>
    .box2{
        width: 90%;
        max-height: 130px;
        box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
        -webkit-box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
        -moz-box-shadow: 10px 10px 5px -3px rgba(0,0,0,0.24);
    }
</style>
<div class="card card-primary">
    <div class="card-header">
        <ul class="nav nav-tabs">
            <li class="cycle-tab-item active">
                <a class="nav-link" role="tab" data-toggle="tab" href="#ringkasan">Ringkasan</a>
            </li>
            <li class="cycle-tab-item">
                <a class="nav-link" role="tab" data-toggle="tab" href="#demografi">Demografi Responden</a>
            </li>
            <li class="cycle-tab-item">
                <a class="nav-link" role="tab" data-toggle="tab" href="#skor-kriteria">Skor Kriteria</a>
            </li>
            <li class="cycle-tab-item">
                <a class="nav-link" role="tab" data-toggle="tab" href="#relasi">Relasi Kriteria-Responden</a>
            </li>
            <li class="cycle-tab-item">
                <a class="nav-link" role="tab" data-toggle="tab" href="#rincian">Rincian</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="cycle-tab-container">
            <div class="tab-content">
                <div class="tab-pane fade" id="ringkasan" role="tabpanel" aria-labelledby="profile-tab">
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
                                <a role="tab" data-toggle="tab" href="#rincian" class="btn btn-dark text-light">Lihat rincian...</a>
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
                <div class="tab-pane fade" id="rincian" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <div class="container">
                                        <a class="btn btn-primary text-light fw-bold">Cetak</a>
                                    </div>
                                    <table class="table table-kriteria mt-3">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" scope="col" class="nomor">Rekomendasi Prioritas</th>
                                                <th scope="col" class="simbol">Simbol</th>
                                                <th scope="col" class="kriteria">Kriteria</th>
                                                <th colspan="3" class="skor">Responden</th>
                                                <th>Pengaruh Kriteria</th>
                                                <th>Skor Kriteria</th>
                                                <th>Kesesuaian Kriteria</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <th></th>
                                                <th></th>
                                                <th>Simbol</th>
                                                <th>Ekspektasi</th>
                                                <th>Realita</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>V2</td>
                                                <td>Bangunan tidak merusak nilai budaya masyarakat/warga sekitar.</td>
                                                <td>V2</td>
                                                <td>4</td>
                                                <td>4</td>
                                                <td>20%</td>
                                                <td>20%</td>
                                                <td>Sesuai</td>
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

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
