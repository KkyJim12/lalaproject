<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Slide;
use App\Course;
use App\User;

class AdminController extends Controller
{
    public function AdminCreateCategoryProcess(Request $request)  {

      //Create Category Validate//

      $validatedData = $request->validate([
        'category_name' => 'required|max:255',
        'category_suggest' => 'max:255',
        'category_img' => 'required|image|max:2048',
      ]);

      // END Create Category Validate//

      $image = $request->file('category_img');

      $img_name= time().'.'.$image->getClientOriginalExtension();

      $destinationPath = public_path('/assets/img/category');

      $image->move($destinationPath, $img_name);

      $category = new Category;
      $category->category_name = $request->category_name;
      $category->category_suggest = $request->category_suggest;
      $category->category_img = $img_name;
      $category->save();

      return redirect()->route('admin-category');
    }

    public function AdminDeleteCategoryProcess(Request $request)  {
      $category = Category::where('category_id',$request->category_id)->first();
      $category->delete();

      return redirect()->route('admin-category');
    }

    public function AdminEditCategoryProcess(Request $request)  {

      //Edit Category Validate//

      $validatedData = $request->validate([
        'category_name' => 'required|max:255',
        'category_suggest' => 'max:255',
        'category_img' => 'image|max:2048',
      ]);

      // END Edit Category Validate//

      if ($request->category_img) {
        $image = $request->file('category_img');

        $img_name= time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/assets/img/category');

        $image->move($destinationPath, $img_name);

        $category = Category::where('category_id',$request->category_id)->first();
        $category->category_name = $request->category_name;
        $category->category_suggest = $request->category_suggest;
        $category->category_img = $img_name;
        $category->save();

        return redirect()->route('admin-category');
      }

      else {
        $category = Category::where('category_id',$request->category_id)->first();
        $category->category_name = $request->category_name;
        $category->category_suggest = $request->category_suggest;
        $category->save();

        return redirect()->route('admin-category');
      }


    }

    public function AdminCreateSlideProcess(Request $request) {

      //Edit Category Validate//

      $validatedData = $request->validate([
        'slide_name' => 'required|max:255',
        'slide_link' => 'required|max:255',
        'slide_number' => 'numeric',
        'slide_img' => 'required|image|max:2048',
      ]);

      // END Edit Category Validate//

      $image = $request->file('slide_img');

      $img_name= time().'.'.$image->getClientOriginalExtension();

      $destinationPath = public_path('/assets/img/slide');

      $image->move($destinationPath, $img_name);

      $slide = new Slide;
      $slide->slide_name = $request->slide_name;
      $slide->slide_link = $request->slide_link;
      $slide->slide_number = $request->slide_number;
      $slide->slide_img = $img_name;
      $slide->save();

      return redirect()->route('admin-slide');


    }

    public function AdminDeleteSlideProcess(Request $request) {

      $slide = Slide::where('slide_id',$request->slide_id)->first();
      $slide->delete();

      return redirect()->route('admin-slide');
    }

    public function AdminEditSlideProcess(Request $request) {
      //Edit Slide Validate//

      $validatedData = $request->validate([
        'slide_name' => 'required|max:255',
        'slide_number' => 'required|max:255',
        'slide_link' => 'required|max:255',
        'slide_img' => 'image|max:2048',
      ]);

      // END Edit Slide Validate//

      if ($request->slide_img) {
        $image = $request->file('slide_img');

        $img_name= time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/assets/img/slide');

        $image->move($destinationPath, $img_name);

        $slide = Slide::where('slide_id',$request->slide_id)->first();
        $slide->slide_name = $request->slide_name;
        $slide->slide_number = $request->slide_number;
        $slide->slide_link = $request->slide_link;
        $slide->slide_img = $img_name;
        $slide->save();

        return redirect()->route('admin-slide');
      }

      else {
        $slide = Slide::where('slide_id',$request->slide_id)->first();
        $slide->slide_name = $request->slide_name;
        $slide->slide_number = $request->slide_number;
        $slide->slide_link = $request->slide_link;
        $slide->save();

        return redirect()->route('admin-slide');
      }
    }

