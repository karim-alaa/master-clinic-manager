<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'fr');
return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => $translator->translate('The').':attribute'.$translator->translate('must be accepted.'),
    'active_url'           => $translator->translate('The').':attribute'.$translator->translate(' is not a valid URL.'),
    'after'                => $translator->translate('The').':attribute'.$translator->translate(' must be a date after :date.'),
    'alpha'                => $translator->translate('The').':attribute'.$translator->translate(' may only contain letters.'),
    'alpha_dash'           => $translator->translate('The').':attribute'.$translator->translate(' may only contain letters, numbers, and dashes.'),
    'alpha_num'            => $translator->translate('The').':attribute'.$translator->translate(' may only contain letters and numbers.'),
    'array'                => $translator->translate('The').':attribute'.$translator->translate(' must be an array.'),
    'before'               => $translator->translate('The').':attribute'.$translator->translate(' must be a date before :date.'),
    'between'              => [
        'numeric' => $translator->translate('The').':attribute'.$translator->translate(' must be between :min and :max.'),
        'file'    => $translator->translate('The').':attribute'.$translator->translate(' must be between :min and :max kilobytes.'),
        'string'  => $translator->translate('The').':attribute'.$translator->translate(' must be between :min and :max characters.'),
        'array'   => $translator->translate('The').':attribute'.$translator->translate(' must have between :min and :max items.'),
    ],
    'boolean'              => $translator->translate('The').':attribute'.$translator->translate(' field must be true or false.'),
    'confirmed'            => $translator->translate('The').':attribute'.$translator->translate(' confirmation does not match.'),
    'date'                 => $translator->translate('The').':attribute'.$translator->translate(' is not a valid date.'),
    'date_format'          => $translator->translate('The').':attribute'.$translator->translate(' does not match the format :format.'),
    'different'            => $translator->translate('The').':attribute'.$translator->translate(' and :other must be different.'),
    'digits'               => $translator->translate('The').':attribute'.$translator->translate(' must be :digits digits.'),
    'digits_between'       => $translator->translate('The').':attribute'.$translator->translate(' must be between :min and :max digits.'),
    'email'                => $translator->translate('The').':attribute'.$translator->translate(' must be a valid email address.'),
    'exists'               => $translator->translate('The').':attribute'.$translator->translate('The selected :attribute is invalid.'),
    'filled'               => $translator->translate('The').':attribute'.$translator->translate(' field is required.'),
    'image'                => $translator->translate('The').':attribute'.$translator->translate(' must be an image.'),
    'in'                   =>  $translator->translate('The').':attribute'.$translator->translate('The selected :attribute is invalid.'),
    'integer'              => $translator->translate('The').':attribute'.$translator->translate(' must be an integer.'),
    'ip'                   => $translator->translate('The').':attribute'.$translator->translate(' must be a valid IP address.'),
    'json'                 => $translator->translate('The').':attribute'.$translator->translate(' must be a valid JSON string.'),
    'max'                  => [
        'numeric' => $translator->translate('The').':attribute'.$translator->translate(' may not be greater than :max.'),
        'file'    => $translator->translate('The').':attribute'.$translator->translate(' may not be greater than :max kilobytes.'),
        'string'  => $translator->translate('The').':attribute'.$translator->translate(' may not be greater than :max characters.'),
        'array'   => $translator->translate('The').':attribute'.$translator->translate(' may not have more than :max items.'),
    ],
    'mimes'                => $translator->translate('The').':attribute'.$translator->translate(' must be a file of type: :values.'),
    'min'                  => [
        'numeric' => $translator->translate('The').':attribute'.$translator->translate(' must be at least :min.'),
        'file'    => $translator->translate('The').':attribute'.$translator->translate(' must be at least :min kilobytes.'),
        'string'  => $translator->translate('The').':attribute'.$translator->translate(' must be at least :min characters.'),
        'array'   => $translator->translate('The').':attribute'.$translator->translate(' must have at least :min items.'),
    ],
    'not_in'               =>  $translator->translate('The').':attribute'.$translator->translate('The selected :attribute is invalid.'),
    'numeric'              => $translator->translate('The').':attribute'.$translator->translate(' must be a number.'),
    'regex'                => $translator->translate('The').':attribute'.$translator->translate(' format is invalid.'),
    'required'             => $translator->translate('The').':attribute'.$translator->translate(' field is required.'),
    'required_if'          => $translator->translate('The').':attribute'.$translator->translate(' field is required when :other is :value.'),
    'required_unless'      => $translator->translate('The').':attribute'.$translator->translate(' field is required unless :other is in :values.'),
    'required_with'        => $translator->translate('The').':attribute'.$translator->translate(' field is required when :values is present.'),
    'required_with_all'    => $translator->translate('The').':attribute'.$translator->translate(' field is required when :values is present.'),
    'required_without'     => $translator->translate('The').':attribute'.$translator->translate(' field is required when :values is not present.'),
    'required_without_all' => $translator->translate('The').':attribute'.$translator->translate(' field is required when none of :values are present.'),
    'same'                 => $translator->translate('The').':attribute'.$translator->translate(' and :other must match.'),
    'size'                 => [
        'numeric' => $translator->translate('The').':attribute'.$translator->translate(' must be :size.'),
        'file'    => $translator->translate('The').':attribute'.$translator->translate(' must be :size kilobytes.'),
        'string'  => $translator->translate('The').':attribute'.$translator->translate(' must be :size characters.'),
        'array'   => $translator->translate('The').':attribute'.$translator->translate(' must contain :size items.'),
    ],
    'string'               => $translator->translate('The').':attribute'.$translator->translate(' must be a string.'),
    'timezone'             => $translator->translate('The').':attribute'.$translator->translate(' must be a valid zone.'),
    'unique'               => $translator->translate('The').':attribute'.$translator->translate(' has already been taken.'),
    'url'                  => $translator->translate('The').':attribute'.$translator->translate(' format is invalid.'),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'checkarr' => [
           'required' =>  $translator->translate('The').':attribute'.$translator->translate('Must check at least one day.'),
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
