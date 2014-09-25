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

Route::Get  ('/onetime',
                array(  'as' => 'onetimeindex',
                        'uses' => 'OnetimeController@index'
                )
            );
Route::Get  ('/onetime/create',
                'OnetimeController@create'
            );
Route::Get  ('/onetime/getPublicKey',
                array(  'as' => 'onetimecreate',
                        'uses' => 'OnetimeController@getPublicKey'
                )
            );
Route::Post ('/onetime/submitPassword',
                'OnetimeController@submitPassword'
            );
Route::Get  ('/onetime/view/{dbid}/{session}/{pkid}/{passcode}',
                'OnetimeController@view'
            );
Route::Post ('/onetime/fetchPassword',
                'OnetimeController@fetchPassword'
            );


Route::Get  ('/setLang',
                'OnetimeController@setLanguage'
            );
Route::get  ('/', 
                'OnetimeController@index'
            );




Route::Get('/terms',function() { 
    App::setLocale(Session::Get('lang','en')); 
    return View::Make('pages.terms'); 
});

Route::Get('/about',function() { 
    App::setLocale(Session::Get('lang','en')); 
    return View::Make('pages.about'); 
});
Route::Get('/privacy',function() {  
    App::setLocale(Session::Get('lang','en')); 
    return View::Make('pages.privacy'); 
});

?>
