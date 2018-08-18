<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;



class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        try {


            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('user_email',$googleUser->email)->first();


            if($existUser) {
                Auth::loginUsingId($existUser->id);

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
            }
            else {
                $user = new User;
                $user->google_id = $googleUser->getId ();
                $user->user_fname = $googleUser->getGivenName ();
                $user->user_lname =$googleUser->getFamilyName ();
                $user->user_email = $googleUser->getEmail ();
                $user->user_password = md5(rand(1,10000));
                $user->user_birthdate = $googleUser->getBirthday();
                $user->user_gender = $googleUser->getGender();
                $user->course_qty_max = 5;
                $user->user_img = 'profile.jpg';
                $user->save();
                Auth::loginUsingId($user->id);

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
            }
            return redirect()->to('/');
        }
        catch (Exception $e) {
            return 'error';
        }
    }
}
