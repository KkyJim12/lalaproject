<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function RegisterProcess(Request $request) {

      //Register Validate//

      $validatedData = $request->validate([
        'user_fname' => 'required|max:255',
        'user_lname' => 'required|max:255',
        'user_email' => 'unique:user,user_email|required|email|max:255',
        'user_password' => 'required|max:255',
        'user_re_password' => 'required|same:user_password|max:255',
        'user_birthdate' => 'required',
        'user_gender' => 'required',
      ]);

      //End Register Validate//

      $user = new User;
      $user->user_img = 'profile.jpg';
      $user->user_fname = $request->user_fname;
      $user->user_lname = $request->user_lname;
      $user->user_email = $request->user_email;
      $user->user_password = Hash::make($request->user_password);
      $user->course_qty_max = 5;
      $user->user_birthdate = $request->user_birthdate;
      $user->user_gender = $request->user_gender;
      $user->save();

      session([
                'user_id' => $user->user_id,
                'user_img' => $user->user_img,
                'user_fname' => $user->user_fname,
                'user_lname' => $user->user_lname,
                'user_email' => $user->user_email,
                'user_birthdate' => $user->user_birthdate,
                'user_gender' => $user->user_gender,
                'user_log' => 1,
                'user_admin' => $user->user_admin,
              ]);

      return redirect('/');
    }

    public function LoginProcess(Request $request)  {

      //Login Validate//

      $validatedData = $request->validate([
        'user_email' => 'required|email|max:255',
        'user_password' => 'required|max:255',
      ]);

      //End Login Validate//

      if (User::where('user_email',$request->user_email)->count() == 1) {
        $user = User::where('user_email',$request->user_email)->first();
        if (Hash::check($request->user_password,$user->user_password)) {
          session([
                    'user_id' => $user->user_id,
                    'user_img' => $user->user_img,
                    'user_fname' => $user->user_fname,
                    'user_lname' => $user->user_lname,
                    'user_email' => $user->user_email,
                    'user_birthdate' => $user->user_birthdate,
                    'user_gender' => $user->user_gender,
                    'user_log' => 1,
                    'user_admin' => $user->user_admin,
                  ]);
          return redirect('/');
        }
        else {
          return redirect()->back()->with('login_error','อีเมลล์หรือรหัสผ่านไม่ถูกต้อง');
        }
      }
      else {
        return redirect()->back()->with('login_error','อีเมลล์หรือรหัสผ่านไม่ถูกต้อง');
      }

    }

    public function LogoutProcess(Request $request)  {
      $request->session()->flush();
      $request->session()->regenerate();
      return redirect('/');
    }

    public function EditProfileProcess(Request $request)  {

      //Edit Validate//

      $validatedData = $request->validate([
        'user_fname' => 'required|max:255',
        'user_lname' => 'required|max:255',
        'user_email' => 'required|email|max:255',
        'user_birthdate' => 'required',
        'user_gender' => 'required',
      ]);

      //End Edit Validate//


      $user = User::where('user_id',$request->user_id)->first();
      $user->user_fname = $request->user_fname;
      $user->user_lname = $request->user_lname;
      $user->user_email = $request->user_email;
      $user->user_birthdate = $request->user_birthdate;
      $user->user_gender = $request->user_gender;
      $user->save();

      session([
                'user_id' => $user->user_id,
                'user_img' => $user->user_img,
                'user_fname' => $user->user_fname,
                'user_lname' => $user->user_lname,
                'user_email' => $user->user_email,
                'user_birthdate' => $user->user_birthdate,
                'user_gender' => $user->user_gender,
                'user_log' => 1,
              ]);


      return redirect()->back();
    }

    public function EditProfileImg(Request $request)  {

      //Edit Image Validate//

      $validatedData = $request->validate([
        'user_img' => 'required|image|max:2048',
      ]);

      //End Edit Image Validate//


      // Upload File //

      $image = $request->file('user_img');

      $img_name= time().'.'.$image->getClientOriginalExtension();

      $destinationPath = public_path('/assets/img/profile');

      $image->move($destinationPath, $img_name);

      // End Upload File//

      $user = User::where('user_id',$request->user_id)->first();
      $user->user_img = $img_name;
      $user->save();

      session([
               'user_img' => $user->user_img,
             ]);

      return redirect()->back();

    }
}
