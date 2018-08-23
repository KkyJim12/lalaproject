<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Slide;
use App\Course;
use App\Study;
use App\Transfer;
use Carbon;
use App\CourseOtherImg;
use App\Wallet;

class UIViewController extends Controller
{
    public function ShowIndex() {
      $category = Category::all();
      $slide = Slide::all();
      $mytime = Carbon\Carbon::now();
      $suggest_course = Course::where('course_suggest',1)->where('course_expire_date','>',$mytime)->where('course_approve',1)->take(9)->get();
      $popular_course = Course::where('course_expire_date','>',$mytime)->where('course_approve',1)->orderBy('course_now_joining','asc')->take(9)->get();
      if ($slide->count() == 0) {
        $otherslide = null;
        $firstslide = null;
        return view('index',[
                              'show_category' => $category,
                              'otherslide' => $otherslide,
                              'firstslide' => $firstslide,
                              'suggest_course' => $suggest_course,
                              'popular_course' => $popular_course,
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

    public function ShowSearchResult(Request $request)  {
      $search_data = $request->search_data;
      $category = Category::all();
      $mytime = Carbon\Carbon::now();
      $search_result = Course::where('course_expire_date','>',$mytime)->where('course_name','Like','%'.$request->search_data.'%')->orWhere('course_place','Like','%'.$request->search_data.'%')->paginate(40);
      return view('pages.search-result',[
                                        'search_result' => $search_result,
                                        'show_category' => $category,
                                        'search_data' => $search_data,
                                        ]);
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
      return view('pages.admin.admin-dashboard');
    }

    public function ShowAdminCategory() {
      $category = Category::all();
      return view('pages.admin.admin-category',[
                                          'show_category' => $category,
                                         ]);
    }

    public function ShowAdminCreateCategory() {
      return view('pages.admin.admin-create-category');
    }

    public function ShowAdminEditCategory($category_id) {
      $category = Category::where('category_id',$category_id)->first();
      return view('pages.admin.admin-edit-category',[
                                              'edit_category' => $category,
                                              ]);
    }

    public function ShowCategory($category_id)  {
      $category = Category::all();
      $mytime = Carbon\Carbon::now();
      $that_category = Category::where('category_id',$category_id)->first();
      $course_in_category = Course::where('category_id',$category_id)->where('course_expire_date','>',$mytime)->paginate(40);
      if ($that_category == null) {
        abort(404);
      }
      else {
        return view('pages.category',[
                                      'that_category' => $that_category,
                                      'show_category' => $category,
                                      'course_in_category' => $course_in_category,
                                     ]);
      }

    }

    public function ShowAdminSlide()  {
      $slide = Slide::all();
      return view('pages.admin.admin-slide',[
                                        'show_slide' => $slide,
                                      ]);
    }

    public function ShowAdminCreateSlide()  {
      return view('pages.admin.admin-create-slide');
    }

    public function ShowAdminEditSlide($slide_id)  {
      $slide = Slide::where('slide_id',$slide_id)->first();
      return view('pages.admin.admin-edit-slide',[
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
      $seecourse_approve = Course::where('user_id',$user_id)->get();
      $course_qty = Course::where('user_id',$user_id)->count();
      $mycourse = Study::where('user_id',$user_id)->get();

      if ($user_id == session('user_id')) {
        return view('pages.show-course',[
                                            'user' => $user2,
                                            'show_category' => $category,
                                            'course' => $seecourse,
                                            'course_qty' => $course_qty,
                                            'mycourse' => $mycourse,
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
                                            'course' => $seecourse_approve,
                                            'course_qty' => $course_qty,
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
      $course_other_img = CourseOtherImg::where('course_id',$course_id)->get();
      return view('pages.edit-course',[
                                          'show_category' => $category,
                                          'course' => $course,
                                          'now_category' => $now_category,
                                          'course_other_img' => $course_other_img,
                                        ]);
    }

    public function ShowSeeCourse($course_id)  {
      $mycourse = Course::find($course_id);
      $category = Category::all();
      $course = Course::where('course_id',$course_id)->first();
      $courseloop = CourseOtherImg::where('course_id',$course_id)->get();
      $mytime = Carbon\Carbon::now();
      $already_join = Study::where('course_id',$course_id)->where('user_id',session('user_id'))->where('study_approve',true)->first();
      $course_transfer =Study::where('course_id',$course_id)->where('user_id',session('user_id'))->where('study_status',null)->first();
      $transfer_upload =Study::where('course_id',$course_id)->where('user_id',session('user_id'))->where('study_status',true)->where('study_approve',null)->first();
      if ($course == null) {
        abort(404);
      }
      else {
        $num_course = Course::find($course_id)->study()->count();
        return view('pages.course',[
                                    'show_category' => $category,
                                    'course' => $course,
                                    'mycourse' => $mycourse,
                                    'num_course' => $num_course,
                                    'already_join' => $already_join,
                                    'mytime' => $mytime,
                                    'course_transfer' => $course_transfer,
                                    'transfer_upload' => $transfer_upload,
                                    'courseloop' => $courseloop,
                                   ]);
      }

    }

    public function ShowAdminCourse() {
      $course = Course::all();
      return view('pages.admin.admin-course',[
                                        'course' => $course,
                                       ]);
    }

    public function ShowAdminEditCourse($course_id)  {
      $category = Category::all();
      $course = Course::where('course_id',$course_id)->first();
      $course_other_img = CourseOtherImg::where('course_id',$course_id)->get();
      return view('pages.admin.admin-edit-course',[
                                              'show_category' => $category,
                                              'course' => $course,
                                              'course_other_img' => $course_other_img,
                                            ]);
    }

    public function ShowAdminSeeCourse($course_id)  {
      $mycourse = Course::find($course_id);
      $course = Course::where('course_id',$course_id)->first();
      $courseloop = CourseOtherImg::where('course_id',$course_id)->get();
      return view('pages.admin.admin-see-course',[
                                            'course' => $course,
                                            'mycourse' => $mycourse,
                                            'courseloop' => $courseloop,
                                           ]);
    }

    public function ShowAdminCourseBan() {
      $course = Course::onlyTrashed()->get();
      return view('pages.admin.admin-course-ban',[
                                            'course' => $course,
                                           ]);
    }

    public function AdminSeeBanCourse($course_id) {
      $mycourse = Course::onlyTrashed()->find($course_id);
      $course = Course::where('course_id',$course_id)->onlyTrashed()->first();
      $courseloop = CourseOtherImg::where('course_id',$course_id)->get();
      return view('pages.admin.admin-see-ban-course',[
                                                'course' => $course,
                                                'mycourse' => $mycourse,
                                                'courseloop' => $courseloop,
                                               ]);
    }

    public function ShowAdminCourseApprove()  {
      $course = Course::where('course_approve',1)->get();
      return view('pages.admin.admin-course-approve',[
                                                'course' => $course,
                                               ]);
    }

    public function ShowAdminCourseNotApprove() {
    $course = Course::where('course_approve',null)->where('course_reject',null)->get();
      return view('pages.admin.admin-course-not-approve',[
                                                'course' => $course,
                                               ]);
    }

    public function ShowAdminCourseReject() {
    $course = Course::where('course_reject','!=',null)->get();
      return view('pages.admin.admin-course-reject',[
                                                'course' => $course,
                                               ]);
    }

    public function ShowAdminSeeCourseApprove($course_id) {
      $mycourse = Course::find($course_id);
      $course = Course::where('course_id',$course_id)->first();
      $courseloop = CourseOtherImg::where('course_id',$course_id)->get();
      return view('pages.admin.admin-see-course-approve',[
                                                    'mycourse' => $mycourse,
                                                    'course' => $course,
                                                    'courseloop' => $courseloop,
                                                   ]);
    }

    public function ShowAdminSeeCourseNotApprove($course_id) {
      $mycourse = Course::find($course_id);
      $course = Course::where('course_id',$course_id)->first();
      $courseloop = CourseOtherImg::where('course_id',$course_id)->get();
      return view('pages.admin.admin-see-course-not-approve',[
                                                    'mycourse' => $mycourse,
                                                    'course' => $course,
                                                    'courseloop' => $courseloop,
                                                   ]);
    }

    public function ShowAdminSeecourseReject($course_id)  {
      $mycourse = Course::find($course_id);
      $course = Course::where('course_id',$course_id)->first();
      $courseloop = CourseOtherImg::where('course_id',$course_id)->get();
      return view('pages.admin.admin-see-course-reject',[
                                                    'mycourse' => $mycourse,
                                                    'course' => $course,
                                                    'courseloop' => $courseloop,
                                                   ]);
    }

    public function ShowAdminUser() {
      $users = User::all();
      return view('pages.admin.admin-user',[
                                      'users' => $users,
                                     ]);
    }

    public function ShowAdminTransfer() {
      $transfer = Transfer::where('transfer_accept',null)->get();
      return view('pages.admin.admin-transfer',[
                                          'transfer' => $transfer,
                                         ]);
    }

    public function ShowAdminSeeTransfer($transfer_id)  {
      $transfer = Transfer::where('transfer_id',$transfer_id)->first();
      return view('pages.admin.admin-see-transfer',[
                                              'transfer' => $transfer,
                                             ]);
    }

    public function ShowWallet($user_id)  {
      if ($user_id != session('user_id')) {
        return redirect()->back();
      }
      else {
        $category = Category::all();
        $wallet = Wallet::where('user_id',$user_id)->first();
        return view('pages.wallet',[
                                    'show_category' => $category,
                                    'wallet' => $wallet,
                                   ]);
      }

    }
}
