@extends('template.main-landing')
@section('title-name', 'Tambah Variabel')
@section('header')
    @include('template.header-landing')
    <script type="text/javascript">
        $(documnet).ready(function(){
            $('$tombolsimpan').click(function(){
                var data = [
                    'variabel_id' = $('#variabels :selected').val(),
                    'proyek_id' = $idproyek,
                    'stakeholder_id' = $idstakeholder
                ]
                $.ajax({
                    type : 'POST',
                    url : "/tambahvariabel",
                    data : data,
                    success : function(){
                        #('.tampildata').load("/tampilvariabel");
                    }
                })
            })
        })
    </script>
@endsection
@section('content')
    <div class="container m-lg-5 border border-light rounded">
        <div class="row">
            <label id="judulForm" >Tambah Variabel</h1>
        </div>
        <form method="POST">
            <div class="row">
                <div class="col-4">
                    <label for="variabels">Pilih Variabel :</label>
                </div>
                <div class="col-6">
                    <select name="variabels" id="variabels">
                        @foreach ($variabels as $v)
                        <option value="{{$v->id}}" class="form-control">{{$v->isiVariabel}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button id="tombolsimpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="tampildata">

            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('template.footer-landing')
@endsection
