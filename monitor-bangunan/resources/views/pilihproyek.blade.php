@extends('template.main-landing')
@section('title-name', 'Pilih Proyek')
@section('header')
    @include('template.header-landing')
@endsection
@section('content')

<div class="container-fluid my-5 mt-5">
    <div class="text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
        <h1 class="mb-5">Pilih Proyek</h1>
    </div>
    <div class="row">
        @foreach ($proyeks as $p )
        <div class="col-4 justify-content-center">
            <div class="owl-carousel owl-theme">
                <div class="item mb-4">
                    <a href="proyek/{{ $p->id }}">
                    <div class="card border-0 shadow">
                        <img src="https://source.unsplash.com/400x300?building" alt="" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h4>{{ $p->namaProyek }}</h4>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('footer')
    @include('template.footer-landing')
@endsection

