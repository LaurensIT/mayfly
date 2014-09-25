@extends('base.onetime_nav');

@section('content')

	<h1 class='' style='overflow: visible; font-size: 28px; margin-top: 40px'>{{ Lang::get('onetime.createlink') }}</h1>
<!-- <label style='width: 100px'>Email:</label> -->
<input class='form-control' placeholder='{{ trans('onetime.E-mail') }}' id='emailContainer' type='text'><br/>
<input class='form-control' placeholder='{{ trans('onetime.Your name') }}' id='nameContainer' type='text'><br/>
<!--<span> <label style='width: 100px'>Password:</label>-->
<div class='input-group'>
	<input placeholder='{{ trans('onetime.Password') }}' class='form-control' id='passwordContainer' type='text' style='margin-bottom: -1px; height: 45px'><br/>
	<span class='input-group-btn'>
	<!--<img style='height: 41px' src='/img/generate.png' class="btn btn-primary" onClick='toggleVis()'/>-->
	<a style='height: 45px' class=" btn btn-default" onClick='toggleVis()'><span style='line-height: 28px' class='fa fa-cog'></span></a>
	</span>
</div>
<br/><!-- <label style='width: 100px'></label>--><button class="btn btn-lg btn-success btn-block" onClick='prep()'>{{ trans('onetime.Send Link') }}</button>
<br/><!-- <label style='width: 100px'></label>--><button class="btn btn-lg btn-success btn-block" data-clipboard-target='newpwlink' id='' onClick='prep2()'>{{ trans('onetime.Get Link') }}</button>

<div id='sbarcontainer' class="progress progress-striped active" style='height: 45px; visibility: hidden; margin-top: 6px;'>
  <div id='progressbar' class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 45px">
    <span class="sr-only"></span>
  </div>
</div>

<h3>{{ trans('onetime.Link Validity') }}</h3>

<div class="btn-group">
	<button style='width: 113px' id='btn1day' onClick='setValid(1);return false;' class="btn btn-default">{{ trans('onetime.24 Hours') }}</button>
	<button style='width: 113px' id='btn1week' onClick='setValid(7); return false;' class="btn btn-default active">{{ trans('onetime.1 Week') }}</button>
	<button style='width: 113px' id='btn1month' onClick='setValid(30); return false;' class="btn btn-default">{{ trans('onetime.30 Days')}}</button>
</div>


@stop
@section('javascript')
<script type='text/javascript'>
var reHex = /^\s*(?:[0-9A-Fa-f][0-9A-Fa-f]\s*)+$/;
var sbar = document.getElementById('progressbar');
var type = 0;
var doasync= true;
var pwlink = "--NOTSETYET--";
function setValid(duration) 
{
	document.getElementById('btn1day').className='btn btn-default';
	document.getElementById('btn1week').className='btn btn-default';
	document.getElementById('btn1month').className='btn btn-default';
	if (duration == 1){document.getElementById('btn1day').className='btn btn-default active' }
	if (duration == 7){document.getElementById('btn1week').className='btn btn-default active' }
	if (duration == 30){document.getElementById('btn1month').className='btn btn-default active' }
	validity=x;
}

function doGetData()
{
	if (document.getElementById("passwordContainer").value == '')
  {
		alert('Please provide a password');
		return;
	}
	sbar.style.width="5%";
	document.getElementById('sbarcontainer').style.visibility='visible';
	$.ajax({async: doasync,url: '/onetime/getPublicKey',dataType: 'json',data: "validity=" + validity + "&type=" + type + "&name="+document.getElementById('nameContainer').value+"&email=" + document.getElementById('emailContainer').value}).done(function(data) { 
			sbar.style.width="15%";
			var der = reHex.test(data.public) ? Hex.decode(data.public) : Base64.unarmor(data.public);
                        var asn1 = ASN1.decode(der);
			var modStart = asn1.sub[1].sub[0].sub[0].posContent();
			var modLen = asn1.sub[1].sub[0].sub[0].length;
			var modbytes = [];
			sbar.style.width="25%";
			
			for(var x = 0; x < modLen; x++) {
			    modbytes.push(asn1.stream.enc[x+modStart]);
			}
			sbar.style.width="40%";
			
			var modulusHex = "";
			for(var x = 0; x < modbytes.length; x++) {
			    var hexByte = modbytes[x].toString(16);
			    // might need padding before appending
			    modulusHex += (hexByte.length == 1) ? "0"+hexByte : hexByte;
			}
			sbar.style.width="55%";
			
			var rsa = new RSAKey();
			var exponent = asn1.sub[1].sub[0].sub[1].content();
			sbar.style.width="70%";
			
			rsa.setPublic(modulusHex,exponent.toString(16));	
			sbar.style.width="85%";
			
			var encr = (rsa.encrypt(document.getElementById('passwordContainer').value));
			$.post('/onetime/submitPassword', "passwd=" + encr + "&dbid=" + data.dbid,function(data2) {
				sbar.style.width="100%";

				if (typeof(data.link) != "undefined")
				{
					pwlink=data.link;
					nhtml = "<a alt='Copy link to your clipboard!' data-clipboard-target='newpwlink' id='copybtn' style='height: 45px' class='btn btn-default'><span style='line-height: 28px' class='fa fa-file-o'></span></a>";
					document.getElementById('sbarcontainer').innerHTML = '<input id="newpwlink" class="form-control" style="width: 313px; display: inline" type="text" value="' + data.link + '"/>' + nhtml;
					zclipstatus=3;
					prepareClip();
				} else {
					sbar.innerHTML='{{ trans('onetime.hasbeensent') }}'
				}
					document.getElementById('passwordContainer').value = '';
					
			});
			type = 0;
		}
	)
}

function prep()
{
	type = 1;
	doGetData();
}

function prep2()
{
	type = 2;
	doGetData();
}


function toggleVis()
{
	var d = document.getElementById('passwordContainer');
	d.value = makeid(16);
}
function makeid(length)
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < length; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

validity=7;

zcipstatus=2

$(function() {

});
function prepareClip() {
var client = new ZeroClipboard( document.getElementById("copybtn") );
client.on( "ready", function( readyEvent ) {
  client.on("beforecopy",function(precopyEvent) {
	//doasync = false;
	//prep2();
  });
  client.on( 'copy', function(event) {
        event.clipboardData.setData('text/plain', pwlink);
  } );
  client.on( "aftercopy", function( event ) {
    // `this` === `client`
    // `event.target` === the element that was clicked
    //document.getElementById("newpwlink").style.width = "300px";
    document.getElementById('newpwlink').value=('link copied');
    //alert("Copied text to clipboard: " + event.data["text/plain"] );
  } );
} );
};
</script>
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
@stop
