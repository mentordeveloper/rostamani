<?php
/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('role', 'Role');
Route::model('permission', 'Permission');
Route::model('grade', 'Grade');
Route::model('category', 'Category');
Route::model('page', 'Page');
Route::model('postImageVideo', 'PostImageVideo');
Route::model('resource', 'UsersResource');



/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('permission', '[0-9]+');
Route::pattern('grade', '[0-9]+');
Route::pattern('category', '[0-9]+');
Route::pattern('page', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');



/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

Route::get('download/{imv_id}', 'BaseController@downloadFile');
Route::get('downloadCatalog/{file_name}', 'BaseController@downloadCatalog');
Route::get('file/view/{imv_id}', 'BaseController@viewFile');

// User reset routes
Route::get('forgot', 'UserController@getForgot');
Route::get('user/reset/{token}', 'UserController@getReset');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset');
Route::get('user/reset/success/{token}', 'UserController@getResetSuccessPage');
//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit');

//:: User Account Routes ::
Route::get('user/login', 'UserController@getLogin');
Route::post('user/login', 'UserController@postLogin');

Route::get('user/success/{Id}', 'UserController@getSuccessPage');
Route::get('user/error', 'UserController@getErrorPage');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: Application Routes ::
# Filter for detect language
Route::when('contact-us', 'detectLang');

# Contact Us Static Page
Route::get('contact-us', function() {
    // Return about us page
    return View::make('site/contact-us');
});
Route::post('contact-us', 'UserController@postContactRequest');
Route::post('get-a-quote', 'UserController@postQuoteRequest');


Route::get('dashboard', array('uses' => 'UserController@getLogin'));
Route::get('/', array('uses' => 'StoreAdminController@getIndex'));



Route::get('dapi/api_form', function() {

    return View::make("api_form_uploading");
    // First we fetch the Request instance
    $request = Request::instance();

    // Now we can get the content from it
    $content = $request->getContent();

    var_dump($content);

    // Return about us page
    echo 'file Input: ' . $file = Input::file('Filedata');
    print_r($_FILES);
    print_r($_REQUEST);
});
Route::post('dapi/pageMedia/{api_key}', function() {
    echo "<pre>";
    var_dump(Input::file('Filedata'));
    echo "</pre>";
    echo 'Get Mode';
// First we fetch the Request instance
    $request = Request::instance();

    // Now we can get the content from it
    $content = $request->getContent();

    var_dump($content);

    // Return about us page
    echo 'file Input: ' . $file = Input::file('Filedata');
    print_r($_FILES);
    print_r($_REQUEST);
});


