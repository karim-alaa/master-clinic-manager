<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'du');
return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'previous' => $translator->translate('&laquo; Previous'),
    'next'     => $translator->translate('Next &raquo;'),

];
