<?php
require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseSessionStorage;

error_reporting(null);

session_start();

try {
    ParseClient::initialize(
        'ASNNDrrmNIHFyedPSwEgWiKYzQWnT6J6JRUA98pL',
        'wQp4biPrV8DByDYHWzMichuNenrFEiXmZyGeCwrT',
        'dKpMVT8xi0TeCLFSriAo6taqZ5QqhAXcghPuSzxH'
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
