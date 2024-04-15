<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoodlePromptController;
use App\Http\Controllers\EventOrganiserController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusoMembershipController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/admin', function () {
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });
    Route::get('home', function () {
        return view('home');
    });
});
Auth::routes();

// -----------------------------login-------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
   // Route::get('/register', 'register')->name('register');
    Route::post('/register', 'storeUser')->name('register');
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth','disable_back_btn')->name('home');
});

// ------------------------------------------------------------
Route::controller(HomepageController::class)->group(function () {

    Route::get('/homepage_video/edit/{id}', 'editHomepageVideo')->name('edit_homepage_video');
    Route::post('/homepage_video/update/{id}', 'updateHomepageVideo')->name('update_homepage_video');
    Route::get('/homepage_video/delete/{id}', 'deleteHomepageVideo')->name('delete_homepage_video');
    Route::get('/show_homepage_videos', 'showHomepageVideos')->name('show_homepage_videos');

    //homepage_email
    Route::get('/view_email_newsletter', 'view_email_newsletter')->middleware('auth')->name('view_email_newsletter');
    Route::get('/email_newsletter/delete/{id}', 'delete_email_newsletter')->name('delete_email_newsletter');
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/add_content', 'index')->middleware('auth')->name('add_content');
    Route::get('/about_list', 'getAboutList')->middleware('auth')->name('about_list');
    Route::post('/add_data', 'addContent')->middleware('auth')->name('add_data');
    Route::post('/add_data_section2', 'addSection2')->middleware('auth')->name('add_data_section2');
    Route::post('/add_data_section5', 'about_section5')->middleware('auth')->name('add_data_section5');
    // Route::get('/edit_about_section/{id}', 'edit_content')->middleware('auth')->name('edit_about_section');
    Route::get('/edit_about_section', 'edit_content')->middleware('auth')->name('edit_about_section');
    Route::post('/update_section', 'update_section')->middleware('auth')->name('update_section');
    Route::post('/delete_Record', 'deleteAboutRecord')->middleware('auth')->name('delete_Record');
    //homepage_email 
    // Route::get('/view_email_newsletter', 'view_email_newsletter')->middleware('auth')->name('view_email_newsletter');
    

});

Route::controller(ContactController::class)->group(function () {
    Route::get('/add_contact_details', 'index')->middleware('auth')->name('add_contact_details');
    Route::post('/addContactContent', 'addContactContent')->middleware('auth')->name('addContactContent');
    Route::get('/get_contact_details', 'getContactList')->middleware('auth')->name('get_contact_details');
    Route::get('/edit_contact_details/{id}', 'edit_contact')->middleware('auth')->name('edit_contact_details');
    Route::post('/update_contact_details', 'update_contact_details')->middleware('auth')->name('update_contact_details');
    Route::post('/delete_contact_details', 'deleteRecord')->middleware('auth')->name('delete_contact_details');
    Route::get('/booking_details', 'getBookingDetails')->middleware('auth')->name('booking_details');
    Route::get('/edit_careers/{id}', 'edit_contact')->middleware('auth')->name('edit_careers');

});

Route::controller(TeamsController::class)->group(function () {
    Route::get('/add_teams', 'index')->middleware('auth')->name('add_teams');
    Route::post('/add_teams', 'add_teams')->middleware('auth')->name('add_teams');
    Route::get('/get_teams_details', 'view_teams_data')->middleware('auth')->name('get_teams_details');
    Route::get('/edit_teamsFirstSection', 'edit_teamsFirstSection')->middleware('auth')->name('edit_teamsFirstSection');
    Route::get('/edit_teamsExecutive', 'edit_teamsExecutive')->middleware('auth')->name('edit_teamsExecutive');
    Route::get('/edit_teamsJoinUs', 'edit_teamsJoinUs')->middleware('auth')->name('edit_teamsJoinUs');
    Route::get('/edit_teamsAdvisory', 'edit_teamsAdvisory')->middleware('auth')->name('edit_teamsAdvisory');
    Route::get('/edit_teamsPatrons', 'edit_teamsPatrons')->middleware('auth')->name('edit_teamsPatrons');
    Route::get('/edit_consultants', 'edit_consultants')->middleware('auth')->name('edit_consultants');
    Route::post('/add_join_content', 'join_us')->middleware('auth')->name('add_join_content');
    Route::post('/advisory_board', 'advisory_board')->middleware('auth')->name('advisory_board');
    Route::post('/executive_team', 'executive_team')->middleware('auth')->name('executive_team');
    Route::post('/patrons_supports', 'patrons_supports')->middleware('auth')->name('patrons_supports');
    Route::post('/counsult_data', 'counsult_data')->middleware('auth')->name('counsult_data');
    Route::get('/delete_consultant', 'delete_consultant')->middleware('auth')->name('delete_consultant');
    Route::get('/delete_executive_team', 'delete_executive_team')->middleware('auth')->name('delete_executive_team');

});

