conekta-php
===========

Unofficial Conekta.io PHP class - Get payments through Conekta REST API! using PHP


#Usage:

*First include "conekta.class.php" on your php file and create the object with your private key.
```php
/*
Using Conekta Class
*/
require_once("conekta.class.php");

$key = ''
$Conekta = new Conekta($key); 
```

#OXXO Payments
* Oxxo payment example:
```php
$request = array(
					'amount' => 90000,
     				'currency' => 'MXN',
     				'description' => 'DVD - Zorro',
     				'customer'=> array('email' => 'gil.gil@mypayments.mx'),
     				'cash'=> array('type' => 'oxxo')
	);
$response = $Conekta->makePayment($request);

print_r($response);
```

#Credit Card Payments
* CC payment example:
```php
/* Card Request*/
$request = array
(
 	'amount' => 100000,
	'currency' => 'MXN',
	'description' => 'LOL Article',
	'customer' => array(
    						'name' => 'Amir Canto',
 	  		 				'email' => 'amir@hotmail.com',
    						'phone' => '555555550'
						),

	 'card' => array(
     					'number' => '4111111111111111',
      					'exp_month' => '01',
    					'exp_year' => '17',
    					'cvc' => '000',
    					'name' => 'Mario Moreno Cantinflas',
 					)
);
$response = $Conekta->makePayment($request);
print_r($response);
```



#Bank Payment
* Bank payment example:
```php
/* Bank  Request*/
$request = array(

 	'amount' => 100000,
	'currency' => 'MXN',
	'description' => 'LOL Article',
	'customer' => array(
    						'name' => 'Amir Canto',
 	  		 				'email' => 'amir@hotmail.com',
    						'phone' => '555555550'
						),
  	'bank' => array('type' => 'banorte')
);
$response = $Conekta->makePayment($request);
print_r($response);
```

* foo.php contains the above examples, clone it and start receiving payments!