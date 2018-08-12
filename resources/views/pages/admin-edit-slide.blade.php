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
  <h1>แก้ไขสไลด์</h1><hr>
  <form action="/admin-edit-slide-process/{{$edit_slide->slide_id}}" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="category_name">ชื่อสไลด์</label>
        <input type="text" class="form-control" id="slide_name" name="slide_name" value="{{$edit_slide->slide_name}}">
      </div>
      <div class="form-group">
        <label for="category_name">ลำดับสไลด์</label>
        <input type="text" class="form-control" id="slide_number" name="slide_number" value="{{$edit_slide->slide_number}}">
      </div>
      <div class="form-group">
        <label for="category_name">ลิงค์สไลด์</label>
        <input type="text" class="form-control" id="slide_link" name="slide_link" value="{{$edit_slide->slide_link}}">
      </div>
      <div class="form-group">
        <label for="slide_img">รูปสไลด์</label>
        <input type="file" class="form-control-file" id="slide_img" name="slide_img">
      </div>
      <input type="hidden" name="slide_id" value="{{$edit_slide->slide_id}}">
      @csrf
      <button type="submit" class="btn btn-success form-control">แก้ไขสไลด์</button>
  </form>
</div>
@endsection
