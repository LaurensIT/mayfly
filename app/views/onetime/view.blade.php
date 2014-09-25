@extends('base.onetime_nav')

@section('content')
<STYLE>
.form-signin {
	width: 500px;
	max-width: 1200px;
}
label {
	width: 25%;
	clear: left;
}
.form-control
{
	width: 73%;
	display:inline;
	margin-left: 17%;

}
#passContainer {
	height: 20px;
	margin-top: 10px;
	margin-bottom: 10px;

</STYLE>
<h3 style='margin-top: 60px; font-size: 20px' id='headerfetch'>{{ trans('onetime.aboutretrieve') }}</h3>
<p>{{ trans('onetime.retrievep1',array('sender' => $sender)) }}</p>
<p>{{ trans('onetime.retrievep2') }}</p>
<p>{{ trans('onetime.retrievep3') }}</p>
<form style='display: none'>
<label style='width: 10%;'>DBID:</label><input class='form-control' type='hidden' id='dbidC' value='{{ $dbid }}'/></br>
<label style='width: 10%;'>PKID:</label><input class='form-control' type='hidden' id='pkidC' value='{{ $pkid }}'/></br>
<label style='width: 10%;'>Session:</label><input class='form-control' type='hidden' id='sessionC' value='{{ $session }}'/></br>
<label style='width: 10%;'>Passcode:</label><input class='form-control' type='hidden' id='passcodeC' value='{{ $passcode }}'/></br>
</form>
<div id='passContainer'></div></br>

<button id='btnstartfetch' class="btn btn-lg btn-primary btn-block" onclick='doFetch()'>{{ trans('onetime.Start Fetch') }}</button>

@stop

@section('javascript')
<script language="JavaScript" type="text/javascript" src="/dist/js/jsbn.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/jsbn2.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/prng4.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/rng.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/rsa.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/base64.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/hex.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/oids.js"></script>

<script language="JavaScript" type="text/javascript" src="/dist/js/asn1.js"></script>
<script language="JavaScript" type="text/javascript" src="/dist/js/rsa2.js"></script>
<script>
var RSA;
var state = 0;
var e = document.getElementById('btnstartfetch');
function doFetch()
{
	if (state > 0) {
		return false;
	}
	state = 1;
	e.innerHTML = '{{ trans('onetime.genkey')}}';
	setTimeout(function(){doFetchStep1()},100);
}
function doFetchStep1()
{
	state = 1;
	var dbid = document.getElementById('dbidC').value;
	var pkid = document.getElementById('pkidC').value;
	var session = document.getElementById('sessionC').value;
	var passcode = document.getElementById('passcodeC').value;
	e.innerHTML = "{{ trans('onetime.gettingencrypted') }}"
	var modulus = "";
	var o = "";
	$.post('/onetime/fetchPassword','modulus=' + modulus + '&exponent='+ o + "&dbid=" + dbid + "&session=" + session + "&pkid=" + pkid + "&passcode=" + passcode ,function(data)
			{
				document.getElementById('passContainer').innerHTML = "{{ trans('onetime.Your password is') }}: <input type='text' value='" + data + "'/>"
				e.innerHTML = "{{ trans('onetime.Password retrieved') }}";
				document.getElementById('headerfetch').innerHTML = "{{ trans('onetime.Password retrieved') }}";
			}).fail(function(){
				e.innerHTML = "{{ trans('onetime.sorry') }}"
			})
}
</script>

@stop
