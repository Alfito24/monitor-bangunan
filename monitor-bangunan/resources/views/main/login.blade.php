@extends('template.main-landing')
@section('title-name', 'Login')
@section('header')
    @include('template.header-landing')
@endsection

@section('css')
    <link href="css/login.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="container2">
            <h1 class="text-center">Login</h1>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="/login">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                value="{{ old('email') }}">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-center">Submit</button>
                        </div>
                    </form>
                    <small class="d-block text-center mt-2">Belum mendaftar? <a href="/register">Daftar
                            Sekarang!</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('template.footer-landing')
@endsection
