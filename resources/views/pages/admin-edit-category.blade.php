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
<div class="">
  <h1>แก้ไขหมวดหมู่</h1><hr>
  <form action="/admin-edit-category-process/{{$edit_category->category_id}}" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="category_name">ชื่อหมวดหมู่</label>
        <input type="text" class="form-control" id="category_name" name="category_name" value="{{$edit_category->category_name}}">
      </div>
      <div class="form-group form-check">
        @if($edit_category->category_suggest)
        <input type="checkbox" class="form-check-input" name="category_suggest" id="category_suggest" value="1" checked>
        @else
        <input type="checkbox" class="form-check-input" name="category_suggest" id="category_suggest" value="1">
        @endif
        <label class="form-check-label" for="category_suggest">สินค้าแนะนำ</label>
      </div>
      <div class="form-group">
        <label for="category_img">รูปหมวดหมู่</label>
        <input type="file" class="form-control-file" id="category_img" name="category_img">
      </div>
      <input type="hidden" name="category_id" value="{{$edit_category->category_id}}">
      @csrf
      <button type="submit" class="btn btn-success form-control">แก้ไขหมวดหมู่</button>
  </form>
</div>
@endsection
