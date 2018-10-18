@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>รายชื่อผู้สมัครคอร์ส {{str_limit($owncourse->course_name,40)}}</h1>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">อันดับ</th>
        <th scope="col">รูป</th>
        <th scope="col">ชื่อ-นามสกุล</th>
        <th scope="col">อีเมลล์</th>
        <th scope="col">วันเกิด</th>
        <th scope="col">เพศ</th>
      </tr>
    </thead>
    <tbody>
      @foreach($student as $students)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td><img src="/assets/img/profile/{{$students->user_img}}" alt="user_img" style="width:50px; height:50px;"> </td>
        <td>{{$students->user_fname}} {{$students->user_lname}}</td>
        <td>{{$students->user_email}}</td>
        <td>{{$students->user_birthdate}}</td>
        <td>{{$students->user_gender}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
