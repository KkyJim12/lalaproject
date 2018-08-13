<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','UIViewController@ShowIndex');

Route::get('/register','UIViewController@ShowRegister');

Route::get('/login','UIViewController@ShowLogin');

Route::post('/register-process','UserController@RegisterProcess');

Route::post('/login-process','UserController@LoginProcess');

Route::get('/logout-process','UserController@LogoutProcess');

Route::get('/profile/{profile_id}','UIViewController@ShowEditProfile');

Route::post('/edit-profile-process','UserController@EditProfileProcess');

Route::post('/edit-profile-img','UserController@EditProfileImg');

Route::get('/admin','UIViewController@ShowAdmin');

Route::get('/admin-category','UIViewController@ShowAdminCategory')->name('admin-category');

Route::get('/admin-create-category','UIViewController@ShowAdminCreateCategory');

Route::post('/admin-create-category-process','AdminController@AdminCreateCategoryProcess');

Route::post('/admin-delete-category/{category_id}','AdminController@AdminDeleteCategoryProcess');

Route::get('/admin-edit-category/{category_id}','UIViewController@ShowAdminEditCategory');

Route::post('/admin-edit-category-process/{category_id}','AdminController@AdminEditCategoryProcess');

Route::get('/category/{category_id}','UIViewController@ShowCategory');

Route::get('/admin-slide','UIViewController@ShowAdminSlide')->name('admin-slide');

Route::get('/admin-create-slide','UIViewController@ShowAdminCreateSlide');

Route::post('/admin-create-slide-process','AdminController@AdminCreateSlideProcess');

Route::post('/admin-delete-slide/{slide_id}','AdminController@AdminDeleteSlideProcess');

Route::get('/admin-edit-slide/{slide_id}','UIViewController@ShowAdminEditSlide');

Route::post('/admin-edit-slide-process/{slide_id}','AdminController@AdminEditSlideProcess');

Route::get('/show-course/{user_id}','UIViewController@ShowCourse')->name('show-course');

Route::get('/create-course/{user_id}','UIViewController@ShowCreateCourse');

Route::post('/create-course-process','CourseController@CreateCourseProcess');

Route::get('/edit-course/{course_id}','UIViewController@ShowEditCourse');

Route::post('/edit-course-process/{course_id}','CourseController@EditCourseProcess');

Route::get('/see-course/{course_id}','UIViewController@ShowSeeCourse');
