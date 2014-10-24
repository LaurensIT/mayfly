mayfly
======

### What is mayfly?

Mayfly is a webapplication designed to securely send passwords to customers.
Passwords are only retrievable once with the correct link. After trying it once, the password becomes inaccessible.

Passwords are not stored unencrypted and can only be decrypted with the information provided in a generated link.

To see mayfly in action, please visit https://mayfly.cyso.com/

### Installation

First, this guide assumes you have installed the Mayfly backend already. If you haven't - consider doing that first.
The mayfly backend can be found at https://github.com/Dratone/mayfly-backend

### Assumptions

Mayfly isn't tested on every possible platform. We assume the following setup:

OS: Ubuntu 14.04 TLS
PHP Version 5.5 or higher with mcrypt and curl enabled.
MySQL 5.5 or higher


### Installation instructions.

First, check out the source. Next, install the dependencies etc. using Composer:

```
composer update
```

Edit bootstrap/start.php and add a production environment with your servers hostname.
```php
$env = $app->detectEnvironment(array(
	'production' => array('mayfly-web'),
));
```

Next, edit app/config/production/database.php and specify your username and password:
```php
	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'database',
			'username'  => 'username',
			'password'  => 'password',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
```

Run the migrations:

```
php artisan migrate
```

Finally, edit app/config/system.php to suite your needs.