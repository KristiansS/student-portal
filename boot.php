<?php
/**
 * Created by PhpStorm.
 * User: krist
 * Date: 2/11/2018
 * Time: 9:25 PM
 */
// autoloading the packages in the vendor folder
require "vendor/autoload.php";

// setting up braintree credentials
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('gyy6b7pymjbbkggv');
Braintree_Configuration::publicKey('m9b4js6r2xrnkzmd');
Braintree_Configuration::privateKey('8186db9904c0a2540059e05fd28580ef');

// Booting done