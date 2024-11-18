<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\BourseController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\TypeChampController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\PieceJointeController;
use App\Http\Controllers\DiplomeDeBaseController;
use App\Http\Controllers\AnneeAcademiqueController;
use App\Http\Controllers\ChampFormulaireController;
use App\Http\Controllers\Api\AssocBourseFiliereController;
use App\Http\Controllers\Api\AssocBoursePieceJointeController;
use App\Http\Controllers\Api\AssocDemandePieceJointeController;
use App\Http\Controllers\Api\AssocBourseDiplomeDisponibleController;
use App\Http\Middleware\SetCustomHostname;

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
Route::get('theme-toggle', function () {
    if (session('theme')) {
        session()->forget('theme');
    } else {
        session(['theme' => 'dark']);
    }
    return back();
})->name('theme-toggle');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::redirect('/home', '/');
Route::middleware(['auth', 'permission:gerer users'])->group(function () {
    Route::resource("users", UserController::class);
    Route::post('users/{user_id}/roles', [UserController::class, 'storeRole'])->name('users.storeRole');
});
Route::middleware(['auth', 'permission:gerer roles'])->group(function () {
    Route::resource("roles", RoleController::class);
    Route::post('roles/{role}/permissions', [RoleController::class, 'storePermissions'])->name('roles.storePermissions');
});

Route::middleware(['auth', 'permission:gerer parametre de base systeme'])->group(function () {
    Route::resource('pays', PayController::class);
    Route::resource('cycles', CycleController::class);
    Route::resource('diplome-de-bases', DiplomeDeBaseController::class);
    Route::resource('annee-academiques', AnneeAcademiqueController::class);
    Route::resource('formulaires', FormulaireController::class);
    Route::resource('type-champs', TypeChampController::class, ["only" => ["index", "show"]]);
    Route::resource('champ-formulaires', ChampFormulaireController::class, ["only" => ["store", "destroy"]]);
});



Route::middleware(['auth', 'permission:gerer parametre des bourses'])->group(function () {
    Route::resource('piece-jointes', PieceJointeController::class);
    Route::resource('filieres', FiliereController::class);
});

Route::middleware(['auth', 'permission:gerer bourses'])->group(function () {
    Route::resource('bourses', BourseController::class);
    Route::post('bourses/{bourse}/diplomes', [BourseController::class, 'storeDiplomes'])->name('bourses.storeDiplomes');
    Route::post('bourses/{bourse}/add-pj', [BourseController::class, 'addPj'])->name('bourses.addPj');
    Route::delete('bourses/{bourse}/deletePj', [BourseController::class, 'deletePj'])->name('bourses.deletePj');
    Route::get('bourses/{bourse}/toggle-publish', [BourseController::class, 'toggle_publish'])->name('bourses.toggle_publish');


    Route::post('bourses/{bourse}/storeFiliere', [BourseController::class, 'storeFiliere'])->name('bourses.storeFiliere');
    Route::delete('bourses/{bourse}/deleteFiliere', [BourseController::class, 'deleteFiliere'])->name('bourses.deleteFiliere');
    Route::delete('bourses/{bourse}/{CodeDiplome}/destroy', [BourseController::class, 'destroyDiplome'])->name('bourses.destroyDiplome');

    Route::post('bourses/{bourse}/storeFormulaire', [BourseController::class, 'storeFormulaire'])->name('bourses.storeFormulaire');
    Route::delete('bourses/{bourse}/deleteFormulaire', [BourseController::class, 'deleteFormulaire'])->name('bourses.deleteFormulaire');
});


Route::middleware(['auth'])->group(function () {
    Route::get('bourse-postuler/{bourse}/process', [HomeController::class, 'processPostuler'])->name('bourses-postuler-process');
    Route::post('bourse-postuler/{bourse}/{demande_id}/push/{step}', [HomeController::class, 'processPostulerPost'])->name('bourses-postuler-push');
    Route::get('bourse-postuler/{bourse}/{demande_id}/download', [HomeController::class, 'generatePDF'])->name('bourses-postuler-download');
    Route::get('bourse-postuler/{bourse}/{demande_id}/{pj_id}/delete', [HomeController::class, 'deleteFile'])->name('bourses-postuler-deleteFile');
    Route::post('bourse-postuler/{bourse}/{demande_id}/costum-form', [HomeController::class, 'processPostFormCostum'])->name('bourses-postuler-costum-form');
});

Route::middleware(['auth', 'permission:gerer traitement des bourses'])->group(function () {
    Route::resource('demandes', DemandeController::class, ["only" => ["index", "show", 'update', "destroy"]]);
    Route::get('demandes/{demande}/valider-depot', [DemandeController::class, 'validerDepot'])->name('demandes.valider-depot');
});


Route::get('bourse-en-cours', [HomeController::class, 'bourse_disponible'])->name('bourses-disponible');
Route::get('bourse-postuler/{bourse}', [HomeController::class, 'postuler'])->name('bourses-postuler');

// Route::apiResource('assoc-bourse-diplome-disponibles', AssocBourseDiplomeDisponibleController::class, ["only" => ["store", "destroy"]]);
// Route::apiResource('assoc-bourse-piece-jointes', AssocBoursePieceJointeController::class);
// Route::apiResource('assoc-bourse-filieres', AssocBourseFiliereController::class);
// Route::apiResource('assoc-demande-piece-jointes', AssocDemandePieceJointeController::class);


// Route::resource('demandes', DemandeController::class);
Route::redirect("/home", "bourse-en-cours");
Route::redirect("/", "bourse-en-cours")->name('home');
Route::get('/rt', function () {
    //CHANGE HEADER HOST
    $_SERVER['HTTP_HOST'] = "localhost";
    echo route("bourses-disponible") . "\n";
    echo route("login") . "\n";
    return "ok\n";
});
