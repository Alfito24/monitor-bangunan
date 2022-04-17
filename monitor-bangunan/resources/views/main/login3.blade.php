@extends('template.main-landing')
@section('title-name', 'Login')
@section('header')
    @include('template.header-landing')
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="css/registrartio.css" rel="stylesheet">
@endsection
@section('content')
    <div class="registration-form">
        <form method="POST" action="/login">
            @csrf
            <div class="form-title">
                <h4>Sign in to your account</h4>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control item" id="email"
                    placeholder="Enter your Email">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
            <center><span class="sapn-register">Don't have an account? <a href="">Sign up</a></span></center>
        </form>

        {{-- <div class="social-media">
            <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
            </div>
        </div> --}}
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
    </script>
    <script src="lanidng/assets/js/registration.js"></script>
@section('footer')
    @include('template.footer-landing')
@endsection
