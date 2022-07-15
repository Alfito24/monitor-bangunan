@extends('template.main-landing')
@section('title-name', 'Pilih Survey')
@section('header')
    @include('template.header-landing')
@endsection
@section('content')

    <div class="container-fluid my-5 mt-5">
        <div class="text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
            <h1 class="mb-5">Pilih Survey</h1>
        </div>
        @php
            $isEmpty = true;
        @endphp
        <div class="row">
            @foreach ($survey as $s)
                @foreach ($user as $u)
                    @if ($s->survey_id == $u->survey_id)
                        @php
                            $isEmpty = false;
                        @endphp
                        <div class="col-4 justify-content-center">
                            <div class="owl-carousel owl-theme">
                                <div class="item mb-4">
                                    <a href="{{ route('isiSurvey', ['surveyId' => $s->survey_id]) }}">
                                        <div class="card border-0 shadow">
                                            <img src="https://source.unsplash.com/400x300?building" alt=""
                                                class="card-img-top">
                                            <div class="card-body">
                                                <div class="card-title text-center" style="color: black">
                                                    <h4>{{ $s->nama_survey }}</h4>
                                                    <h6><i class="fas fa-calendar-alt"></i> {{ $s->tanggal_kadaluwarsa }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    @if ($isEmpty)
        <h1 class="text-center">
            Maaf, Survey tidak tersedia
        </h1>
    @endif
@endsection
@section('footer')
    @include('template.footer-landing')
@endsection
