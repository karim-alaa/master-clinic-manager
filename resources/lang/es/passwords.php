<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'es');
return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'password' => $translator->translate('Passwords must be at least six characters and match the confirmation.'),
    'reset' => $translator->translate('Your password has been reset!'),
    'sent' => $translator->translate('We have e-mailed your password reset link!'),
    'token' => $translator->translate('This password reset token is invalid.'),
    'user' => $translator->translate("We can't find a user with that e-mail address."),

];
