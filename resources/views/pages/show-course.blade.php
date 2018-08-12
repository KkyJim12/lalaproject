@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลของฉัน</h1><hr>
    </div>
    <div class="col-lg-12">
      <h5>จำนวนคอร์สเรียนของฉัน</h5>
      <h5>0/3</h5><hr>
    </div>
    <div class="col-lg-10 mt-3">
      <h3>คอร์สเรียนทั้งหมด</h3>
    </div>
    <div class="col-lg-2 mt-3">
      <a class="btn btn-success" href="/create-course/{{session('user_id')}}">สร้างคอร์สเรียนใหม่</a>
    </div>
  </div>
</div>
@endsection
