@extends('template.main-landing')
@section('title-name', 'Pilih Proyek')
@section('header')
@include('template.header-landing')
@endsection
@section('js')
<script>
    function verifyAnswer(noVariabel) {
        //get the selected value from the dropdown list
        var x = "myAns"+noVariabel;
        var mylist = document.getElementById(x);
        var result = mylist.options[mylist.selectedIndex].text;
        console.log(result);
        if (result == 'Tidak Relevan') {
            //disable all the radio button
            document.getElementById('e1'+noVariabel).disabled = true;
            document.getElementById('e2'+noVariabel).disabled = true;
            document.getElementById('e3'+noVariabel).disabled = true;
            document.getElementById('e4'+noVariabel).disabled = true;
            document.getElementById('e5'+noVariabel).disabled = true;
            document.getElementById('r1'+noVariabel).disabled = true;
            document.getElementById('r2'+noVariabel).disabled = true;
            document.getElementById('r3'+noVariabel).disabled = true;
            document.getElementById('r4'+noVariabel).disabled = true;
            document.getElementById('r5'+noVariabel).disabled = true;
        } else {
            //enable all the radio button
            document.getElementById('e1'+noVariabel).disabled = false;
            document.getElementById('e2'+noVariabel).disabled = false;
            document.getElementById('e3'+noVariabel).disabled = false;
            document.getElementById('e4'+noVariabel).disabled = false;
            document.getElementById('e5'+noVariabel).disabled = false;
            document.getElementById('r1'+noVariabel).disabled = false;
            document.getElementById('r2'+noVariabel).disabled = false;
            document.getElementById('r3'+noVariabel).disabled = false;
            document.getElementById('r4'+noVariabel).disabled = false;
            document.getElementById('r5'+noVariabel).disabled = false;
        }
    }
</script>
@endsection
@section('content')
<style>
    td{
        width:400px
    }
    label {
        float: left;
        padding: 0 1em;
        text-align: center;
    }
</style>
<div class="container-fluid mt-5">
    <div class="text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
        <h1 class="mb-5">Silakan Isi Survey di Bawah Ini</h1>
    </div>
    <form method="POST" action="{{route('simpanHasilSurvey', ['surveyId'=>$surveyId])}}">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Relevansi</th>
                    <th scope="col">Ekspektasi</th>
                    <th scope="col">Realita</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp
                @foreach ($listVariabel as $lv)

                <tr>
                    <th scope="row">{{ $lv->id }}</th>
                    <td>{{ $lv->isiVariabel }}</td>
                    <td>

                        @csrf
                        <!-- create a list relevansi -->
                        <select id="myAns{{$i}}" onchange="verifyAnswer({{$i}})" class="form-select">
                            <option value="yes"> Relevan </option>
                            <option value="no"> Tidak Relevan </option>
                        </select>

                    </td>
                    <td>
                        <label> <input type="radio" name="ekspektasi{{$i}}" id="e1{{$i}}" value="1" class="radioinput{{$i}}"> 1 </label>
                        <label> <input type="radio" name="ekspektasi{{$i}}" id="e2{{$i}}" value="2" class="radioinput{{$i}}"> 2 </label>
                        <label> <input type="radio" name="ekspektasi{{$i}}" id="e3{{$i}}" value="3" class="radioinput{{$i}}"> 3 </label>
                        <label> <input type="radio" name="ekspektasi{{$i}}" id="e4{{$i}}" value="4" class="radioinput{{$i}}"> 4 </label>
                        <label> <input type="radio" name="ekspektasi{{$i}}" id="e5{{$i}}" value="5" class="radioinput{{$i}}"> 5 </label>
                    </td>
                    <td>
                        <label> <input type="radio" name="realita{{$i}}" id="r1{{$i}}" value="1" class="radioinput{{$i}}"> 1 </label>
                        <label> <input type="radio" name="realita{{$i}}" id="r2{{$i}}" value="2" class="radioinput{{$i}}"> 2 </label>
                        <label> <input type="radio" name="realita{{$i}}" id="r3{{$i}}" value="3" class="radioinput{{$i}}"> 3 </label>
                        <label> <input type="radio" name="realita{{$i}}" id="r4{{$i}}" value="4" class="radioinput{{$i}}"> 4 </label>
                        <label> <input type="radio" name="realita{{$i}}" id="r5{{$i}}" value="5" class="radioinput{{$i}}"> 5 </label>
                    </td>
                </tr>
                @php
                $i++;
                @endphp
                @endforeach
            </tbody>
        </table>
        <button type="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@section('footer')
@include('template.footer-landing')
@endsection
