@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลของฉัน</h1><hr>
    </div>
    <div class="col-lg-12">
      <h5>จำนวนคอร์สเรียนของฉัน</h5>
      <h5>{{$course_qty}}/{{$user->course_qty_max}}</h5><hr>
    </div>
    <div class="col-lg-10 mt-3">
      <h3>คอร์สเรียนทั้งหมด</h3>
    </div>
    <div class="col-lg-2 mt-3">
      <a class="btn btn-success" href="/create-course/{{session('user_id')}}">สร้างคอร์สเรียนใหม่</a>
    </div>
  </div>
  <div class="row">
    @foreach($course as $courses)
    <a class="course-link" href="/see-course/{{$courses->course_id}}">
      <div class="col-md-6 col-lg-4 mt-5">
      <div class="card hvr-grow-shadow" style="width:80%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$courses->course_img}}" alt="course_img">
        <div class="card-body">
          <h2 class="card-title">{{$courses->course_name}}</h2><hr>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$courses->course_price}}</span><span class="badge badge-secondary" style="float:right;">{{$courses->course_now_joining}}/{{$courses->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($courses->course_start_date))}} ถึง {{date('d/m/Y', strtotime($courses->course_end_date))}}</small>
          <a class="btn btn-warning form-control mt-2" href="/edit-course/{{$courses->course_id}}">แก้ไข</a>
        </div>
      </div>
      </div>
    </a>
    @endforeach
  </div><hr>
  <div class="row">
    <div class="col-lg-12">
      <h3>คอร์สที่ฉันสมัคร</h3>
    </div>
    @foreach($mycourse as $mycourses)
    <div class="col-md-6 col-lg-4 mt-5">
      <a class="course-link" href="/see-course/{{$mycourses->course_id}}">
      <div class="card hvr-grow-shadow" style="width:80%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$mycourses->course_img}}" alt="course_img">
        <div class="card-body">
          <h2 class="card-title">{{$mycourses->course_name}}</h2><hr>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$mycourses->course_price}}</span><span class="badge badge-secondary" style="float:right;">{{$mycourses->course_now_joining}}/{{$mycourses->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($mycourses->course_start_date))}} ถึง {{date('d/m/Y', strtotime($mycourses->course_end_date))}}</small>
        </div>
      </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
