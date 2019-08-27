<?php
return [
 
    [
        'pattern' => '/login',
        'route' => 'site/login',
        'encodeParams' => false,
    ],

    [
        'pattern' => '/signup',
        'route' => 'site/signup',
        'encodeParams' => false,
    ],

    [
        'pattern' => '/logout',
        'route' => 'site/logout',
        'encodeParams' => false,
    ],




    [
        'pattern' => '/profile',
        'route' => 'profile/index',
        'encodeParams' => false,
    ],



    [
        'pattern' => '/product/<id:\d+>',
        'route' => '/product/view/',
        'encodeParams' => false,
    ],


];
