<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;
use App\Course;
use App\Wallet;

class OmiseController extends Controller
{

  public function OmiseCheckout(Request $request) {

    $course_price = Course::where('course_id',$request->course_id)->first();

    define('OMISE_PUBLIC_KEY', 'pkey_test_5cxodoewdmtrmj4j1g4');
    define('OMISE_SECRET_KEY', 'skey_test_5cxodoewlzrw2k4dxlg');
    define('OMISE_API_VERSION', '2017-11-02');

    $charge = \OmiseCharge::create(array(
      'card' => $request->omiseToken,
      'amount' => ($course_price->course_price.'00')*0.1,
      'currency' => 'thb',
      'description' => $request->coures_description,
    ));

    if ($charge['status'] == 'successful') {

      $course = Course::where('course_id',$request->course_id)->first();
      $course->course_now_joining = $course->course_now_joining+1;
      $course->save();

      $mycourse = Course::where('course_id',$request->course_id)->first();
      $study = new Study;
      $study->user_id = session('user_id');
      $study->user_img = session('user_img');
      $study->user_fname = session('user_fname');
      $study->user_lname = session('user_lname');
      $study->user_email = session('user_email');
      $study->user_birthdate = session('user_birthdate');
      $study->user_gender = session('user_gender');
      $study->course_id = $request->course_id;
      $study->study_approve = true;
      $study->course_img = $mycourse->course_img;
      $study->course_name = $mycourse->course_name;
      $study->course_price = $mycourse->course_price;
      $study->course_now_joining = $mycourse->course_now_joining;
      $study->course_max = $mycourse->course_max;
      $study->course_start_date = $mycourse->course_start_date;
      $study->course_end_date = $mycourse->course_end_date;
      $study->save();

      return redirect()->back()->with('success','ชำระเงินเรียบร้อย');
    }

    else {
      return redirect()->back()->with('error','ชำระเงินไม่ผ่าน');
    }

  }
}
