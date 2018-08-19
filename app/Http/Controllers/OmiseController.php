<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;
use App\Course;

class OmiseController extends Controller
{

  public function OmiseCheckout(Request $request) {

    $course_price = Course::where('course_id',$request->course_id)->first();

    define('OMISE_PUBLIC_KEY', 'pkey_test_5cxodoewdmtrmj4j1g4');
    define('OMISE_SECRET_KEY', 'skey_test_5cxodoewlzrw2k4dxlg');
    define('OMISE_API_VERSION', '2017-11-02');

    $charge = \OmiseCharge::create(array(
      'card' => $request->omiseToken,
      'amount' => $course_price->course_price.'00',
      'currency' => 'thb',
      'description' => $request->coures_description,
    ));

    if ($charge['status'] == 'successful') {

      $study = new Study;
      $study->user_id = session('user_id');
      $study->course_id = $request->course_id;
      $study->save();

      $course = Course::where('course_id',$request->course_id)->first();
      $course->course_now_joining = $course->course_now_joining+1;
      $course->save();
      return redirect()->back()->with('success','ชำระเงินเรียบร้อย');
    }

    else {
      return redirect()->back()->with('error','ชำระเงินไม่ผ่าน');
    }

  }
}
