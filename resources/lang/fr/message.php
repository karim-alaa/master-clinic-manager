<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'fr');
return [
    'welcome' => $translator->translate('Welcome'),
];