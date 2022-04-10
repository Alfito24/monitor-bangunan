<style>
    .container{
        display: flex;
    }
    .container2{
        align-items: center;
        justify-content: center;
        width: 500px;
        background: rgb(180, 170, 170);
        padding: 20px;
        border-radius: 10px;
        margin: 50px auto;
        min-height: 30vh;
    }
    </style>
    @extends('master')
    @section('container')
    <div class="container">
        <div class="container2">
            <h1 class="text-center">Login</h1>
       <div class="row">
       <div class="col-12">
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3 form-group">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
            </div>
            <div class="mb-3 form-group">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <input type="text" name="password" class="form-control" id="exampleInputEmail1" >
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
