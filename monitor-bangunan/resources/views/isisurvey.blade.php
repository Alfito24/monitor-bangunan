@extends('template.main-landing')
@section('title-name', 'Pilih Proyek')
@section('header')
@include('template.header-landing')
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
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kriteria</th>
                <th scope="col">Ekspektasi</th>
                <th scope="col">Realita</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Bangunan memberikan rasa aman secara fisik (Tidak terjadi kekerasan, Perbuatan Asusila, Pencurian, dll).</td>
                <td>
                    <label for="myChoice1">1<br />
                        <input type="radio" id="myChoice1" name="ekspektasi" value="1" />
                      </label>
                      
                      <label for="myChoice2">2<br />
                        <input type="radio" id="myChoice2" name="ekspektasi" value="2" />
                      </label>
                      
                      <label for="myChoice3">3<br />
                        <input type="radio" id="myChoice3" name="ekspektasi" value="3" />
                      </label>
                      
                      <label for="myChoice4">4<br />
                        <input type="radio" id="myChoice4" name="ekspektasi" value="4" />
                      </label>
                      <label for="myChoice4">5<br />
                        <input type="radio" id="myChoice4" name="ekspektasi" value="5" />
                      </label>
                </td>
                <td>
                  <label for="myChoice1">1<br />
                  <input type="radio" id="myChoice1" name="realita" value="1" />
                </label>
                
                <label for="myChoice2">2<br />
                  <input type="radio" id="myChoice2" name="realita" value="ABC" />
                </label>
                
                <label for="myChoice3">3<br />
                  <input type="radio" id="myChoice3" name="realita" value="qwerty" />
                </label>
                
                <label for="myChoice4">4<br />
                  <input type="radio" id="myChoice4" name="realita" value="final" />
                </label>
                <label for="myChoice4">5<br />
                  <input type="radio" id="myChoice4" name="realita" value="final" />
                </label></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Kemudahan berkomunikasi dan pertukaran informasi terhadap pemangku kepentingan.</td>
                <td>
                    <label for="myChoice1">1<br />
                        <input type="radio" id="myChoice1" name="ekspektasi" value="1" />
                      </label>
                      
                      <label for="myChoice2">2<br />
                        <input type="radio" id="myChoice2" name="ekspektasi" value="ABC" />
                      </label>
                      
                      <label for="myChoice3">3<br />
                        <input type="radio" id="myChoice3" name="ekspektasi" value="qwerty" />
                      </label>
                      
                      <label for="myChoice4">4<br />
                        <input type="radio" id="myChoice4" name="ekspektasi" value="final" />
                      </label>
                      <label for="myChoice4">5<br />
                        <input type="radio" id="myChoice4" name="ekspektasi" value="final" />
                      </label>
                </td>
                <td>
                  <label for="myChoice1">1<br />
                    <input type="radio" id="myChoice1" name="realita" value="1" />
                  </label>
                  
                  <label for="myChoice2">2<br />
                    <input type="radio" id="myChoice2" name="realita" value="ABC" />
                  </label>
                  
                  <label for="myChoice3">3<br />
                    <input type="radio" id="myChoice3" name="realita" value="qwerty" />
                  </label>
                  
                  <label for="myChoice4">4<br />
                    <input type="radio" id="myChoice4" name="realita" value="final" />
                  </label>
                  <label for="myChoice4">5<br />
                    <input type="radio" id="myChoice4" name="realita" value="final" />
                  </label>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Masyarakat sekitar tidak merasa terganggu dengan adanya gedung.</td>
                <td>
                    <label for="myChoice1">1<br />
                        <input type="radio" id="myChoice1" name="ekspektasi" value="1" />
                      </label>
                      
                      <label for="myChoice2">2<br />
                        <input type="radio" id="myChoice2" name="ekspektasi" value="ABC" />
                      </label>
                      
                      <label for="myChoice3">3<br />
                        <input type="radio" id="myChoice3" name="ekspektasi" value="qwerty" />
                      </label>
                      
                      <label for="myChoice4">4<br />
                        <input type="radio" id="myChoice4" name="ekspektasi" value="final" />
                      </label>
                      <label for="myChoice4">5<br />
                        <input type="radio" id="myChoice4" name="ekspektasi" value="final" />
                      </label>
                </td>
                <td>
                  <label for="myChoice1">1<br />
                    <input type="radio" id="myChoice1" name="realita" value="1" />
                  </label>
                  
                  <label for="myChoice2">2<br />
                    <input type="radio" id="myChoice2" name="realita" value="ABC" />
                  </label>
                  
                  <label for="myChoice3">3<br />
                    <input type="radio" id="myChoice3" name="realita" value="qwerty" />
                  </label>
                  
                  <label for="myChoice4">4<br />
                    <input type="radio" id="myChoice4" name="realita" value="final" />
                  </label>
                  <label for="myChoice4">5<br />
                    <input type="radio" id="myChoice4" name="realita" value="final" />
                  </label>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
@section('footer')
@include('template.footer-landing')
@endsection