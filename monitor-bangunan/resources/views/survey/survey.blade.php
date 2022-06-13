@extends('template.main-landing')
@section('title-name', 'Isi Survey')
@section('content')
<section class="variabel-relevansi">
    <h5>Relevansi Variabel</h5>
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
            @foreach ($listVariabel as $lv)
                <tr>
                    <th scope="row">{{ $lv->id }}</th>
                    <td>{{ $lv->isiVariabel }}</td>
                    <td>
                        <form>
                            <!-- create a list relevansi -->
                            <select id="myAns" onchange="verifyAnswer()" class="form-select">
                                <option value="choose"> --choose -- </option>
                                <option value="yes"> Yes </option>
                                <option value="no"> No </option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form id="$lv->id">
                            <label> <input type="radio" name="ekspektasi" id="e1" value="1"> 1 </label>
                            <label> <input type="radio" name="ekspektasi" id="e2" value="2"> 2 </label>
                            <label> <input type="radio" name="ekspektasi" id="e3" value="3"> 3 </label>
                            <label> <input type="radio" name="ekspektasi" id="e4" value="4"> 4 </label>
                            <label> <input type="radio" name="ekspektasi" id="e5" value="5"> 5 </label>

                        </form>
                    </td>
                    <td>
                        <form id="$lv->id">
                            <label> <input type="radio" name="realita" id="r1" value="1"> 1 </label>
                            <label> <input type="radio" name="realita" id="r2" value="2"> 2 </label>
                            <label> <input type="radio" name="realita" id="r3" value="3"> 3 </label>
                            <label> <input type="radio" name="realita" id="r4" value="4"> 4 </label>
                            <label> <input type="radio" name="realita" id="r5" value="5"> 5 </label>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</section>
@endsection
