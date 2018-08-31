@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>ผลการค้นหา "{{$search_data}}"</h1><hr>
    </div>
    @if($search_result->count() == 0)
    <div class="col-lg-12">
      <h1 class="mt-5" style="font-size:100px; text-align:center;">ไม่พบข้อมูลการค้าหา</h1>
    </div>
    @else
    @foreach($search_result as $search_results)
    <div class="col-lg-3 mt-5" style="text-align:center;">
    <a class="course-link" href="/see-course/{{$search_results->course_id}}" style="text-align:left;">
      <div class="card hvr-grow-shadow" style="width:100%;">
        <img class="card-img-top course-img" src="/assets/img/course/{{$search_results->course_img}}" alt="course_img">
        <div class="card-body">
          <h2 class="card-title course-title">{{str_limit($search_results->course_name,30)}}</h2><hr>
          <p>{{$search_results->course_teacher_name}}</p>
          <h2 class="card-text"><span class="badge badge-primary">฿ {{$search_results->course_price}}</span><span class="badge badge-info" style="float:right; margin-top:5px;">{{$search_results->course_now_joining}}/{{$search_results->course_max}}</span></h2>
          <small class="text-muted">เริ่มเรียน {{date('d/m/Y', strtotime($search_results->course_start_date))}} ถึง {{date('d/m/Y', strtotime($search_results->course_end_date))}}</small>
        </div>
      </div>
    </a>
   </div>
   @endforeach
   @endif
  </div>
  <div class="row">
    <div class="col-lg-12 mt-5">
      {{ $search_result->links() }}
    </div>
  </div>
</div>
<br>
<br>
<br>
@endsection
