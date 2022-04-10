<style>
.container{
    display: flex;
}
.container2{
    align-items: center;
    justify-content: center;
    width: 500px;
    background: rgb(180, 170, 170);
    padding: 20px;
    border-radius: 10px;
    margin: 50px auto;
    min-height: 50vh;
}
</style>
@extends('master')
@section('container')
<div class="container">
    <div class="container2">
        <h1 class="text-center">Registrasi Stakeholders</h1>
   <div class="row">
   <div class="col-12">
    <form method="POST" action="/register">
        @csrf
        <div class="mb-3 form-group">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="mb-3 form-group">
          <label for="exampleInputEmail1" class="form-label">Nama</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="mb-3 form-group">
            <label for="sel1" class="form-label">Kategori</label>
            <select class="form-select" id="sel1" name="kategori">
            <option value="0">Pilih kategori</option>
            <option value="industri">Industri</option>
            <option value="pemilik">Pemilik</option>
            <option value="pengguna">Pengguna Bangunan</option>
            <option value="masyarakat">Masyarakat</option>
            </select>
        </div>
        <div class="mb-3 form-group">
            <label for="sel1" class="form-label">Peran</label>
            <select class="form-select" id="sel1" name="peran">
            <option value="0">Pilih peran</option>
            <option value="owner1">Owner I</option>
            <option value="owner2">Owner II</option>
            <option value="manajemen">Manajemen Bangunan</option>
            <option value="keamanan">Keamanan</option>
            <option value="kebesihan">Kebesihan</option>
            <option value="penghuni">Penghuni</option>
            <option value="tamu">Tamu</option>
            <option value="pengguna-kantor">Pengguna Kantor</option>
            <option value="masyarakat">Masyarakat sekitar yang tinggal</option>
            <option value="masyarakat2">Masyarakat sekitar yang memiliki usaha di sekitar</option>
            <option value="pengguna-jalan">Pengguna Jalan</option>
            </select>
        </div>
        <div class="mb-3 form-group">
            <label for="pengalaman" class="form-label">Pengetahuan Bangunan</label>
            <input type="number" class="form-control" id="pengalaman" name="pengetahuan">
        </div>
        <div class="mb-3 form-group">
            <label for="usia" class="form-label">Usia</label>
            <input type="number" class="form-control" id="usia" name="usia">
        </div>
        <div class="mb-3 form-group" hidden>
            <label for="simbol" class="form-label">Simbol</label>
            <input type="text" class="form-control" id="simbol">
        </div>
        <div class="mb-3 form-group">
            <label for="sel1" class="form-label">Pendidikan Terakhir</label>
            <select class="form-select" id="sel1" name="pendidikan">
            <option value="0">Pilih pendidikan</option>
            <option value="smp">SMP</option>
            <option value="sma">SMA/sederajat</option>
            <option value="sarjana">Sarjana</option>
            <option value="magister">Magister</option>
            <option value="doktor">Doktor</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary text-center">Submit</button>
        </div>
      </form>
      <small class="d-block text-center mt-2">Sudah memiliki akun? <a href="/login">Login</a></small>
   </div>
   </div>
    </div>
</div>
@endsection
