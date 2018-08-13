<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Slide;
use App\Course;

class UIViewController extends Controller
{
    public function ShowIndex() {
      $category = Category::all();
      $slide = Slide::all();
      $suggest_course = Course::where('course_suggest',1)->get();
      if ($slide->count() == 0) {
        $otherslide = null;
        $firstslide = null;
        return view('index',[
                              'show_category' => $category,
                              'otherslide' => $otherslide,
                              'firstslide' => $firstslide,
                              'suggest_course' => $suggest_course,
                            ]);

      }
      else {
        $firstslide = Slide::where('slide_number',$slide->min('slide_number'))->first();
        $otherslide = Slide::where('slide_id','!=',$firstslide->slide_id)->get();
        return view('index',[
                              'show_category' => $category,
                              'firstslide' => $firstslide,
                              'otherslide' => $otherslide,
                              'suggest_course' => $suggest_course,
                            ]);
      }
    }

    public function ShowRegister()  {
      if (session('user_log')) {
        return redirect('/');
      }
      else {
        $category = Category::all();
        return view('pages.register',[
                                      'show_category' => $category,
                                     ]);
      }
    }

    public function ShowLogin()  {
      if (session('user_log')) {
        return redirect('/');
      }
      else {
        $category = Category::all();
        return view('pages.login',[
                                    'show_category' => $category,
                                  ]);
      }
    }

    public function ShowEditProfile($profile_id) {
      $profile = User::where('user_id',session('user_id'))->first();
      $profile_see = User::where('user_id',$profile_id)->first();
      $profile_check = User::where('user_id',$profile_id)->get();
      $category = Category::all();

      if(session('user_id') == $profile_id) {
        $dateOfBirth = $profile_see->user_birthdate;
        $today = date("Y-m-d");
        $age = date_diff(date_create($dateOfBirth), date_create($today));
        return view('pages.edit-profile',[
                                          'myprofile' => $profile,
                                          'show_category' => $category,
                                         ]);
      }
      elseif($profile_check->count() == 0) {
        abort(404);
      }
      else {
        $dateOfBirth = $profile_see->user_birthdate;
        $today = date("Y-m-d");
        $age = date_diff(date_create($dateOfBirth), date_create($today));
        return view('pages.profile',[
                                      'show_category' => $category,
                                      'profile' => $profile_see,
                                      'age' => $age,
                                    ]);
      }

    }

    public function ShowAdmin() {
      return view('pages.admin-dashboard');
    }

    public function ShowAdminCategory() {
      $category = Category::all();
      return view('pages.admin-category',[
                                          'show_category' => $category,
                                         ]);
    }

    public function ShowAdminCreateCategory() {
      return view('pages.admin-create-category');
    }

    public function ShowAdminEditCategory($category_id) {
      $category = Category::where('category_id',$category_id)->first();
      return view('pages.admin-edit-category',[
                                              'edit_category' => $category,
                                              ]);
    }

    public function ShowCategory($category_id)  {
      $category = Category::all();
      return view('pages.category',[
                                    'show_category' => $category,
                                   ]);
    }

    public function ShowAdminSlide()  {
      $slide = Slide::all();
      return view('pages.admin-slide',[
                                        'show_slide' => $slide,
                                      ]);
    }

    public function ShowAdminCreateSlide()  {
      return view('pages.admin-create-slide');
    }

    public function ShowAdminEditSlide($slide_id)  {
      $slide = Slide::where('slide_id',$slide_id)->first();
      return view('pages.admin-edit-slide',[
                                            'edit_slide' => $slide,
                                           ]);
    }

    public function ShowCourse($user_id)  {
      $user = User::where('user_id',$user_id)->first();
      $user2 = User::where('user_id',session('user_id'))->first();
      $checkuser = User::where('user_id',$user_id)->get();
      $category = Category::all();
      $checkcourse = Course::where('user_id',$user_id)->get();
      $seecourse = Course::where('user_id',$user_id)->get();

      if ($user_id == session('user_id')) {
        return view('pages.show-course',[
                                            'user' => $user2,
                                            'show_category' => $category,
                                            'course' => $seecourse,
                                          ]);
      }

      elseif ($checkcourse->count() == 0 & $checkuser->count() == 0) {
        abort(404);
      }

      else {
        $course = User::find($user_id)->mycourse;
        return view('pages.show-course-info',[
                                            'user' => $user,
                                            'show_category' => $category,
                                            'course' => $seecourse,
                                          ]);
      }

    }

    public function ShowCreateCourse($user_id)  {
      $category = Category::all();
      return view('pages.create-course',[
                                          'show_category' => $category,
                                        ]);
    }

    public function ShowEditCourse($course_id)  {
      $category = Category::all();
      $course = Course::where('course_id',$course_id)->first();
      $now_category = Category::where('category_id',$course->category_id)->first();
      return view('pages.edit-course',[
                                          'show_category' => $category,
                                          'course' => $course,
                                          'now_category' => $now_category,
                                        ]);
    }

    public function ShowSeeCourse($course_id)  {
      $mycourse = Course::find($course_id);
      $category = Category::all();
      $course = Course::where('course_id',$course_id)->first();
      return view('pages.course',[
                                  'show_category' => $category,
                                  'course' => $course,
                                  'mycourse' => $mycourse,
                                 ]);
    }
}
