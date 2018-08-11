<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;

class UIViewController extends Controller
{
    public function ShowIndex() {
      return view('index');
    }

    public function ShowRegister()  {
      if (session('user_log')) {
        return redirect('/');
      }
      else {
        return view('pages.register');
      }
    }

    public function ShowLogin()  {
      if (session('user_log')) {
        return redirect('/');
      }
      else {
        return view('pages.login');
      }
    }

    public function ShowEditProfile($profile_id) {
      $profile = User::where('user_id',session('user_id'))->first();
      $profile_see = User::where('user_id',$profile_id)->first();
      $profile_check = User::where('user_id',$profile_id)->get();
      $dateOfBirth = $profile_see->user_birthdate;
      $today = date("Y-m-d");
      $age = date_diff(date_create($dateOfBirth), date_create($today));
      if(session('user_id') == $profile_id) {
        return view('pages.edit-profile',[
                                          'myprofile' => $profile,
                                         ]);
      }
      elseif($profile_check->count() == 0) {
        abort(404);
      }
      else {
        return view('pages.profile',[
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
}
