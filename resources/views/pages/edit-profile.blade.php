@extends('templates.master')

@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12">
        <h1 style="text-align:center;">แก้ไขข้อมูล</h1>
      </div>
      <div class="col-lg-6">
        <img class="edit-profile-img mx-auto rounded-circle d-block"" src="/assets/img/profile/{{$myprofile->user_img}}"/>
        <form class="mt-5" action="/edit-profile-img" method="post" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile02" name="user_img">
              <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
            </div>
            <div class="input-group-append">
            <input type="hidden" name="user_id" value="{{$myprofile->user_id}}">
              @csrf
              <button class="input-group-text" id="inputGroupFileAddon02">Upload</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-6 mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/edit-profile-process" method="post">
          <div class="form-group">
            <label for="edit_fname">ชื่อจริง</label>
            <input id="edit_fname" class="form-control" type="text" name="user_fname" value="{{$myprofile->user_fname}}" placeholder="กรุณาระบุชื่อจริง">
          </div>
          <div class="form-group">
            <label for="edit_lname">นามสกุล</label>
            <input id="edit_lname" class="form-control" type="text" name="user_lname" value="{{$myprofile->user_lname}}" placeholder="กรุณาระบุนามสกุล">
          </div>
          <div class="form-group">
            <label for="edit_email">อีเมลล์</label>
            <input id="edit_email" class="form-control" type="text" name="user_email" value="{{$myprofile->user_email}}" placeholder="กรุณาระบุอีเมลล์">
          </div>
          <div class="form-group">
            <label for="edit_birthdate">วันเกิด</label>
            <input id="edit_birthdate" class="form-control" type="date" name="user_birthdate" value="{{$myprofile->user_birthdate}}">
          </div>
          @if($myprofile->user_gender == 'male')
          <div class="form-check">
          <input id="edit_gender_male" type="radio" name="user_gender" value="male" checked>
          <label class="form-check-label" for="edit_gender_male">
            ชาย
          </label>
          </div>
          <div class="form-check">
          <input id="edit_gender_female" type="radio" name="user_gender" value="female">
          <label class="form-check-label" for="edit_gender_female">
            หญิง
          </label>
          </div>
          @else
          <div class="form-check">
          <input id="edit_gender_male" type="radio" name="user_gender" value="male">
          <label class="form-check-label" for="edit_gender_male">
            ชาย
          </label>
          </div>
          <div class="form-check">
          <input id="edit_gender_female" type="radio" name="user_gender" value="female" checked>
          <label class="form-check-label" for="edit_gender_female">
            หญิง
          </label>
          </div>
          @endif
          <input type="hidden" name="user_id" value="{{$myprofile->user_id}}">
          @csrf
          <button class="btn btn-success form-control mt-2" type="submit">แก้ไขข้อมูล</button>
        </form>
      </div>
    </div>
  </div>
@endsection
