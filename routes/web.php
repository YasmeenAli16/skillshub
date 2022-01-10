<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\ExamController as AdminExamController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\MessagesController;
use App\Http\Controllers\admin\SkillController as AdminSkillController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\ExamController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\SkillController;
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


Route::middleware('ChangeLang')->group(function(){

    Route::get('/', [HomeController::class, 'index']
);
Route::get('/categories/show/{id}', [CategoryController::class, 'show']
);
Route::get('/skills/show/{id}', [SkillController::class, 'show']
);
Route::get('/exams/show/{id}', [ExamController::class, 'show']
);

Route::get('/exams/questions/{id}', [ExamController::class, 'questions']
)->middleware(['verified', 'auth', 'student']);

Route::post('/exams/start/{id}', [ExamController::class, 'start']
)->middleware(['verified', 'auth', 'student', 'can-enter-exam']);

Route::post('/exams/submit/{id}', [ExamController::class, 'submit']
)->middleware(['verified', 'auth', 'student']);

Route::get('/contact', [ContactController::class, 'index']
);

Route::post('/contact/message/send', [ContactController::class, 'send']
);

Route::get('/profile', [ProfileController::class, 'index']
)->middleware(['verified', 'auth', 'student']);;

});

Route::get('/lang/{lang}', [LangController::class, 'set']
);

Route::prefix('/dashboard')->middleware(['auth', 'verified', 'can-enter-dashboard'])->group(function(){
Route::get('/', [AdminHomeController::class, 'index']);
Route::get('/categories', [AdminCategoryController::class, 'index']);
Route::post('/categories/store', [AdminCategoryController::class, 'store']);
Route::post('/categories/update', [AdminCategoryController::class, 'update']);
Route::get('/categories/delete/{category}', [AdminCategoryController::class, 'delete']);
Route::get('/categories/toggle/{category}', [AdminCategoryController::class, 'toggle']);

Route::get('/skills', [AdminSkillController::class, 'index']);
Route::post('/skills/store', [AdminSkillController::class, 'store']);
Route::post('/skills/update', [AdminSkillController::class, 'update']);
Route::get('/skills/delete/{skill}', [AdminSkillController::class, 'delete']);
Route::get('/skills/toggle/{skill}', [AdminSkillController::class, 'toggle']);

Route::get('/exams', [AdminExamController::class, 'index']);
Route::get('/exams/show/{exam}', [AdminExamController::class, 'show']);
Route::get('/exams/show-questions/{exam}', [AdminExamController::class, 'showQuestions']);
Route::get('/exams/create-questions/{exam}', [AdminExamController::class, 'createQuestions']);
Route::post('/exams/store-questions/{exam}', [AdminExamController::class, 'storeQuestions']);
Route::get('/exams/create', [AdminExamController::class, 'create']);
Route::post('/exams/store', [AdminExamController::class, 'store']);
Route::get('/exams/edit/{exam}', [AdminExamController::class, 'edit']);
Route::post('/exams/update/{exam}', [AdminExamController::class, 'update']);
Route::get('/exams/edit-questions/{exam}/{question}', [AdminExamController::class, 'editQuestion']);
Route::post('/exams/update-questions/{exam}/{question}', [AdminExamController::class, 'updateQuestion']);
Route::get('/exams/delete/{exam}', [AdminExamController::class, 'delete']);
Route::get('/exams/toggle/{exam}', [AdminExamController::class, 'toggle']);

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/show-scores/{id}', [StudentController::class, 'showScores']);
Route::get('/students/open-exam/{studentId}/{examId}', [StudentController::class, 'openExam']);
Route::get('/students/close-exam/{studentId}/{examId}', [StudentController::class, 'closeExam']);

Route::middleware('superadmin')->group(function() {

    Route::get('/admins', [AdminController::class, 'index']);
    Route::get('/admins/create', [AdminController::class, 'create']);
    Route::post('/admins/store', [AdminController::class, 'store']);
    Route::get('/admins/promote/{id}', [AdminController::class, 'promote']);
    Route::get('/admins/demote/{id}', [AdminController::class, 'demote']);
});

Route::get('/messages', [MessagesController::class, 'index']);
Route::get('/messages/show/{messages}', [MessagesController::class, 'show']);
Route::post('/messages/response/{messages}', [MessagesController::class, 'response']);

});

