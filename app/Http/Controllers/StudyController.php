<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;
use App\Course;
use Carbon;

class StudyController extends Controller
{
    public function StudyThisCourse(Request $request, $course_id) {

      $checkstudy = Study::where('user_id',session('user_id'))->where('course_id',$course_id)->first();
      $thiscourse = Course::where('course_id',$course_id)->first();
      $now_time = Carbon::now();

      if ($now_time > $thiscourse->course_expire_date) {
        return redirect()->back()->with('error','คอร์สนี้ปิดรับสมัครแล้ว');
      }

      elseif ($thiscourse->course_now_joining == $thiscourse->course_max) {
        return redirect()->back()->with('error','คอร์สนี้เต็มแล้ว');
      }

      elseif($checkstudy) {
        return redirect()->back()->with('error','คุณได้สมัครเข้าร่วมคอร์สนี้แล้ว');
      }

      else {
        $study = new Study;
        $study->user_id = session('user_id');
        $study->course_id = $course_id;
        $study->save();

        $course = Course::where('course_id',$course_id)->first();
        $course->course_now_joining = $course->course_now_joining+1;
        $course->save();
        return redirect()->back();
      }

    }
}
