<?php

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


Route::get('/', function () {
    $threads=App\Thread::paginate(15);
    return view('welcome',compact('threads'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('thread/search','ThreadController@search');

Route::post('/thread/mark-as-solution','ThreadController@markAsSolution')->name('markAsSolution');
Route::resource('/thread','ThreadController');


Route::resource('comment','CommentController',['only'=>['update','destroy']]);

Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');


Route::post('comment/like','LikeController@toggleLike')->name('toggleLike');

Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile');

Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});


Route::get('/dashboard', 'ChartsController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>['auth','admin']], function(){

	Route::get('/dashboard', 'ChartsController@index');

});
// 

Route::resource('/admin-roles','UserController');
Route::resource('/admin-etudiants','EtudiantController');
Route::resource('/admin-professeurs','ProfesseurController');
Route::resource('/admin-filieres','FiliereController');
Route::resource('/admin-matieres','MatiereController');
Route::resource('/admin-cheffillieres','ChefFilliereController');


//Route::get('/admin-modifierRoles/{id}','UserController@registered');

Route::get('/fullcalendareventmaster','FullCalendarEventMasterController@index');
Route::post('/fullcalendareventmaster/create','FullCalendarEventMasterController@create');
Route::post('/fullcalendareventmaster/update','FullCalendarEventMasterController@update');
Route::post('/fullcalendareventmaster/delete','FullCalendarEventMasterController@destroy');
Route::get('/evenements','FullCalendarEventMasterController@show');



Route::resource('/thread','ThreadController');
Route::resource('/cours','CoursController');
Route::resource('/note','NoteController');
Route::resource('/emploi','EmploiController');
Route::resource('/taf','TafController');
Route::resource('/td','TdController');

//tri par matiere
Route::get('/cours/getmatieres/{id}','CoursController@getMatieres');
Route::get('/note/getmatieres/{id}','NoteController@getMatieres');
Route::get('/taf/getmatieres/{id}','TafController@getMatieres');
Route::get('/td/getmatieres/{id}','TdController@getMatieres');

// liens emails
Route::get('/sendcoursmail','CoursController@sendmail');
Route::get('/sendnotesmail','NoteController@sendmail');
Route::get('/sendtafsmail','TafController@sendmail');
Route::get('/sendtdsmail','TdController@sendmail');

