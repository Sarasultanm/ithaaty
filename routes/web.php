<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;


/*-- Admin ---*/
use App\Http\Middleware\Administrator;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminSettings;
use App\Http\Livewire\Admin\AdminPopular;
use App\Http\Livewire\Admin\AdminTrending;
use App\Http\Livewire\Admin\AdminAds;
use App\Http\Livewire\Admin\AdminAdsCreate;
use App\Http\Livewire\Admin\AdminAdsDetails;
use App\Http\Livewire\Admin\AdminAdsSetup;
use App\Http\Livewire\Admin\AdminCreateAds;
use App\Http\Livewire\Admin\AdminPlans;
use App\Http\Livewire\Admin\AdminPlanCreate;

/*-- Editor ---*/
use App\Http\Middleware\Editor;
use App\Http\Livewire\Editor\EditorDashboard;
use App\Http\Livewire\Editor\EditorPodcast;
use App\Http\Livewire\Editor\EditorSettings;
use App\Http\Livewire\Editor\EditorViewUsers;
use App\Http\Livewire\Editor\EditorTrending;
use App\Http\Livewire\Editor\EditorPopular;
use App\Http\Livewire\Editor\EditorOverview;
use App\Http\Livewire\Editor\EditorPodcastDetail;
use App\Http\Livewire\Editor\EditorNotes;
use App\Http\Livewire\Editor\EditorAds;
use App\Http\Livewire\Editor\EditorAdsCompany;
use App\Http\Livewire\Editor\EditorAdsPodcast;
use App\Http\Livewire\Editor\EditorActivity;
use App\Http\Livewire\Editor\EditorFriends;



use App\Http\Livewire\Editor\EditorContact;
use App\Http\Livewire\Editor\EditorNotification;
use App\Http\Livewire\Editor\EditorSubscribers;
use App\Http\Livewire\Editor\EditorSubscriberOverview;
use App\Http\Livewire\Editor\EditorPodcastView;
use App\Http\Livewire\Editor\EditorCreatePost;
use App\Http\Livewire\Editor\EditorUpdatePost;
use App\Http\Livewire\Editor\EditorPlaylist;
use App\Http\Livewire\Editor\EditorPlaylistDetails;
use App\Http\Livewire\Editor\EditorFollowing;
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

// Route::get('/', function () {
//     return view('about');
// });


// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [MainController::class, 'about']);

Route::get('/post/{id}', [MainController::class, 'viewPost']);
Route::get('/embed/{id}', [MainController::class, 'viewEmbed']);
Route::get('/popular', [MainController::class, 'viewPopular'])->name('popular');
Route::get('/trending', [MainController::class, 'viewTrending'])->name('trending');
Route::get('/podcaster', [MainController::class, 'viewPodcaster'])->name('podcaster');
Route::get('/aboutus', [MainController::class, 'viewAboutus'])->name('aboutus');
Route::get('/advertise', [MainController::class, 'viewAdvertise'])->name('advertise');

Route::get('rss/feed/{username}', [MainController::class, 'viewGenerateRSS'])->name('generateRSS');
// https://anchor.fm/s/6aa1b994/podcast/rss



Route::group(['middleware' => Administrator::class,'prefix'=>'admin'], function(){

	Route::get('dashboard',AdminDashboard::class)->name('adminDashboard');
	Route::get('settings',AdminSettings::class)->name('adminSettings');
	Route::get('popular',AdminPopular::class)->name('adminPopular');
	Route::get('trending',AdminTrending::class)->name('adminTrending');
	Route::get('ads',AdminAds::class)->name('adminAds');
	Route::get('ads/create',AdminAdsCreate::class)->name('adminAdsCreate');
	Route::get('ads/details/{id}',AdminAdsDetails::class)->name('adminAdsDetails');
	Route::get('ads/setup/{id}',AdminAdsSetup::class)->name('adminAdsSetup');
	Route::get('ads/adsCreate',AdminCreateAds::class)->name('adminCreateAds');
	Route::get('plans',AdminPlans::class)->name('adminPlans');
    Route::get('plans/create',AdminPlanCreate::class)->name('adminPlansCreate');
});





Route::group(['middleware' => Editor::class,'prefix'=>'editor'], function(){

	Route::get('dashboard',EditorDashboard::class)->name('editorDashboard');
	
	Route::get('podcast',EditorPodcast::class)->name('editorPodcast');
	Route::get('podcast/details/{id}',EditorPodcastDetail::class)->name('editorPodcastDetails');
	Route::get('podcast/view/{id}',EditorPodcastView::class)->name('editorPodcastView');

	Route::get('settings',EditorSettings::class)->name('editorSettings');
	Route::get('popular',EditorPopular::class)->name('editorPopular');
    Route::get('trending',EditorTrending::class)->name('editorTrending');
    Route::get('overview',EditorOverview::class)->name('editorOverview');
    Route::get('overview/subscribers',EditorSubscriberOverview::class)->name('editorSubscriberOverview');

    Route::get('notes',EditorNotes::class)->name('editorNotes');
    Route::get('contacts',EditorContact::class)->name('editorCotanct');
    Route::get('subscribers',EditorSubscribers::class)->name('editorSubscribers');
    Route::get('notifications',EditorNotification::class)->name('editorNotification');

	Route::get('users',EditorViewUsers::class)->name('editorViewUser');
	//Route::get('users/{id}', [MainController::class, 'viewUsers']);
	Route::get('users/{id}',EditorViewUsers::class)->name('editorViewUser');

	Route::get('podcast/create',EditorCreatePost::class)->name('editorPodcastCreate');
	Route::get('podcast/update/{id}',EditorUpdatePost::class)->name('editorPodcastUpdate');

	Route::get('ads',EditorAds::class)->name('editorAds');
	Route::get('ads/company',EditorAdsCompany::class)->name('editorAdsCompany');
	Route::get('ads/podcast',EditorAdsPodcast::class)->name('editorAdsPodcast');

	Route::get('activity',EditorActivity::class)->name('editorActivity');
	Route::get('friends',EditorFriends::class)->name('editorFriends');

	Route::get('playlist/{id}',EditorPlaylist::class)->name('editorPlaylist');
	Route::get('playlist',EditorPlaylistDetails::class)->name('editorPlaylistDetails');
	Route::get('following',EditorFollowing::class)->name('editorFollowing');
});

















require __DIR__.'/auth.php';
