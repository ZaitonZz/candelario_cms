<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SubSkillsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/socials', [SocialController::class, 'index']);
Route::get('image/{filename}', [ImageController::class ,'show']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/skills', [SkillsController::class, 'index']);
Route::get('/subskills', [SubSkillsController::class, 'index']);
Route::get('/experience', [ExperienceController::class, 'index']);
Route::get('/records', [RecordsController::class, 'index']);
Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::get('/card', [CardController::class, 'index']);
Route::post('/contact', [ContactController::class, 'submitForm']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/nav', [NavController::class, 'index']);
Route::get('pdf/{filename}', [PDFController::class ,'show']);