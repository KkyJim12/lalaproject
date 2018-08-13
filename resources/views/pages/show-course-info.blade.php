@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>ข้อมูลของ {{$user->user_fname}} {{$user->userlname}}  </h1><hr>
    </div>
    <div class="col-lg-12">
      <h5>จำนวนคอร์สเรียน</h5>
      <h5>0/3</h5><hr>
    </div>
    <div class="col-lg-10 mt-3">
      <h3>คอร์สเรียนทั้งหมด</h3>
    </div>
    <div class="col-lg-2 mt-3">
    </div>
  </div>
  <div class="row">
    @foreach($course as $courses)
    <div class="col-lg-4 mt-5">
      <a class="course-link" href="/see-course/{{$courses->course_id}}">
        <div class="card" style="width:80%;">
          <img class="card-img-top course-img" src="/assets/img/course/{{$courses->course_img}}" alt="course_img">
          <div class="card-body">
            <h5 class="card-title">{{$courses->course_name}}</h5>
            <p class="card-text">{{$courses->course_category->category_name}}</p>
            <p class="card-text">ราคา: {{$courses->course_price}}</p>
            <p class="card-text">{{$courses->course_start_date}} ถึง {{$courses->course_end_date}}</p>
            <p class="card-text">หมดเขต: {{$courses->course_expire_date}}</p>
            <p class="card-text">คะแนน: {{$courses->course_rank}}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
