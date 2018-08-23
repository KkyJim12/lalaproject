@extends('templates.admin-templates')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="admin-category-show-box">
  <h1>สร้างสไลด์</h1><hr>
  <form action="/admin-create-slide-process" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="slide_name">ชื่อสไลด์</label>
        <input type="text" class="form-control" id="slide_name" name="slide_name" placeholder="กรุณากรอกชื่ชื่อสไลด์">
      </div>
      <div class="form-group">
        <label for="slide_link">ลิงค์</label>
        <input type="text" class="form-control" id="slide_link" name="slide_link" placeholder="กรุณาใส่ลิงค์">
      </div>
      <div class="form-group">
        <label for="slide_number">อันดับ</label>
        <input type="number" class="form-control" id="slide_number" name="slide_number" placeholder="กรุณาใสอันดับ">
      </div>
      <div class="form-group">
        <label for="slide_img">รูปสไลด์</label>
        <input type="file" class="form-control-file" id="slide_img" name="slide_img">
      </div>
      @csrf
      <button type="submit" class="btn btn-success form-control">สร้างสไลด์</button>
  </form>
</div>
@endsection
