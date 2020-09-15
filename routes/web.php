<?php

use Illuminate\Support\Facades\Route;
use App\Equipe;
use App\Products;

use App\Mail\NotificationMail;
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

Route::get('/email', function () {
    return new NotificationMail();
});


Route::get('/', function () {
    return view('welcome',['users'=>Products::all()]);
});

Route::get('/article', 'EquipeController@index')->name('all.article')->middleware('auth');;

Route::get('/detail/{id}', 'EquipeController@show')->name('detail.article')->middleware('auth');;


Route::get('/create','EquipeController@create')->name('create.article')->middleware('auth');;

Route::post('/store','EquipeController@store')->middleware('auth');;
Route::delete('/delete/{id}','EquipeController@destroy')->name('article.destroy')->middleware('auth');;


Route::get('/facture/pdf/{id}','CommandeController@createPDF');

Route::get('/stats','CommandeController@stats')->name('stats')->middleware('auth');;
Route::get('/stats_commande','CommandeController@stats_commande')->name('stats_commande')->middleware('auth');;
Route::get('/stats_user','CommandeController@stat_user')->name('stats_user')->middleware('auth');;

Route::get('/create_super_user','EquipeController@create_super_user')->name('create_super_user')->middleware('auth');;
Route::get('/create_products','ProductsController@create_products')->name('create_products')->middleware('auth');;
Route::get('/create_modele','ProductsController@create_modele')->name('create_modele')->middleware('auth');;
Route::get('/create_ref','RefController@create_ref')->name('create_ref')->middleware('auth');;
Route::get('/create_commande/{id}','CommandeController@create_commande')->name('create_commande')->middleware('auth');;

Route::post('/store_user','EquipeController@store_user')->middleware('auth');;
Route::post('/store_products','ProductsController@store_products')->middleware('auth');;
Route::post('/store_modele','ProductsController@store_modele')->middleware('auth');;
Route::post('/store_ref','RefController@store_ref')->middleware('auth');;
Route::post('/store_commande/{id}','CommandeController@store_commande')->name('store.commande')->middleware('auth');;


Route::get('/modify_products/{id}','ProductsController@modify_products')->name('modify_products')->middleware('auth');;
Route::get('/modify_modele/{id}','ProductsController@modify_modele')->name('modify_modele')->middleware('auth');;
Route::get('/modify_ref/{id}','RefController@modify_ref')->name('modify_ref')->middleware('auth');;
Route::get('/modify_commande/{id}','CommandeController@modify_commande')->name('modify_commande')->middleware('auth');;
Route::get('/modify_user_info/{id}','CommandeController@modify_user_info')->name('modify_user_info')->middleware('auth');;
Route::get('/password_change/{id}','CommandeController@password_change')->name('password_chage')->middleware('auth');;

Route::post('/update_products/{id}','ProductsController@update_products')->middleware('auth');;
Route::post('/update_modele/{id}','ProductsController@update_modele')->middleware('auth');;
Route::post('/update_ref/{id}','RefController@update_ref')->middleware('auth');;
Route::post('/update_commande/{id}','CommandeController@update_commande')->middleware('auth');;
Route::post('/update_user/{id}','CommandeController@update_user')->middleware('auth');;
Route::post('/password_update/{id}','CommandeController@password_update')->middleware('auth');;

Route::get('/show_admins','EquipeController@show_admins')->name('show_admins')->middleware('auth');;
Route::get('/show_users','EquipeController@show_users')->name('show.users')->middleware('auth');;
Route::get('/show_products','ProductsController@show_products')->name('show_products')->middleware('auth');;
Route::get('/show_modele','ProductsController@show_modele')->name('show_modele')->middleware('auth');;
Route::get('/show_ref','RefController@show_ref')->name('show_ref')->middleware('auth');;
Route::get('/show_commande','CommandeController@show_commande')->name('show_commande')->middleware('auth');;
Route::get('/show_commande_user_side','CommandeController@show_commande_user_side')->name('show_commande_user_side')->middleware('auth');;


Route::get('/detail_products/{id}','ProductsController@detail_products')->name('products_detail');
Route::get('/detail_modele/{id}','ProductsController@detail_modele')->name('modele_detail')->middleware('auth');;
Route::get('/detail_ref/{id}','RefController@detail_ref')->name('ref_detail')->middleware('auth');;
Route::get('/commande_detail/{id}','CommandeController@commande_details')->name('commande_detail')->middleware('auth');;


Route::delete('/delete_products/{id}','ProductsController@destroy_products')->name('products.destroy')->middleware('auth');;
Route::delete('/delete_modele/{id}','ProductsController@destroy_modele')->name('modele.destroy')->middleware('auth');;
Route::delete('/delete_ref/{id}','RefController@destroy_ref')->name('ref.destroy')->middleware('auth');;
Route::delete('/delete_commande/{id}','CommandeController@destroy_commande')->name('commande.destroy')->middleware('auth');;
Route::delete('/delete_user/{id}','CommandeController@destroy_user')->name('user.destroy')->middleware('auth');;




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

