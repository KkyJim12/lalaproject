@extends('templates.master')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12">
        <h1 style="text-align:center;">โปรไฟล์ของ {{$profile->user_fname}} {{$profile->user_lname}}</h1>
      </div>
      <div class="col-lg-6 mt-3">
        <img class="edit-profile-img mx-auto rounded-circle d-block" src="/assets/img/profile/{{$profile->user_img}}"/>
      </div>
      <div class="col-lg-6 mt-3">
        <h3>วันเกิด: {{$profile->user_birthdate}}</h3>
        <h3>อายุ: {{$age->format('%y')}}</h3>
        <h3>เพศ: {{$profile->user_gender}}</h3>
        <h3>อีเมลล์: {{$profile->user_email}}</h3>
      </div>
    </div>
  </div>
@endsection
