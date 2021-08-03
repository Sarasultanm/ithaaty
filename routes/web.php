<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;


/*-- Admin ---*/
use App\Http\Middleware\Administrator;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminSettings;
use App\Http\Livewire\Admin\AdminPopular;
use App\Http\Livewire\Admin\AdminTrending;

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

use App\Http\Livewire\Editor\EditorContact;
use App\Http\Livewire\Editor\EditorNotification;
use App\Http\Livewire\Editor\EditorSubscribers;
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
Route::get('/popular', [MainController::class, 'viewPopular'])->name('popular');
Route::get('/trending', [MainController::class, 'viewTrending'])->name('trending');
Route::get('/podcaster', [MainController::class, 'viewPodcaster'])->name('podcaster');

Route::group(['middleware' => Administrator::class,'prefix'=>'admin'], function(){

	Route::get('dashboard',AdminDashboard::class)->name('adminDashboard');
	Route::get('settings',AdminSettings::class)->name('adminSettings');
	Route::get('popular',AdminPopular::class)->name('adminPopular');
	Route::get('trending',AdminTrending::class)->name('adminTrending');
});



Route::group(['middleware' => Editor::class,'prefix'=>'editor'], function(){

	Route::get('dashboard',EditorDashboard::class)->name('editorDashboard');
	
	Route::get('podcast',EditorPodcast::class)->name('editorPodcast');
	Route::get('podcast/details/{id}',EditorPodcastDetail::class)->name('editorPodcastDetails');

	Route::get('settings',EditorSettings::class)->name('editorSettings');
	Route::get('popular',EditorPopular::class)->name('editorPopular');
    Route::get('trending',EditorTrending::class)->name('editorTrending');
    Route::get('overview',EditorOverview::class)->name('editorOverview');

    Route::get('contacts',EditorContact::class)->name('editorCotanct');
    Route::get('subscribers',EditorSubscribers::class)->name('editorSubscribers');
    Route::get('notifications',EditorNotification::class)->name('editorNotification');

	Route::get('users',EditorViewUsers::class)->name('editorViewUser');
	//Route::get('users/{id}', [MainController::class, 'viewUsers']);
	Route::get('users/{id}',EditorViewUsers::class)->name('editorViewUser');

});

















require __DIR__.'/auth.php';
