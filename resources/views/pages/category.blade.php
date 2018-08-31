@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>{{$that_category->category_name}}</h1><hr>
    </div>
  </div>
  <div class="row">
    @foreach($course_in_category as $course_in_categorys)
    <div class="col-lg-3 mt-5" style="text-align:center;">
    <a class="course-link" href="/see-course/{{$course_in_categorys->course_id}}" style="text-align:left;">
      <div class="card hvr-grow-shadow" style="width:100%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$course_in_categorys->course_img}}" alt="course_img">
        <div class="card-body">
          <h4 class="card-title course-title">{{str_limit($course_in_categorys->course_name,42)}}</h4><hr>
          <p>{{$course_in_categorys->course_teacher_name}}</p>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$course_in_categorys->course_price}}</span><span class="badge badge-info" style="float:right; margin-top:5px;">{{$course_in_categorys->course_now_joining}}/{{$course_in_categorys->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($course_in_categorys->course_start_date))}} ถึง {{date('d/m/Y', strtotime($course_in_categorys->course_end_date))}}</small>
        </div>
      </div>
    </a>
    </div>
    @endforeach
  </div>
  <div class="row">
    <div class="col-lg-12 mt-5">
      {{ $course_in_category->links() }}
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>
@endsection
