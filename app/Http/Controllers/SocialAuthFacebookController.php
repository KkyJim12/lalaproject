<?php

// SocialAuthFacebookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Carbon\Carbon;

class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
      return Socialite::driver('facebook')->fields([
          'first_name', 'last_name', 'email', 'gender', 'birthday','picture','id'
      ])->scopes([
          'email', 'user_birthday','user_gender'
      ])->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
      try {
            $user = Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday','picture','id'
            ])->user();
            $create['user_fname'] = serialize($user->user['first_name']);
            $create['user_lname'] = serialize($user->user['last_name']);
            $create['user_email'] = serialize($user->user['email']);
            $create['user_birthdate'] = date('Y-m-d', strtotime(serialize($user->user['birthday'])));
            $create['user_gender'] = serialize($user->user['gender']);
            $create['user_password'] = 'secret';
            $create['course_qty_max'] = 5;
            $create['facebook_id'] = serialize($user->user['id']);
            $create['user_img'] = 'profile.jpg';



            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }
}
