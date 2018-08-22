<?php

// SocialAuthFacebookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Carbon\Carbon;
use Auth;

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
            $create['user_fname'] = $user->user['first_name'];
            $create['user_lname'] = $user->user['last_name'];
            $create['user_email'] = $user->user['email'];
            $create['user_birthdate'] = date('Y-m-d', strtotime($user->user['birthday']));
            $create['user_gender'] = $user->user['gender'];
            $create['user_password'] = 'secret';
            $create['course_qty_max'] = 5;
            $create['facebook_id'] = $user->user['id'];
            $create['user_img'] = 'profile.jpg';



            $user = new User;
            $createdUser = $user->addNew($create);
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

            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }
}
