@extends('template.main-landing')
@section('title-name', 'Login')
@section('header')
    @include('template.header-landing')
@endsection

@section('css')
    <link href="css/login2.css" rel="stylesheet">
@endsection
@section('content')
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root"
                            style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-bottom--64 padding-top--24 flex-flex flex-direction--column"
                style="flex-grow: 1; z-index: 9;">
                {{-- <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1><a href="http://blog.stackfindover.com/" rel="dofollow">Stackfindover</a></h1>
                </div> --}}
                <div class="formbg-outer padding-top--48">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <span class="span-login padding-bottom--15">Sign in to your account</span>
                            <form id="stripe-login" method="POST" action="/register">
                                @csrf

                                <div class="field padding-bottom--24">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="Enter your Email">
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="Enter your Name">
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" placeholder="Enter your Password">
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="sel1">Category</label>
                                    <select class="form-select" id="sel1" name="kategori">
                                        <option value="0">Pilih kategori</option>
                                        <option value="industri">Industri</option>
                                        <option value="pemilik">Pemilik</option>
                                        <option value="pengguna">Pengguna Bangunan</option>
                                        <option value="masyarakat">Masyarakat</option>
                                    </select>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="sel1">Role</label>
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
                                        <option value="masyarakat2">Masyarakat sekitar yang memiliki usaha di sekitar
                                        </option>
                                        <option value="pengguna-jalan">Pengguna Jalan</option>
                                    </select>
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="pengalaman">Pengetahuan Bangunan</label>
                                    <input type="number" name="pengetahuan" placeholder="Only enter number">
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="usia">Usia</label>
                                    <input type="number" name="usia" placeholder="Only enter number">
                                </div>
                                <div class="mb-3 form-group" hidden>
                                    <label for="simbol">Simbol</label>
                                    <input type="text" id="simbol">
                                </div>
                                <div class="field padding-bottom--24">
                                    <label for="sel1">Pendidikan Terakhir</label>
                                    <select class="form-select" id="sel1" name="pendidikan">
                                        <option value="0">Pilih pendidikan</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA/sederajat</option>
                                        <option value="sarjana">Sarjana</option>
                                        <option value="magister">Magister</option>
                                        <option value="doktor">Doktor</option>
                                    </select>
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="submit" name="submit" value="Continue">
                                </div>
                                {{-- <div class="field">
                                    <a class="ssolink" href="#">Use single sign-on (Google) instead</a>
                                </div> --}}
                            </form>
                            <span class="span-register">Have an account? <a href="/login">Sign in</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('template.footer-landing')
@endsection
