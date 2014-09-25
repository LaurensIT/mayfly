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
}
</STYLE>
<h3>Sorry</h3>
<p>The password you are trying to access has already been retrieved. <br/> It can't be accessed anymore.</p>
@stop