// -------------------------- user management ----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('user/table', 'index')->middleware('auth')->name('user/table');
    Route::post('user/update', 'updateRecord')->name('user/update');
    Route::post('user/delete', 'deleteRecord')->name('user/delete');
    Route::get('user/profile', 'profileUser')->middleware('auth')->name('user/profile');

});

Route::controller(EventOrganiserController::class)->group(function () {
    Route::get('/addEventInfo', 'index')->middleware('auth')->name('addEventInfo');
    Route::get('/event_list', 'getEvent_orgniserData')->middleware('auth')->name('event_info');
    Route::post('/event_info', 'event_orgniserData')->middleware('auth')->name('event_orgniserData');
    Route::get('/edit_event_info/{id}', 'edit_eventInfo')->middleware('auth')->name('edit_event_info');
    Route::post('/update_eventInfo', 'update_eventInfo')->middleware('auth')->name('update_eventInfo');
    Route::post('/deleteEventRecord', 'deleteEventRecord')->middleware('auth')->name('deleteEventRecord');
});

Route::controller(MusoMembershipController::class)->group(function () {
    Route::get('/addMembership', 'index')->middleware('auth')->name('addMembership');
    Route::post('/addMemberhipData', 'addMemberhipData')->middleware('auth')->name('addMemberhipData');
    Route::get('/membership_data', 'getMemberShipData')->middleware('auth')->name('getMemberShipData');
    Route::get('/edit_membership/{id}', 'edit_membership')->middleware('auth')->name('edit_membership');
    Route::post('/deletMembershipRecord', 'delete_record')->middleware('auth')->name('deletMembershipRecord');
    Route::get('/deleteMembership', 'deleteMembershipDetails')->middleware('auth')->name('deleteMembership');
    Route::post('/addSchoolEventData', 'addSchoolEventData')->middleware('auth')->name('addSchoolEventData');
    Route::get('/schoolEvent', 'schoolEvent')->middleware('auth')->name('schoolEvent');
    Route::get('/edit_schoolEvent/{id}', 'edit_schoolEvent')->middleware('auth')->name('edit_schoolEvent');
    Route::get('/addVisitHours', 'addVisitHours')->middleware('auth')->name('addVisitHours');
    Route::post('/addVisitHoursData', 'addVisitHoursData')->middleware('auth')->name('addVisitHoursData');
    Route::get('/viewVisit_hours', 'viewVisit_hours')->middleware('auth')->name('viewVisit_hours');
    Route::post('/deletVisitHoursRecord', 'deletVisitHoursRecord')->middleware('auth')->name('deletVisitHoursRecord');
    //   
        Route::get('member_details', 'view_member_query')->middleware('auth')->name('visitMemberForm');
Route::post('/deleteMember', 'deleteMember')->middleware('auth')->name('deleteMember');
    Route::get('school_enquiry_details', 'school_enquiry_details')->middleware('auth')->name('school_enquiry_details');
    Route::post('/delete_school_enquiry', 'delete_school_enquiry')->middleware('auth')->name('delete_school_enquiry');

});

Route::controller(DoodlePromptController::class)->group(function () {
    Route::get('add_prompt', 'index')->middleware('auth')->name('add_prompt');
    Route::post('promptData', 'promptData')->middleware('auth')->name('promptData');
    Route::get('prompt_details', 'getPromptData')->middleware('auth')->name('getPromptData');
    Route::get('/edit_promptInfo/{id}', 'edit_promptInfo')->middleware('auth')->name('edit_promptInfo');
    Route::post('/update_promptInfo', 'update_promptInfo')->middleware('auth')->name('update_promptInfo');
    Route::post('/deletePromptRecord', 'deletePromptRecord')->middleware('auth')->name('deletePromptRecord');
    // 
    Route::get('doodle_details', 'doodle_details')->middleware('auth')->name('doodle_details');
    Route::get('download/{id}', 'downloadDoodle')->middleware('auth')->name('downloadDoodle');
    Route::post('/deletedoodleRecord', 'deletedoodleRecord')->middleware('auth')->name('deletedoodleRecord');
});

// -------------------------- type form ----------------------//

Route::controller(TypeFormController::class)->group(function () {
    Route::get('form/input/new', 'index')->middleware('auth')->name('form/input/new');

});
Route::controller(ExploreController::class)->group(function () {
    Route::post('/add_explore_details', 'add_explore')->name('add_explore_details');
    Route::get('/view_section_tab_form', 'index')->name('view_section_tab_form');
    Route::get('/get_explore_details', 'view_explore')->name('get_explore_details');
    // Route::post('/delete_explore_details/{id}', 'delete_explore')->name('delete_explore_details');
    Route::post('/delete_explore_details', 'delete_explore')->name('delete_explore_details');
    Route::get('/edit_explore/{id}', 'edit_explore')->name('edit_explore');
    Route::put('/update_explore', 'update_explore')->name('update_explore');
    Route::get('/delete_explore_tab_details', 'delete_explore_tab')->name('delete_explore_tab_details');
});
//

Route::get('/callback', [CallbackController::class, 'index'])->name('callback');
Route::post('/webhook', [CallbackController::class, 'webhook'])->name('webhook');
