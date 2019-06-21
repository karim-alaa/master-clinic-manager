<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'du');
return [
    'welcome' => $translator->translate('Welcome'),
];