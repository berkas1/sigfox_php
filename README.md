*sigfox_php* library helps you to interact with Sigfox Backend API

THe library requires only PHP7+ and cURL support. No other dependency is required.

Currenty supported APIs:
-----------------
 - Device
 - Device Types
 - Groups


Installation
------------

This library can be installed with composer.

To install composer and the library, run these commands:
```
curl -sS https://getcomposer.org/installer | php
php composer.phar berkas1/sigfox_php
```

Usage
-----
First, you need to initialize an instance of Sigfox class and enter user credentials.
Then, you have to pick what you want to work with - Device, Device Type, Group, ...
```php
<?php

require 'vendor/autoload.php';
use Sigfox\Sigfox;

$sigfox = new Sigfox("userID", "password");
$device = $sigfox->device("deviceId");

```

And now you just use available methods, for example:
```php
print $device->consumptions(2017);
print $device->info();
```


**Every method** that communicates with API returns a string **which contains JSON formatted message**.

If a method accepts optional parameters, please provide them in form of array. To see which parameters are available for 
each method, please see official Sigfox API documentation (https://resources.sigfox.com/document/backend-api-documentation)


