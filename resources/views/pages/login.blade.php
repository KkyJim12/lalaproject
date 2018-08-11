@extends('templates.master')

@section('content')
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <h1 style="text-align:center;">ล๊อกอิน</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('login_error'))
            <div class="alert alert-danger">
                <ul>
                  {{session('login_error')}}
                </ul>
            </div>
        @endif
        <form action="/login-process" method="post">
          <div class="form-group">
            <label for="register_email">อีเมลล์</label>
            <input id="register_email" class="form-control" type="text" name="user_email" placeholder="กรุณาระบุอีเมลล์">
          </div>
          <div class="form-group">
            <label for="register_password">พาสเวิร์ด</label>
            <input id="register_password" class="form-control" type="password" name="user_password" placeholder="กรุณาระบุพาสเวิร์ด">
          </div>
          @csrf
          <button class="btn btn-success form-control mt-2" type="submit">ล๊อกอิน</button>
        </form>
      </div>
    </div>
  </div>
@endsection
