<?php
require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseSessionStorage;

error_reporting(null);

session_start();

try {
    ParseClient::initialize(
        'ASNNDrrmNIHFyedPSwEgWiKYzQWnT6J6JRUA98pL',
        'RAQX4zeCujTIuMU8p20neBYAsBLGwpf5xG7fyl0U',
        'LpNKoSI7eDnLCYcz1pstHtJJbnuk3mJfv0nQJwbP'
    );
    ParseClient::setServerURL('https://parseapi.back4app.com/', '/');
    ParseClient::setStorage(new ParseSessionStorage());
} catch (Exception $e) {
}

$health = ParseClient::getServerHealth();
if ($health['status'] !== 200) {
}

// Website root url
$GLOBALS['WEBSITE_PATH'] = 'https://tryst-me-admin.herokuapp.com';
