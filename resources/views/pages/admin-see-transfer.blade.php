@extends('templates.admin-templates')

@section('content')
<div class="row">
  <div class="col-lg-6">
    <img src="/assets/img/slip/{{$transfer->transfer_img}}" alt="transfer_img" style="width:100%; height:500px;">
  </div>
  <div class="col-lg-6">
    <h1>รายละเอียด</h1>
    <h3>ชื่อผู้โอน: {{$transfer->transfer_user_name}}</hh3>
    <h3>ชื่อคอร์ส: {{$transfer->transfer_course_name}}</h3>
    <h3>ราคา: {{$transfer->transfer_course_price}}</h3>
    <div class="">
      <form class="" action="/admin-transfer-approve/{{$transfer->transfer_course_id}}" method="post">
        <input type="hidden" name="course_id" value="{{$transfer->transfer_course_id}}">
        <input type="hidden" name="user_id" value="{{$transfer->transfer_user_id}}">
        @csrf
        <button class="btn btn-success form-control" type="submit" name="button">ตกลง</button>
      </form>
    </div>
    <div class="">
      <form class="" action="/admin-transfer-reject/{{$transfer->transfer_course_id}}" method="post">
        <input type="hidden" name="course_id" value="{{$transfer->transfer_course_id}}">
        <input type="hidden" name="user_id" value="{{$transfer->transfer_user_id}}">
        @csrf
        <button class="btn btn-danger form-control" type="submit" name="button">ปฎเสธ</button>
      </form>
    </div>
  </div>
</div>

@endsection
