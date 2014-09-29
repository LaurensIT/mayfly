<?php
/*
This file is part of Mayfly.

Copyright (C) 2014 Jan-Jorre Laurens <dratone@gmail.com>

Mayfly is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Foobar is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

*/
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
