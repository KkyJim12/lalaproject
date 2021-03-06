@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลของ {{$user->user_fname}} {{$user->userlname}}  </h1><hr>
    </div>
    <div class="col-lg-12">
      <h5>จำนวนคอร์สเรียน</h5>
      <h5>{{$course_qty}}/{{$user->course_qty_max}}</h5><hr>
    </div>
    <div class="col-lg-10 mt-3">
      <h3>คอร์สเรียนทั้งหมด</h3>
    </div>
    <div class="col-lg-2 mt-3">
    </div>
  </div>
  <div class="row">
    @foreach($course as $courses)
    <div class="col-lg-3 mt-5">
      <a class="course-link" href="/see-course/{{$courses->course_id}}">
      <div class="card hvr-grow-shadow" style="width:100%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$courses->course_img}}" alt="course_img">
        <div class="card-body">
          <h4 class="card-title course-title">{{str_limit($courses->course_name,42)}}</h4><hr>
          <p>{{$courses->course_teacher_name}}</p>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$courses->course_price}}</span><span class="badge badge-info" style="float:right; margin-top:5px;">0/{{$courses->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($courses->course_start_date))}} ถึง {{date('d/m/Y', strtotime($courses->course_end_date))}}</small>
        </div>
      </div>
      </a>
    </div>

    @endforeach
  </div>
</div>
@endsection
