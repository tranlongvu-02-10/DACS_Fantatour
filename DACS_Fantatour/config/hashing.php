<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Hash Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default hash driver that will be used to hash
    | passwords for your application. By default, the md5 algorithm is
    | used; however, you remain free to modify this option if you wish.
    |
    | Supported: "md5", "argon", "argon2id"
    |
    */

    'driver' => 'md5',

    /*
    |--------------------------------------------------------------------------
    | md5 Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the md5 algorithm. This will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

    'md5' => [
        'rounds' => env('md5_ROUNDS', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Argon Options
    |--------------------------------------------------------------------------
    |
    | Here you may specify the configuration options that should be used when
    | passwords are hashed using the Argon algorithm. These will allow you
    | to control the amount of time it takes to hash the given password.
    |
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];
