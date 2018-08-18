@extends('templates.admin-templates')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>แก้ไขคอร์สเรียน By Admin</h1><hr>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
    <form class="row" action="/admin-edit-course-process/{{$course->course_id}}" method="post" enctype="multipart/form-data">
      <div class="form-group col-lg-6">
        <label for="course_name">ชื่อคอร์ส</label>
        <input type="text" class="form-control" id="course_name" name="course_name" value="{{$course->course_name}}" placeholder="กรุณาตั้งชื่อคอร์ส">
      </div>
      <div class="form-group col-lg-3">
        <label for="course_category">หมวดหมู่</label>
        <select name="category_id" class="custom-select" id="course_category">
          <option selected>กรุณาเลือกหมวดหมู่</option>
          @foreach($show_category as $show_categorys)
          <option value="{{$show_categorys->category_id}}">{{$show_categorys->category_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-lg-3">
        <label for="course_price">ราคา</label>
        <input type="number" class="form-control" id="course_price" name="course_price" value="{{$course->course_price}}" placeholder="กรุณาใส่ราคา">
      </div>
      <div class="form-group col-lg-8">
        <label for="course_place">สถานที่เรียน</label>
        <input type="text" class="form-control" id="course_place" name="course_place" value="{{$course->course_place}}" placeholder="กรุณาใส่สถานที่เรียน">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_max">จำนวนนักเรียนที่รับ</label>
        <input type="number" class="form-control" id="course_max" name="course_max" value="{{$course->course_max}}" placeholder="กรุณาใส่จำนวนนักเรียนที่รับ">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_start_date">วันเริ่มเรียน</label>
        <input type="date" class="form-control" id="course_start_date" name="course_start_date" value="{{$course->course_start_date}}">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_end_date">วันเรียนจบ</label>
        <input type="date" class="form-control" id="course_end_date" name="course_end_date" value="{{$course->course_end_date}}">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_expire_date">วันหมดเขตสมัคร</label>
        <input type="date" class="form-control" id="course_expire_date" name="course_expire_date" value="{{$course->course_expire_date}}">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_teacher_name">ชื่อผู้สอน</label>
        <input type="text" class="form-control" id="course_teacher_name" name="course_teacher_name" value="{{$course->course_teacher_name}}" placeholder="ชื่อผู้สอน">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_teacher_school">จบจากโรงเรียน</label>
        <input type="text" class="form-control" id="course_teacher_school" name="course_teacher_school" value="{{$course->course_teacher_school}}" placeholder="ชื่อโรงเรียน">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_teacher_college">จบจากมหาลัย</label>
        <input type="text" class="form-control" id="course_teacher_college" name="course_teacher_college" value="{{$course->course_teacher_college}}" placeholder="ชื่อมหาลัย">
      </div>
      <div class="form-group col-lg-6">
        <label for="course_teacher_awards">รางวัลที่ได้รับ</label>
        <input type="text" class="form-control" id="course_teacher_awards" name="course_teacher_awards" value="{{$course->course_teacher_awards}}" placeholder="ชื่อรางวัล">
      </div>
      <div class="form-group col-lg-6">
        <label for="course_teacher_skill">ทักษะ/ความสามารถ</label>
        <input type="text" class="form-control" id="course_teacher_skill" name="course_teacher_skill" value="{{$course->course_teacher_skill}}" placeholder="กรุณาระบุ ทักษะ/ความสามารถ">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_phone">เบอร์ติดต่อ</label>
        <input type="text" class="form-control" id="course_phone" name="course_phone" value="{{$course->course_phone}}" placeholder="กรุณาระบุเบอร์ติดต่อ">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_line">ไลน์</label>
        <input type="text" class="form-control" id="course_line" name="course_line" value="{{$course->course_line}}" placeholder="ไลน์ไอดี">
      </div>
      <div class="form-group col-lg-4">
        <label for="course_email">อีเมลล์</label>
        <input type="text" class="form-control" id="course_email" name="course_email" value="{{$course->course_email}}" placeholder="อีเมลล์">
      </div>
      <div class="form-group col-lg-6">
        <label for="course_website">เว็บไซต์</label>
        <input type="text" class="form-control" id="course_website" name="course_website" value="{{$course->course_website}}" placeholder="กรุณาใส่เว็บไซต์">
      </div>
      <div class="form-group col-lg-6">
        <label for="course_facebook">เฟสบุ๊ค</label>
        <input type="text" class="form-control" id="course_facebook" name="course_facebook" value="{{$course->course_facebook}}" placeholder="กรุณาใส่ลิงค์เฟสบุ๊ค">
      </div>
      <div class="form-group col-lg-12">
        <label for="course_detail">รายละเอียดคอร์ส</label>
        <textarea class="form-control" id="course_detail" name="course_detail" rows="5" placeholder="กรุณาใส่รายละเอียดคอร์ส">{{$course->course_detail}}</textarea>
      </div>
      <div class="form-group col-lg-12">
        <label for="course_img">รูปภาพหลัก</label>
        <input type="file" class="form-control-file" id="course_img" name="course_img">
      </div>
      <div class="form-group col-lg-12">
        <label for="course_other_img">รูปภาพอื่นๆ</label>
        <input type="file" class="form-control-file" id="course_other_img" name="course_other_img[]" multiple>
      </div>
      <input type="hidden" name="user_id" value="{{session('user_id')}}">
      <input type="hidden" name="course_id" value="{{$course->course_id}}">
      <input type="hidden" name="edit" value="1">
      @csrf
      <button class="btn btn-success form-control mt-2 mb-5" type="submit">สร้างคอร์สเรียน</button>
    </form>
  </div>
</div>
@endsection
