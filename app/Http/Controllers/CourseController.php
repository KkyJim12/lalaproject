<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseOtherImg;
use App\User;

class CourseController extends Controller
{


    public function CreateCourseProcess(Request $request) {

      $validatedData = $request->validate([
        'category_id' => 'required|numeric|max:255',
        'course_name' => 'required|max:255',
        'course_price' => 'required',
        'course_max' => 'required|numeric',
        'course_start_date' => 'required',
        'course_place' => 'required|max:255',
        'course_end_date' => 'required',
        'course_expire_date' => 'required',
        'course_teacher_name' => 'required|max:255',
        'course_teacher_school' => 'required|max:255',
        'course_teacher_college' => 'required|max:255',
        'course_teacher_awards' => 'max:255',
        'course_teacher_skill' => 'required|max:255',
        'course_phone' => 'required',
        'course_email' => 'required|max:255',
        'course_detail' => 'required|max:5000',
        'course_img' => 'required|image|max:2048',
        'course_other_img' => 'required|image|max:2048',
      ]);

      $coursemax = Course::where('user_id',$request->user_id)->count();
      $user_id = User::where('user_id',$request->user_id)->first();
      if ($coursemax = $user_id->course_qty_max) {
        return redirect()->back()->with('error','คุณสร้างคอร์สครบจำนวนแล้ว');
      }

      else {

      $image = $request->file('course_img');

      $img_name= time().'.'.$image->getClientOriginalExtension();

      $destinationPath = public_path('/assets/img/course');

      $image->move($destinationPath, $img_name);

      $course = new Course;
      $course->user_id = $request->user_id;
      $course->category_id = $request->category_id;
      $course->course_name = $request->course_name;
      $course->course_price = $request->course_price;
      $course->course_now_joining = 0;
      $course->course_max = $request->course_max;
      $course->course_place = $request->course_place;
      $course->course_start_date = $request->course_start_date;
      $course->course_end_date = $request->course_end_date;
      $course->course_expire_date = $request->course_expire_date;
      $course->course_teacher_name = $request->course_teacher_name;
      $course->course_teacher_school = $request->course_teacher_school;
      $course->course_teacher_college = $request->course_teacher_college;
      $course->course_teacher_awards = $request->course_teacher_awards;
      $course->course_teacher_skill = $request->course_teacher_skill;
      $course->course_phone = $request->course_phone;
      $course->course_line = $request->course_line;
      $course->course_email = $request->course_email;
      $course->course_website = $request->course_website;
      $course->course_facebook = $request->course_facebook;
      $course->course_detail = $request->course_detail;
      $course->course_img = $img_name;
      $course->save();


      if($request->hasfile('course_other_img'))
         {

            foreach($request->file('course_other_img') as $file)
            {
                $name=$file->getClientOriginalName();
                $destinationPathOther = public_path('/assets/img/courseimg');
                $file->move($destinationPathOther, $name);
                $data[] = $name;
            }
         }


      foreach($data as $loop) {
        $courseImg = new CourseOtherImg;
        $courseImg->course_id = $course->course_id;
        $courseImg->course_other_img_img = $loop;
        $courseImg->save();
      }




      return redirect()->route('show-course',$request->user_id);
      }

    }

