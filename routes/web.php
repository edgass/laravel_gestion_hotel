.<?php
use App\Http\Controllers\recruitementController;
use App\Http\Controllers\employeController;
use App\Http\Controllers\reschambreController;
use App\Http\Controllers\chambreController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\heurentreController;
use App\Http\Controllers\heursortieController;
use App\Http\Controllers\heurposeController;
use App\Http\Controllers\resrestaurantController;
use App\Http\Controllers\resparkingController;
use App\Http\Controllers\respiscineController;
use App\Http\Controllers\piscineController;
use App\Http\Controllers\parkingController;
use App\Http\Controllers\pointageController;
use App\Http\Controllers\table_restaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\ComptabiliteController;
use App\Http\Controllers\factureController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('back.main');
    })->name('dashboard');
});
Route::group(['middleware'=>['auth']], function(){
    Route::get('/logout',[logoutController::class,'perform'])
    ->name('logout.perform');
    });

Route::resource('/back/recruitement', recruitementController::class)->middleware('auth');
Route::resource('/back/employe', employeController::class)->middleware('auth');
Route::resource('/back/reschambre', reschambreController::class)->middleware('auth');
Route::resource('/back/resrestaurant', resrestaurantController::class)->middleware('auth');
Route::resource('/back/resparking', resparkingController::class)->middleware('auth');
Route::resource('/back/respiscine', respiscineController::class)->middleware('auth');
Route::resource('/back/client', clientController::class)->middleware('auth');
Route::resource('/back/pointage', pointageController::class)->middleware('auth');
Route::resource('/back/chambre', chambreController::class)->middleware('auth');
Route::resource('/back/parking', parkingController::class)->middleware('auth');
Route::resource('/back/piscine', piscineController::class)->middleware('auth');
Route::resource('/back/heurentre', heurentreController::class)->middleware('auth');
Route::resource('/back/heursortie', heursortieController::class)->middleware('auth');
Route::resource('/back/heurpose', heurposeController::class)->middleware('auth');
Route::resource('/back/table_restaurant', table_restaurantController::class)->middleware('auth');

Route::resource('/facture', FactureController::class)->middleware('auth');
Route::resource('/comptabilite', ComptabiliteController::class)->middleware('auth');

Route::get('/downloadPDF/{idFacture}',[FactureController::class,'print'])->name('printFacture');
Route::get('/download/compta',[ComptabiliteController::class,'print'])->name('printSituationComptable');

Route::get('/recruitement/state/{idrecruitement}', [recruitementController::class, 'state'])->name('recruitement.state');
Route::get('/employe/state/{idemploye}', [employeController::class, 'state'])->name('employe.state');
Route::get('/resparking/state/{idresparking}', [resparkingController::class, 'state'])->name('resparking.state');
Route::get('/respiscine/state/{idrespiscine}', [respiscineController::class, 'state'])->name('respiscine.state');
Route::get('/resrestaurant/state/{idresrestaurant}', [resrestaurantController::class, 'state'])->name('resrestaurant.state');
Route::get('/reschambre/state/{idreschambre}', [reschambreController::class, 'state'])->name('reschambre.state');
Route::get('/client/state/{idclient}', [clientController::class, 'state'])->name('client.state');
Route::get('/chambre/state/{idchmabre}', [chambreController::class, 'state'])->name('chambre.state');
Route::get('/piscine/state/{idpiscine}', [piscineController::class, 'state'])->name('piscine.state');
Route::get('/parking/state/{idparking}', [parkingController::class, 'state'])->name('parking.state');
Route::get('/heurpose/state/{idheurpose}', [heurposeController::class, 'state'])->name('heurpose.state');
Route::get('/heurentre/state/{idheurentre}', [heurentreController::class, 'state'])->name('heurentre.state');
Route::get('/heursorie/state/{idheursortie}', [heursortieController::class, 'state'])->name('heursortie.state');
Route::get('/pointage/state/{id}', [pointageController::class, 'state'])->name('pointage.state');
Route::get('/table_restaurant/state/{idtable_restaurant}', [table_restaurantController::class, 'state'])->name('table_restaurant.state');
Route::get('/facturation/state/{idfacture}', [factureController::class, 'state'])->name('facture.state');

Route::get('/redirection/reservation/restaurant', [resrestaurantController::class, 'redirection'])->name('redirectionRestaurant');
Route::get('/redirection/reservation/chambre', [reschambreController::class, 'redirection'])->name('redirectionChambre');
Route::get('/redirection/reservation/parking', [resparkingController::class, 'redirection'])->name('redirectionParking');
Route::get('/redirection/reservation/piscine', [respiscineController::class, 'redirection'])->name('redirectionPiscine');
Route::get('/createC2', [reschambreController::class, 'create2'])->name('reschambre.create2');
Route::get('/createPi2', [respiscineController::class, 'create2'])->name('respiscine.create2');
Route::get('/createPk2', [resparkingController::class, 'create2'])->name('resparking.create2');
Route::get('/createR2', [resrestaurantController::class, 'create2'])->name('resrestaurant.create2');

Route::put('/store/chambre', [clientController::class, 'storeC']);
Route::put('/store/resto', [clientController::class, 'storeR']);
Route::put('/store/parking', [clientController::class, 'storePk']);
Route::put('/store/piscine', [clientController::class, 'storePi']);

Route::get('/createC', [clientController::class, 'createC'])->name('createC');
Route::get('/createR', [clientController::class, 'createR'])->name('createR');
Route::get('/createPi', [clientController::class, 'createPi'])->name('createPi');
Route::get('/createPK', [clientController::class, 'createPk'])->name('createPk');