    public function AdminEditCourseProcess(Request $request)  {

      $validatedData = $request->validate([
        'category_id' => 'required|numeric|max:255',
        'course_name' => 'required|max:255',
        'course_price' => 'required',
        'course_place' => 'required|max:255',
        'course_max' => 'required|numeric',
        'course_start_date' => 'required',
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
        'course_other_img.course_other_img' => 'image|max:2048',
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



        if ($request->see | $request->edit) {
          return redirect()->route('admin-course');
        }
        else {
          return redirect()->back();
        }
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

        if ($request->see | $request->edit) {
          return redirect()->route('admin-course');
        }
        else {
          return redirect()->back();
        }
      }

      elseif ($request->course_other_img) {
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



        if ($request->see | $request->edit) {
          return redirect()->route('admin-course');
        }
        else {
          return redirect()->back();
        }
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

        if ($request->see | $request->edit) {
          return redirect()->route('admin-course');
        }
        else {
          return redirect()->back();
        }
      }

    }

    public function AdminDeleteCourseProcess(Request $request, $course_id)  {
      $course = Course::where('course_id',$course_id)->first();
      $course->forceDelete();

      if ($request->see | $request->edit) {
        return redirect()->route('admin-course');
      }
      else {
        return redirect()->back();
      }
    }

    public function AdminBanCourseProcess(Request $request, $course_id) {
      $course = Course::where('course_id',$course_id)->first();
      $course->delete();

      if ($request->see | $request->edit) {
        return redirect()->route('admin-course');
      }
      else {
        return redirect()->back();
      }
    }

    public function AdminForceDeleteProcess(Request $request, $course_id) {
      $course = Course::where('course_id',$course_id)->onlyTrashed()->first();
      $course->forceDelete();

      if ($request->see | $request->edit) {
        return redirect()->route('admin-course');
      }
      else {
        return redirect()->back();
      }
    }

    public function AdminRestoreBanProcess(Request $request, $course_id)  {
      $course = Course::where('course_id',$course_id)->onlyTrashed()->first();
      $course->restore();
      if ($request->see | $request->edit) {
        return redirect()->route('admin-course');
      }
      else {
        return redirect()->back();
      }
    }


    public function AdminApproveCourseProcess(Request $request, $course_id) {
      $course = Course::where('course_id',$course_id)->first();
      $course->course_approve = 1;
      $course->course_reject = null;
      $course->save();

      if ($request->see | $request->edit) {
        return redirect()->route('admin-course');
      }
      else {
        return redirect()->back();
      }
    }

    public function AdminRejectCourseProcess(Request $request)  {
      $course = Course::where('course_id',$request->course_id)->first();
      $course->course_reject = $request->course_reject;
      $course->course_approve = null;
      $course->save();

      if ($request->see | $request->edit) {
        return redirect()->route('admin-course');
      }
      else {
        return redirect()->back();
      }
    }

    public function AdminSuggestCourseProcess(Request $request) {
      $course = Course::where('course_id',$request->course_id)->first();

      if (isset($course->course_suggest)) {
        $course->course_suggest = null;
        $course->save();

        if ($request->see | $request->edit) {
          return redirect()->route('admin-course');
        }
        else {
          return redirect()->back();
        }
      }
      else {
        $course->course_suggest = 1;
        $course->save();

        if ($request->see | $request->edit) {
          return redirect()->route('admin-course');
        }
        else {
          return redirect()->back();
        }
      }

    }

    public function AdminBanUserProcess(Request $request, $user_id) {

      $user = User::where('user_id',$request->user_id)->first();

      if ($user->user_admin == 1) {
        return redirect()->back()->with('error','ไม่สามารถลบได้');
      }

      else {
        $user = User::where('user_id',$request->user_id)->first();
        $user->delete();

        return redirect()->back();
      }

    }

    public function AdminAddCourseQtyProcess(Request $request, $user_id)  {
      $user = User::where('user_id',$request->user_id)->first();
      $user->course_qty_max = $request->course_qty_max;
      $user->save();

      return redirect()->back();
    }
}
