@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>สร้างคอร์สเรียน</h1><hr>
    </div>
    <div class="form-group col-lg-6">
      <label for="course_name">ชื่อคอร์ส</label>
      <input type="text" class="form-control" id="course_name" name="course_name" placeholder="กรุณาตั้งชื่อคอร์ส">
    </div>
    <div class="form-group col-lg-6">
      <label for="course_price">ราคา</label>
      <input type="number" class="form-control" id="course_price" name="course_price" placeholder="กรุณาใส่ราคา">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_start_date">วันเริ่มเรียน</label>
      <input type="date" class="form-control" id="course_start_date" name="course_start_date">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_end_date">วันเรียนจบ</label>
      <input type="date" class="form-control" id="course_end_date" name="course_end_date">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_expire_date">วันหมดเขตสมัคร</label>
      <input type="date" class="form-control" id="course_expire_date" name="course_expire_date">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_teacher_name">ชื่อผู้สอน</label>
      <input type="text" class="form-control" id="course_teacher_name" name="course_teacher_name" placeholder="ชื่อผู้สอน">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_teacher_school">จบจากโรงเรียน</label>
      <input type="text" class="form-control" id="course_teacher_school" name="course_teacher_school" placeholder="ชื่อโรงเรียน">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_teacher_college">จบจากมหาลัย</label>
      <input type="text" class="form-control" id="course_teacher_college" name="course_teacher_college" placeholder="ชื่อมหาลัย">
    </div>
    <div class="form-group col-lg-6">
      <label for="course_teacher_awards">รางวัลที่ได้รับ</label>
      <input type="text" class="form-control" id="course_teacher_awards" name="course_teacher_awards" placeholder="ชื่อรางวัล">
    </div>
    <div class="form-group col-lg-6">
      <label for="course_teacher_skill">ทักษะ/ความสามารถ</label>
      <input type="text" class="form-control" id="course_teacher_skill" name="course_teacher_skill" placeholder="กรุณาระบุ ทักษะ/ความสามารถ">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_phone">เบอร์ติดต่อ</label>
      <input type="text" class="form-control" id="course_phone" name="course_phone" placeholder="กรุณาระบุเบอร์ติดต่อ">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_line">ไลน์</label>
      <input type="text" class="form-control" id="course_line" name="course_line" placeholder="ไลน์ไอดี">
    </div>
    <div class="form-group col-lg-4">
      <label for="course_email">อีเมลล์</label>
      <input type="text" class="form-control" id="course_email" name="course_email" placeholder="อีเมลล์">
    </div>
    <div class="form-group col-lg-12">
      <label for="course_detail">รายละเอียดคอร์ส</label>
      <textarea class="form-control" id="course_detail" name="course_detail" rows="5">กรุณาใส่รายละเอียดคอร์ส</textarea>
    </div>
    <div class="form-group col-lg-12">
      <label for="course_img">รูปภาพหลัก</label>
      <input type="file" class="form-control-file" id="course_img" name="course_img">
    </div>
    <div class="form-group col-lg-12">
      <label for="course_other_img">รูปภาพอื่นๆ</label>
      <input type="file" class="form-control-file" id="course_other_img" name="course_other_img" multiple>
    </div>
  </div>
</div>
@endsection
