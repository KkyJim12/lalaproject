<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;

class StudyController extends Controller
{
    public function StudyThisCourse(Request $request, $course_id) {

      $checkstudy = Study::where('user_id',session('user_id'))->where('course_id',$course_id)->first();

      if($checkstudy) {
        return redirect()->back()->with('error','คุณได้สมัครเข้าร่วมคอร์สนี้แล้ว');
      }

      else {
        $study = new Study;
        $study->user_id = session('user_id');
        $study->course_id = $course_id;
        $study->save();
        return redirect()->back();
      }

    }
}
