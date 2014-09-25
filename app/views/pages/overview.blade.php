@extends('base.onetime_nav')

@section('content')
<STYLE>
.form-signin {
	width: 700px;
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
}
</STYLE>

<h1>{{ trans('onetime.PWShare.com workings') }}</h1>

<p>{{ trans('onetime.pwshareworksp1') }}</p>
<p>{{ trans('onetime.pwshareworksp2') }}</p>
<p>{{ trans('onetime.pwshareworksp3') }}</p>
<p>{{ trans('onetime.pwshareworksp4') }}
<script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'m'+'a'+'i'+'l'+'t'+'o'+'&'+'#'+'5'+'8'+';'+'%'+'7'+'3'+'u'+'&'+
'#'+'1'+'1'+'2'+';'+'%'+'7'+'0'+'&'+'#'+'1'+'1'+'1'+';'+'%'+'7'+'2'+'&'+'#'+'1'+'1'+'6'+';'+'&'+'#'+
'6'+'4'+';'+'p'+'&'+'#'+'3'+'7'+';'+'&'+'#'+'5'+'5'+';'+'&'+'#'+'5'+'5'+';'+'s'+'h'+'%'+'6'+'1'+'r'+
'e'+'&'+'#'+'4'+'6'+';'+'c'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+'1'+'0'+'9'+';'+"'"+'>'+'s'+'u'+'&'+'#'+
'1'+'1'+'2'+';'+'p'+'o'+'r'+'t'+'&'+'#'+'6'+'4'+';'+'p'+'w'+'&'+'#'+'1'+'1'+'5'+';'+'h'+'a'+'r'+'e'+
'&'+'#'+'4'+'6'+';'+'&'+'#'+'9'+'9'+';'+'o'+'m'+'<'+'/'+'a'+'>');</script><noscript>[Turn on JavaScript to see the email address]</noscript>.</p>
 
@stop
