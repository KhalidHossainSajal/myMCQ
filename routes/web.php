<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// subjects
Route::get('/create_subject', [App\Http\Controllers\SubjectsController::class, 'create'])->name('create_subject');
Route::get('/get_subjects', [App\Http\Controllers\SubjectsController::class, 'get_subjects'])->name('get_subjects');
Route::post('/subjects', [App\Http\Controllers\SubjectsController::class, 'store']);
// chapters
Route::get('/create_chapter', [App\Http\Controllers\ChapterController::class, 'create'])->name('chapter');
Route::get('/get_chapters', [App\Http\Controllers\ChapterController::class, 'get_chapters'])->name('get_chapters');
Route::post('/add_chapter', [App\Http\Controllers\ChapterController::class, 'store']);
Route::get('/getChaptersById/{subjectId}/chapters', [App\Http\Controllers\ChapterController::class, 'getChaptersById'])->name('getChaptersById');
// mcq
Route::get('/create_mcq', [App\Http\Controllers\McqQuestionController::class, 'create'])->name('create_mcq');
Route::post('/add_mcq', [App\Http\Controllers\McqQuestionController::class, 'store']);
//contact messages
Route::get('/create_msg', [App\Http\Controllers\contactMessageController::class, 'create'])->name('create');
Route::post('/add_msg', [App\Http\Controllers\contactMessageController::class, 'store']);
// Short questions
Route::get('/create_short_question', [App\Http\Controllers\ShortQuestionController::class, 'create'])->name('create');
Route::post('/add_short_question', [App\Http\Controllers\ShortQuestionController::class, 'store']);
