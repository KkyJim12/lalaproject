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

Auth::routes();

Route::any('/google/redirect', 'SocialAuthGoogleController@redirect');
Route::any('/google/callback', 'SocialAuthGoogleController@callback');


Route::any('/facebook/redirect', 'SocialAuthFacebookController@redirect');
Route::any('/facebook/callback', 'SocialAuthFacebookController@callback');
//////////////////////////////////////////////////////////////////////////////////

Route::post('/omise-checkout','OmiseController@OmiseCheckout')->middleware('login');

//////////////////////////////////////////////////////////////////////////////////

Route::get('/','UIViewController@ShowIndex');

Route::get('/register','UIViewController@ShowRegister');

Route::get('/login','UIViewController@ShowLogin')->name('login');

Route::post('/register-process','UserController@RegisterProcess');

Route::post('/login-process','UserController@LoginProcess');

Route::get('/logout-process','UserController@LogoutProcess');

Route::get('/profile/{profile_id}','UIViewController@ShowEditProfile');

Route::post('/edit-profile-process','UserController@EditProfileProcess')->middleware('login');

Route::post('/edit-profile-img','UserController@EditProfileImg')->middleware('login');

Route::get('/admin','UIViewController@ShowAdmin')->middleware('admin');

Route::get('/admin-category','UIViewController@ShowAdminCategory')->name('admin-category')->middleware('admin');

Route::get('/admin-create-category','UIViewController@ShowAdminCreateCategory')->middleware('admin');

Route::post('/admin-create-category-process','AdminController@AdminCreateCategoryProcess')->middleware('admin');

Route::post('/admin-delete-category/{category_id}','AdminController@AdminDeleteCategoryProcess')->middleware('admin');

Route::get('/admin-edit-category/{category_id}','UIViewController@ShowAdminEditCategory')->middleware('admin');

Route::post('/admin-edit-category-process/{category_id}','AdminController@AdminEditCategoryProcess')->middleware('admin');

Route::get('/category/{category_id}','UIViewController@ShowCategory');

Route::get('/admin-slide','UIViewController@ShowAdminSlide')->name('admin-slide')->middleware('admin');

Route::get('/admin-create-slide','UIViewController@ShowAdminCreateSlide')->middleware('admin');

Route::post('/admin-create-slide-process','AdminController@AdminCreateSlideProcess')->middleware('admin');

Route::post('/admin-delete-slide/{slide_id}','AdminController@AdminDeleteSlideProcess')->middleware('admin');

Route::get('/admin-edit-slide/{slide_id}','UIViewController@ShowAdminEditSlide')->middleware('admin');

Route::post('/admin-edit-slide-process/{slide_id}','AdminController@AdminEditSlideProcess')->middleware('admin');

Route::get('/show-course/{user_id}','UIViewController@ShowCourse')->name('show-course');

Route::get('/create-course/{user_id}','UIViewController@ShowCreateCourse')->middleware('login');

Route::post('/create-course-process','CourseController@CreateCourseProcess')->middleware('login');

Route::get('/edit-course/{course_id}','UIViewController@ShowEditCourse')->middleware('login');

Route::post('/edit-course-process/{course_id}','CourseController@EditCourseProcess')->middleware('login');

Route::get('/see-course/{course_id}','UIViewController@ShowSeeCourse');

Route::get('/admin-course','UIViewController@ShowAdminCourse')->name('admin-course')->middleware('admin');

Route::get('/admin-edit-course/{course_id}','UIViewController@ShowAdminEditCourse')->middleware('admin');

Route::post('/admin-edit-course-process/{course_id}','AdminController@AdminEditCourseProcess')->middleware('admin');

Route::post('/admin-delete-course/{course_id}','AdminController@AdminDeleteCourseProcess')->middleware('admin');

Route::post('/admin-ban-course/{course_id}','AdminController@AdminBanCourseProcess')->middleware('admin');

Route::get('/admin-see-course/{course_id}','UIViewController@ShowAdminSeeCourse')->middleware('admin');

Route::get('/admin-course-ban','UIViewController@ShowAdminCourseBan')->name('admin-course-ban')->middleware('admin');

Route::post('/admin-forcedelete-course/{course_id}','AdminController@AdminForceDeleteProcess')->middleware('admin');

Route::post('/admin-restore-ban-course/{course_id}','AdminController@AdminRestoreBanProcess')->middleware('admin');

Route::get('/admin-see-ban-course/{course_id}','UIViewController@AdminSeeBanCourse')->middleware('admin');

Route::get('/admin-course-approve','UIViewController@ShowAdminCourseApprove')->name('admin-approve')->middleware('admin');

Route::get('/admin-course-not-approve','UIViewController@ShowAdminCourseNotApprove')->name('admin-not-approve')->middleware('admin');

Route::post('/admin-approve-course/{course_id}','AdminController@AdminApproveCourseProcess')->middleware('admin');

Route::get('/admin-course-reject','UIViewController@ShowAdminCourseReject')->middleware('admin');

Route::post('/admin-reject-course-process/{course_id}','AdminController@AdminRejectCourseProcess')->middleware('admin');

Route::get('/admin-see-course-approve/{course_id}','UIViewController@ShowAdminSeeCourseApprove')->middleware('admin');

Route::get('/admin-see-course-not-approve/{course_id}','UIViewController@ShowAdminSeeCourseNotApprove')->middleware('admin');

Route::get('/admin-see-course-reject/{course_id}','UIViewController@ShowAdminSeeCourseReject')->middleware('admin');

Route::post('/study-process/{course_id}','StudyController@StudyThisCourse')->middleware('login');

Route::post('/admin-suggest-course-process/{course_id}','AdminController@AdminSuggestCourseProcess')->middleware('admin');

Route::get('/admin-user','UIViewController@ShowAdminUser')->middleware('admin');

Route::post('/admin-ban-user/{user_id}','AdminController@AdminBanUserProcess')->middleware('admin');

Route::post('/admin-add-course-qty-process/{user_id}','AdminController@AdminAddCourseQtyProcess')->middleware('admin');

Route::post('/transfer-study-process/{course_id}','StudyController@TransferStudyProcess')->middleware('login');

Route::post('/upload-slip','StudyController@UploadSlip')->middleware('login');

Route::post('/change-transfer-method/{course_id}','StudyController@ChangeTransferMethod')->middleware('login');

Route::get('/admin-transfer','UIViewController@ShowAdminTransfer')->name('admin-transfer')->middleware('admin');

Route::get('/admin-see-transfer/{transfer_id}','UIViewController@ShowAdminSeeTransfer')->middleware('admin');

Route::post('/admin-transfer-approve/{course_id}','StudyController@AdminTransferApprove')->middleware('admin');

Route::post('/admin-transfer-reject/{course_id}','StudyController@AdminTransferReject')->middleware('admin');

Route::get('/search-data','UIViewController@ShowSearchResult');

Route::get('/delete-course-other-img/{course_other_img_id}','CourseController@DelteCourseOtherImgProcess')->middleware('login');

//Route::get('/wallet/{user_id}','UIViewController@ShowWallet');//
