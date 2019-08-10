<?php

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


/************************** Rutas para el home ***********************/
Route::get('/', 'WelcomeController@welcome');
Route::group(['middleware' => ['auth','ActiveUser']], function() {
    Route::get('/home', 'HomeController@index');
  
});

Route::get('ciudades/{id}','HomeController@findCity');

/**********************Rutas para el usuario *********************/

Auth::routes();
  
Route::post('/password/reset', 'Auth\ResetPasswordController@reset')->middleware('ActiveUser');

Route::post('EmailValidate','ReferalsController@email');
Route::post('EmailConfirmationValidate','ReferalsController@emailConfirmation');
//Route::get('/register/verify/{code}', 'Auth\RegisterController@verify');
Route::get('/register/verify/{code}', 'GuestController@verify');

Route::resource('users', 'UserController');

Route::get('EditProfile','UserController@edit');
Route::get('findUser/{id}','UserController@findUser');

Route::post('CompleteProfile','UserController@CompleteProfile');
Route::get('DeleteAccount/{id}','UserController@closed');


Route::post('ChangePassword/{id}','UserController@changepassword');



/********************* Rutas de admin  *******************/
//Route::resource('promoters', 'PromoterController');
Route::get('admin_login', 'PromoterAuth\LoginController@showLoginForm');

Route::post('admin_login', 'PromoterAuth\LoginController@login');

Route::post('promoter_logout', 'PromoterAuth\LoginController@logout');

Route::get('/promoter_home','PromoterController@index');

Route::get('/admin_clients','AdminController@ShowClients');

Route::get('/admin_catalog_pos','AdminController@ShowCatalogPos');
Route::get('AllClientsDataTable','AdminController@AllClientsData');
Route::get('AllCatalogPosDataTable','AdminController@AllCatalogData');

Route::match(['put', 'patch'],'update_user_admin', 'AdminController@update');

Route::get('EditProfilePromoter','PromoterController@edit');

Route::post('UpdateProfilePromoter','PromoterController@update');
//Agregada 03/08/2019

Route::post('ChangePasswordPromoter/{id}','PromoterController@changepassword');


Route::get('/admin_verification_clients','AdminController@ShowVerificateClients');


                      //Funciones del catalogoPOS

Route::get('DeleteCatalog/{id}','CatalogController@closed');
Route::get('findCatalog/{id}','CatalogController@findCatalog');
Route::match(['put', 'patch'],'update_catalog', 'CatalogController@update');
Route::post('addCatalogPos','CatalogController@add');



 // Menu de funcionalidades del Usuario
Route::get('Wallets/Consolidado','ContentController@ShowWallets');

Route::get('Comercio/Pagar','ContentController@ShowComercio');

Route::get('Contacto/Transferir','ContentController@ShowContactsTransfer');

Route::get('Nube/Enviar','ContentController@ShowEnviar');

Route::get('Nube/Recibir','ContentController@ShowRecibir');

Route::get('Nube/Solicitar','ContentController@ShowSolicitar');

Route::get('Contacto','ContentController@ShowContacts');

Route::get('ActivityResent','ContentController@showActividadReciente');

//Verificacion 

Route::get('ClientsDataTable','AdminController@ClientsData');
Route::get('ClientsVerificatedDataTable','AdminController@ClientsVerifiedData');
Route::get('RejectedClientsDataTable','AdminController@RejectedClientsData');
Route::post('ValidateUser/{id}','AdminController@ValidateUser');
Route::get('infoUser/{id}','AdminController@infoUsuario');
