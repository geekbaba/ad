<?php

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

    'accepted'             => '属性 :attribute 必须被接受。',
    'active_url'           => '属性 :attribute 不是一个可用的URL。',
    'after'                => '属性 :attribute 必须是在 :date 之后',
    'after_or_equal'       => '属性 :attribute 必须是等于或者在 :date 之后',
    'alpha'                => '属性 :attribute 只能包含字母。',
    'alpha_dash'           => '属性 :attribute 只能包含字母，数字、-。',
    'alpha_num'            => '属性 :attribute 只能包含字母，数字。',
    'array'                => '属性 :attribute must be an array.',
    'before'               => '属性 :attribute must be a date before :date.',
    'before_or_equal'      => '属性 :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => '属性 :attribute must be between :min and :max.',
        'file'    => '属性 :attribute must be between :min and :max kilobytes.',
        'string'  => '属性 :attribute must be between :min and :max characters.',
        'array'   => '属性 :attribute must have between :min and :max items.',
    ],
    'boolean'              => '属性 :attribute field must be true or false.',
    'confirmed'            => '属性 :attribute confirmation does not match.',
    'date'                 => '属性 :attribute is not a valid date.',
    'date_format'          => '属性 :attribute does not match 属性 format :format.',
    'different'            => '属性 :attribute and :o属性r must be different.',
    'digits'               => '属性 :attribute must be :digits digits.',
    'digits_between'       => '属性 :attribute must be between :min and :max digits.',
    'dimensions'           => '属性 :attribute has invalid image dimensions.',
    'distinct'             => '属性 :attribute field has a duplicate value.',
    'email'                => '属性 :attribute must be a valid email address.',
    'exists'               => '属性 selected :attribute is invalid.',
    'file'                 => '属性 :attribute must be a file.',
    'filled'               => '属性 :attribute field must have a value.',
    'image'                => '属性 :attribute must be an image.',
    'in'                   => '属性 selected :attribute is invalid.',
    'in_array'             => '属性 :attribute field does not exist in :other.',
    'integer'              => '属性 :attribute must be an integer.',
    'ip'                   => '属性 :attribute must be a valid IP address.',
    'ipv4'                 => '属性 :attribute must be a valid IPv4 address.',
    'ipv6'                 => '属性 :attribute must be a valid IPv6 address.',
    'json'                 => '属性 :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => '属性 :attribute may not be greater than :max.',
        'file'    => '属性 :attribute may not be greater than :max kilobytes.',
        'string'  => '属性 :attribute may not be greater than :max characters.',
        'array'   => '属性 :attribute may not have more than :max items.',
    ],
    'mimes'                => '属性 :attribute must be a file of type: :values.',
    'mimetypes'            => '属性 :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => '属性 :attribute must be at least :min.',
        'file'    => '属性 :attribute must be at least :min kilobytes.',
        'string'  => '属性 :attribute must be at least :min characters.',
        'array'   => '属性 :attribute must have at least :min items.',
    ],
    'not_in'               => '属性 selected :attribute is invalid.',
    'numeric'              => '属性 :attribute must be a number.',
    'present'              => '属性 :attribute field must be present.',
    'regex'                => '属性 :attribute format is invalid.',
    'required'             => '属性 :attribute field is required.',
    'required_if'          => '属性 :attribute field is required when :other is :value.',
    'required_unless'      => '属性 :attribute field is required unless :other is in :values.',
    'required_with'        => '属性 :attribute field is required when :values is present.',
    'required_with_all'    => '属性 :attribute field is required when :values is present.',
    'required_without'     => '属性 :attribute field is required when :values is not present.',
    'required_without_all' => '属性 :attribute field is required when none of :values are present.',
    'same'                 => '属性 :attribute and :other must match.',
    'size'                 => [
        'numeric' => '属性 :attribute must be :size.',
        'file'    => '属性 :attribute must be :size kilobytes.',
        'string'  => '属性 :attribute must be :size characters.',
        'array'   => '属性 :attribute must contain :size items.',
    ],
    'string'               => '属性 :attribute must be a string.',
    'timezone'             => '属性 :attribute must be a valid zone.',
    'unique'               => '属性 :attribute has already been taken.',
    'uploaded'             => '属性 :attribute failed to upload.',
    'url'                  => '属性 :attribute format is invalid.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
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
