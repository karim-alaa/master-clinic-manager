<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'es');
return [
    'welcome' => $translator->translate('Welcome'),
];