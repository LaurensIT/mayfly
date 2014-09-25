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

<h1>About PWShare.com</h1>

<p>PWShare.com is a project designed and created by <a href="http://www.dratone.com">Jan-Jorre Laurens</a> when it became clear that there was a need to be able to send passwords in a secure manner.</p>

<p>Its design emphasises security over speed and makes the assumption that, some day, some how, hackers will get in.</p>

<p>The idea as such is that the information available in the application is of no use to hackers.</p>

<p>PWShare.com is hosted and sponsored by <a href="http://www.cyso.com">Cyso</a></p>

<h2>How does it work?</h2>

<p>PWShare uses a public/private key encryption specification known as RSA.<br />
When the client wants to send a password, a public key is requested from the server.<br />
<br />
The client then encrypts the password before sending the password to the server.<br />
Because of this, the server doesnt know or store the decrypted password.</p>

<p>Only using the link, which contains the Private key identifier and password, can the password be decrypted.</p>

<h2>What about my information?</h2>

<p>Only the senders name and the password are stored. Your e-mail address is only used to send the e-mail once and will never be stored.<br />
<br />
The name and password are deleted as soon as the password has been retrieved.</p>

<h2>How can I contact you?</h2>

<p>You can contact us by sending us an email to support@pwshare.com</p>


 
@stop
