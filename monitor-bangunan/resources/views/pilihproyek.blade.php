@extends('template.main-landing')
@section('title-name', 'Pilih Proyek')
@section('header')
    @include('template.header-landing')
@endsection
@section('content')

    <div class="container-fluid my-5 mt-5">
        <div class="text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
            <h1 class="mb-5">Pilih Bangunan</h1>
        </div>
        @if (count($proyeks) == 0)
            <h1 class="text-center">
                Maaf, bangunan tidak tersedia
            </h1>
        @endif

        <div class="row">
            @foreach ($proyeks as $p)
                <div class="col-4 justify-content-center">
                    <div class="owl-carousel owl-theme">
                        <div class="item mb-4">
                            <a
                                @if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || Auth::user()->peran == 'manajemen') href="/dashboard/menu_utama/{{ $p->id }}"
                        @else
                        href="{{ route('pilihSurvey', ['proyekId' => $p->id]) }}" @endif>
                                <div class="card border-0 shadow">
                                    <img src="https://source.unsplash.com/400x300?building" alt=""
                                        class="card-img-top">
                                    <div class="card-body">
                                        <div class="card-title text-center" style="color: black">
                                            <h4>{{ $p->namaProyek }}</h4>
                                            <h6><i class="fas fa-calendar-alt"></i> {{ $p->tanggalProyek }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if (Auth::user()->peran == 'owner1' || Auth::user()->peran == 'owner2' || (Auth::user()->peran == 'manajemen' && count($proyeks) == 0))
            <div class="row d-flex justify-content-center mb-4">
                <div class="col-12"><a href="/project" class="btn btn-primary">Klik disini untuk menambah bangunan</a></div>
            </div>
        @endif
    </div>
@endsection
@section('footer')
    @include('template.footer-landing')
@endsection