    public function EditCourseProcess(Request $request) {

      $validatedData = $request->validate([
        'category_id' => 'required|numeric|max:255',
        'course_name' => 'required|max:255',
        'course_price' => 'required',
        'course_max' => 'required|numeric',
        'course_start_date' => 'required',
        'course_place' => 'required|max:255',
        'course_end_date' => 'required',
        'course_expire_date' => 'required',
        'course_teacher_name' => 'required|max:255',
        'course_teacher_school' => 'required|max:255',
        'course_teacher_college' => 'required|max:255',
        'course_teacher_awards' => 'max:255',
        'course_teacher_skill' => 'required|max:255',
        'course_phone' => 'required',
        'course_email' => 'required|max:255',
        'course_detail' => 'required|max:5000',
        'course_img' => 'image|max:2048',
        'course_other_img' => 'required|image|max:2048',
      ]);

      if (isset($request->course_img) & isset($request->course_other_img)) {
        $image = $request->file('course_img');

        $img_name= time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/assets/img/course');

        $image->move($destinationPath, $img_name);

        $course = Course::where('user_id',$request->user_id)->where('course_id',$request->course_id)->first();
        $course->category_id = $request->category_id;
        $course->course_name = $request->course_name;
        $course->course_price = $request->course_price;
        $course->course_place = $request->course_place;
        $course->course_max = $request->course_max;
        $course->course_start_date = $request->course_start_date;
        $course->course_end_date = $request->course_end_date;
        $course->course_expire_date = $request->course_expire_date;
        $course->course_teacher_name = $request->course_teacher_name;
        $course->course_teacher_school = $request->course_teacher_school;
        $course->course_teacher_college = $request->course_teacher_college;
        $course->course_teacher_awards = $request->course_teacher_awards;
        $course->course_teacher_skill = $request->course_teacher_skill;
        $course->course_phone = $request->course_phone;
        $course->course_line = $request->course_line;
        $course->course_email = $request->course_email;
        $course->course_website = $request->course_website;
        $course->course_facebook = $request->course_facebook;
        $course->course_detail = $request->course_detail;
        $course->course_img = $img_name;
        $course->save();

        if($request->hasfile('course_other_img'))
           {

              foreach($request->file('course_other_img') as $file)
              {
                  $name=$file->getClientOriginalName();
                  $destinationPathOther = public_path('/assets/img/courseimg');
                  $file->move($destinationPathOther, $name);
                  $data[] = $name;
              }
           }


        foreach($data as $loop) {
          $courseImg = new CourseOtherImg;
          $courseImg->course_id = $course->course_id;
          $courseImg->course_other_img_img = $loop;
          $courseImg->save();
        }



        return redirect()->route('show-course',$request->user_id);
      }

      elseif($request->course_img)  {
        $image = $request->file('course_img');

        $img_name= time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/assets/img/course');

        $image->move($destinationPath, $img_name);

        $course = Course::where('user_id',$request->user_id)->where('course_id',$request->course_id)->first();
        $course->category_id = $request->category_id;
        $course->course_name = $request->course_name;
        $course->course_price = $request->course_price;
        $course->course_place = $request->course_place;
        $course->course_max = $request->course_max;
        $course->course_start_date = $request->course_start_date;
        $course->course_end_date = $request->course_end_date;
        $course->course_expire_date = $request->course_expire_date;
        $course->course_teacher_name = $request->course_teacher_name;
        $course->course_teacher_school = $request->course_teacher_school;
        $course->course_teacher_college = $request->course_teacher_college;
        $course->course_teacher_awards = $request->course_teacher_awards;
        $course->course_teacher_skill = $request->course_teacher_skill;
        $course->course_phone = $request->course_phone;
        $course->course_line = $request->course_line;
        $course->course_email = $request->course_email;
        $course->course_website = $request->course_website;
        $course->course_facebook = $request->course_facebook;
        $course->course_detail = $request->course_detail;
        $course->course_img = $img_name;
        $course->save();

        return redirect()->route('show-course',$request->user_id);
      }

      elseif($request->course_other_img)  {

        $course = Course::where('user_id',$request->user_id)->where('course_id',$request->course_id)->first();
        $course->category_id = $request->category_id;
        $course->course_name = $request->course_name;
        $course->course_price = $request->course_price;
        $course->course_place = $request->course_place;
        $course->course_max = $request->course_max;
        $course->course_start_date = $request->course_start_date;
        $course->course_end_date = $request->course_end_date;
        $course->course_expire_date = $request->course_expire_date;
        $course->course_teacher_name = $request->course_teacher_name;
        $course->course_teacher_school = $request->course_teacher_school;
        $course->course_teacher_college = $request->course_teacher_college;
        $course->course_teacher_awards = $request->course_teacher_awards;
        $course->course_teacher_skill = $request->course_teacher_skill;
        $course->course_phone = $request->course_phone;
        $course->course_line = $request->course_line;
        $course->course_email = $request->course_email;
        $course->course_website = $request->course_website;
        $course->course_facebook = $request->course_facebook;
        $course->course_detail = $request->course_detail;
        $course->save();

        if($request->hasfile('course_other_img'))
           {

              foreach($request->file('course_other_img') as $file)
              {
                  $name=$file->getClientOriginalName();
                  $destinationPathOther = public_path('/assets/img/courseimg');
                  $file->move($destinationPathOther, $name);
                  $data[] = $name;
              }
           }


        foreach($data as $loop) {
          $courseImg = new CourseOtherImg;
          $courseImg->course_id = $course->course_id;
          $courseImg->course_other_img_img = $loop;
          $courseImg->save();
        }



        return redirect()->route('show-course',$request->user_id);
      }

      else {
        $course = Course::where('user_id',$request->user_id)->where('course_id',$request->course_id)->first();
        $course->category_id = $request->category_id;
        $course->course_name = $request->course_name;
        $course->course_price = $request->course_price;
        $course->course_place = $request->course_place;
        $course->course_max = $request->course_max;
        $course->course_start_date = $request->course_start_date;
        $course->course_end_date = $request->course_end_date;
        $course->course_expire_date = $request->course_expire_date;
        $course->course_teacher_name = $request->course_teacher_name;
        $course->course_teacher_school = $request->course_teacher_school;
        $course->course_teacher_college = $request->course_teacher_college;
        $course->course_teacher_awards = $request->course_teacher_awards;
        $course->course_teacher_skill = $request->course_teacher_skill;
        $course->course_phone = $request->course_phone;
        $course->course_line = $request->course_line;
        $course->course_email = $request->course_email;
        $course->course_website = $request->course_website;
        $course->course_facebook = $request->course_facebook;
        $course->course_detail = $request->course_detail;
        $course->save();

        return redirect()->route('show-course',$request->user_id);
      }

    }

    public function DelteCourseOtherImgProcess(Request $request,$course_other_img_id)  {
      $course = CourseOtherImg::where('course_other_img_id',$reqeuset->course_other_img_id)->first();
      $course->delete();
      return redirect()->back();
    }
}
