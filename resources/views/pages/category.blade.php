@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>{{$that_category->category_name}}</h1><hr>
    </div>
    @foreach($course_in_category as $course_in_categorys)
    <a class="course-link" href="/see-course/{{$course_in_categorys->course_id}}">
      <div class="col-lg-4 mt-5">
      <div class="card" style="width:80%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$course_in_categorys->course_img}}" alt="course_img">
        <div class="card-body">
          <h2 class="card-title">{{$course_in_categorys->course_name}}</h2><hr>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$course_in_categorys->course_price}}</span><span class="badge badge-secondary" style="float:right;">0/{{$course_in_categorys->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($course_in_categorys->course_start_date))}} ถึง {{date('d/m/Y', strtotime($course_in_categorys->course_end_date))}}</small>
        </div>
      </div>
      </div>
    </a>
    @endforeach
  </div>
</div>
@endsection
