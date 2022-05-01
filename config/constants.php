<?php

return [
    
     /*
    |--------------------------------------------------------------------------
    | App Constants
    |--------------------------------------------------------------------------
    |List of all constants for the app
    */

    'langs' => [
        'en' => ['full_name' => 'English', 'short_name' => 'English'],
        'es' => ['full_name' => 'Spanish - Español', 'short_name' => 'Spanish'],
        'sq' => ['full_name' => 'Albanian - Shqip', 'short_name' => 'Albanian'],
        'hi' => ['full_name' => 'Hindi - हिंदी', 'short_name' => 'Hindi'],
        'nl' => ['full_name' => 'Dutch', 'short_name' => 'Dutch'],
        'fr' => ['full_name' => 'French - Français', 'short_name' => 'French'],
        'de' => ['full_name' => 'German - Deutsch', 'short_name' => 'German'],
        'ar' => ['full_name' => 'Arabic - العَرَبِيَّة', 'short_name' => 'Arabic'],
        'tr' => ['full_name' => 'Turkish - Türkçe', 'short_name' => 'Turkish'],
        'id' => ['full_name' => 'Indonesian', 'short_name' => 'Indonesian'],
        'ps' => ['full_name' => 'Pashto', 'short_name' => 'Pashto'],
        'pt' => ['full_name' => 'Portuguese', 'short_name' => 'Portuguese'],
        'vi' => ['full_name' => 'Vietnamese', 'short_name' => 'Vietnamese'],
        'ce' => ['full_name' => 'Chinese', 'short_name' => '']
    ],
    'langs_rtl' => ['ar'],
    'non_utf8_languages' => ['ar', 'hi', 'ps'],
    
    'document_size_limit' => '1000000', //in Bytes,
    'image_size_limit' => '500000', //in Bytes

    'asset_version' => 53,

    'disable_expiry' => false,

    'disable_purchase_in_other_currency' => true,
    
    'iraqi_selling_price_adjustment' => false,

    'currency_precision' => 3, //Maximum 4
    'quantity_precision' => 0,  //Maximum 4

    'product_img_path' => 'img',

    'enable_sell_in_diff_currency' => false,
    'currency_exchange_rate' => 1,
    'orders_refresh_interval' => 600, //Auto refresh interval on Kitchen and Orders page in seconds,

    //Default date format to be used if session is not set. All valid formats can be found on https://www.php.net/manual/en/function.date.php
    'default_date_format' => 'm/d/Y',
    
    'administrator_usernames' => env('ADMINISTRATOR_USERNAMES'),
    'allow_registration' => env('ALLOW_REGISTRATION', true),
    'app_title' => env('APP_TITLE')
];
