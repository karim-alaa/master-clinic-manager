<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'es');
return[
'beRightBack.' => $translator->translate('Be right back.'),
'pageNotFound' => $translator->translate('Bage Not Found'),
'accessNotAllowed' => $translator->translate('Access Not Allowed'),
];