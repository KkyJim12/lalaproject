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
  @if(session('error'))
  <div class="alert alert-danger">
      <ul>
        <li>{{session('error')}}</li>
      </ul>
  </div>
  @endif
  <div class="row">
    @foreach($course as $courses)
    <div class="col-lg-3 mt-5" style="text-align:center;">
    <a class="course-link" href="/see-course/{{$courses->course_id}}" style="text-align:left;">
      <div class="card hvr-grow-shadow" style="width:100%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$courses->course_img}}" alt="course_img">
        <div class="card-body">
          <h4 class="card-title course-title">{{str_limit($courses->course_name,42)}}</h4><hr>
          <p>{{$courses->course_teacher_name}}</p>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$courses->course_price}}</span><span class="badge badge-info" style="float:right; margin-top:5px;">{{$courses->course_now_joining}}/{{$courses->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($courses->course_start_date))}} ถึง {{date('d/m/Y', strtotime($courses->course_end_date))}}</small>
          <a class="btn btn-warning form-control mt-2" href="/edit-course/{{$courses->course_id}}">แก้ไข</a>
          <a class="btn btn-info form-control mt-2" href="/see-student/{{$courses->course_id}}">รายชื่อผู้สมัคร</a>
          <form action="/delete-course-process/{{$courses->course_id}}" method="post">
            <input type="hidden" name="course_id" value="{{$courses->course_id}}">
            @csrf
            <button class="btn btn-danger form-control mt-2" type="submit" name="button">ลบคอร์ส</button>
          </form>
        </div>
      </div>
    </a>
    </div>
    @endforeach
  </div><hr>
  <div class="row">
    <div class="col-lg-12">
      <h3>คอร์สที่ฉันสมัคร</h3>
    </div>
    @foreach($mycourse as $mycourses)
    <div class="col-lg-3 mt-5" style="text-align:center;">
      <a class="course-link" href="/see-course/{{$mycourses->course_id}}" style="text-align:left;">
      <div class="card hvr-grow-shadow" style="width:100%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$mycourses->course_img}}" alt="course_img">
        <div class="card-body">
          <h4 class="card-title course-title">{{str_limit($mycourses->course_name,42)}}</h4><hr>
          <p>{{$mycourses->course_teacher_name}}</p>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$mycourses->course_price}}</span><span class="badge badge-info" style="float:right; margin-top:5px;">{{$mycourses->course_now_joining}}/{{$mycourses->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($mycourses->course_start_date))}} ถึง {{date('d/m/Y', strtotime($mycourses->course_end_date))}}</small>
        </div>
      </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
