@extends('templates.master')

@section('content')
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <h1 style="text-align:center;">สมัครสมาชิก</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/register-process" method="post">
          <div class="form-group">
            <label for="register_fname">ชื่อจริง</label>
            <input id="register_fname" class="form-control" type="text" name="user_fname" placeholder="กรุณาระบุชื่อจริง">
          </div>
          <div class="form-group">
            <label for="register_lname">นามสกุล</label>
            <input id="register_lname" class="form-control" type="text" name="user_lname" placeholder="กรุณาระบุนามสกุล">
          </div>
          <div class="form-group">
            <label for="register_email">อีเมลล์</label>
            <input id="register_email" class="form-control" type="text" name="user_email" placeholder="กรุณาระบุอีเมลล์">
          </div>
          <div class="form-group">
            <label for="register_password">พาสเวิร์ด</label>
            <input id="register_password" class="form-control" type="password" name="user_password" placeholder="กรุณาระบุพาสเวิร์ด">
          </div>
          <div class="form-group">
            <label for="register_re_password">พาสเวิร์ด-อีกครั้ง</label>
            <input id="register_re_password" class="form-control" type="password" name="user_re_password" placeholder="กรุณาระบุพาสเวิร์ด-อีกครั้ง">
          </div>
          <div class="form-group">
            <label for="register_birthdate">วันเกิด</label>
            <input id="register_birthdate" class="form-control" type="date" name="user_birthdate">
          </div>
          <div class="form-check">
          <input id="register_gender_male" type="radio" name="user_gender" value="male">
          <label class="form-check-label" for="register_gender_male">
            ชาย
          </label>
          </div>
          <div class="form-check">
          <input id="register_gender_female" type="radio" name="user_gender" value="female">
          <label class="form-check-label" for="register_gender_female">
            หญิง
          </label>
          </div>
          @csrf
          <button class="btn btn-success form-control mt-2" type="submit">สมัครสมาชิก</button>
        </form>
      </div>
    </div>
  </div>
@endsection
