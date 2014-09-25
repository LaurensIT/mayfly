<?php

class OnetimeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

        // Basic
    
	public function __construct()
	{
		App::setLocale(Session::Get('lang','en'));
                
	}
        /*
         * Author: Jan-Jorre Laurens
         * Sets the language for later use.
         * 
         */
	public function setLanguage()
	{
		$lang = Input::Get('lang','en');
		if ($lang != "en" && $lang != "nl" && $lang != "de")
			$lang = "en";
		Session::put('lang',$lang);
		App::setLocale(Session::Get('lang','en'));
	
		return Redirect::To(base64_decode(Input::Get('ref')));
	}	

        /*
         * Author: Jan-Jorre Laurens <dratone@gmail.com>
         * Retrieves a (random) public key of a new public/private keypair.
         */
        
	public function getPublicKey()
	{
		$keydaemon = new Keydaemon();
		$keydaemon->getaKey(Input::Get('validity'));
		$onetime = new Onetime();
		$onetime->encrypted = '';
		$onetime->valid_untill = date('Y-m-d H:i:s', time() + (Input::Get('validity') * 86400));
		$onetime->sender = Input::Get('name');
		$onetime->lang = Session::Get('lang','en');
		$onetime->save();
		if (Input::Get('type') == 1) {
			$lang = Session::Get('lang','en');
			Mail::send('emails.onetimelink_' . $lang ,
			array('to' => Input::Get('email'), 'dbid' => $onetime->id,'pkid' => $keydaemon->publickeyid,'session' => trim($keydaemon->session),'passcode' => $keydaemon->passcode,'name' => Input::Get('name')),
				function($msg)
				{
					$lang = Session::Get('lang','en');
					$msg->to(Input::Get('email'));
                                        /* Todo: Change this to use language files.
                                         * 
                                         */
					switch($lang) {
						case "en":
						default:
							$msg->subject('You\'ve received a password');
						break;
						case "de":
							$msg->subject('Sie haben ein Passwort erhalten');
						break;
						case "nl":
							$msg->subject('U heeft een wachtwoord toegezonden gekregen');
						break;
					}
				}
			);
		}
		$result = array(
                    "public" => $keydaemon->publickey,
                    "dbid"=>$onetime->id, 
                    "id" => $keydaemon->publickeyid, 
                    "session" => $keydaemon->session, 
                    "passcode" => $keydaemon->passcode
                );
		if (Input::Get('type') == 2)
		{
                    if (isset($_SERVER['HTTPS']))
                    {
			$result['link'] = "https://";
                    } else {
                        $result['link'] = "http://";     
                    }
                    
                    $result['link'] .= $_SERVER['HTTP_HOST']."/onetime/view/".$onetime->id. "/".trim($keydaemon->session)."/".$keydaemon->publickeyid."/" . $keydaemon->passcode;	
		}
		echo json_encode($result);
	}
	public function index()
	{
		App::setLocale(Session::Get('lang','en'));
		
		return View::Make('onetime.index');
	}
	
	public function view($dbid,$session,$pkid,$passcode)
	{
		$onetime = Onetime::Find($dbid);
		if ($onetime == null || strtotime($onetime->valid_untill) < time() || $onetime->encrypted == "")
		{
			return View::Make('onetime.view_taken');
		}
		if (!Session::Has('lang')) {
			if (isset($onetime->lang) || $onetime->lang == "") {
				Session::Set('lang','en');
			} else {
				Session::Set('lang',$onetime->lang);
			}
		}
		App::setLocale(Session::Get('lang','en'));
		return View::Make('onetime.view')
			->with('dbid',$dbid)
			->with('session',$session)
			->with('pkid',$pkid)
			->with('passcode',$passcode)
			->with('sender',$onetime->sender);
	
	}
        // Todo: Rename this function...
        
	public function fetchPassword()
	{
		$onetime = Onetime::Find(Input::Get('dbid'));
		$keydaemon = new Keydaemon();
		$keydaemon->passcode = Input::Get('passcode');
		$keydaemon->publickeyid = Input::Get('pkid');
		$keydaemon->session = Input::Get('session');
		
		echo $keydaemon->recrypt(
				$onetime->encrypted,
				str_replace("\r","","")
		);
		$onetime->encrypted = "";
		$onetime->save();
		
	}
	public function create()
	{
		App::setLocale(Session::Get('lang','en'));
		return View::Make('onetime.create');
	}

	public function submitPassword()
	{
		$onetime = Onetime::Find(Input::Get('dbid'));
		if ($onetime && $onetime->encrypted == "")
		{
			$onetime->encrypted = Input::Get('passwd');
			$onetime->save();
		}
	
	}
	
}




