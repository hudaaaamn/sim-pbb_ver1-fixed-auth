<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Kolom following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Kolom :attribute field must be accepted.',
    'accepted_if' => 'Kolom :attribute field must be accepted when :other is :value.',
    'active_url' => 'Kolom :attribute field must be a valid URL.',
    'after' => 'Kolom :attribute field must be a date after :date.',
    'after_or_equal' => 'Kolom :attribute field must be a date after or equal to :date.',
    'alpha' => 'Kolom :attribute field must only contain letters.',
    'alpha_dash' => 'Kolom :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'Kolom :attribute field must only contain letters and numbers.',
    'array' => 'Kolom :attribute harus berisi an array.',
    'ascii' => 'Kolom :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'Kolom :attribute harus berisi a date before :date.',
    'before_or_equal' => 'Kolom :attribute harus berisi a date before or equal to :date.',
    'between' => [
        'array' => 'Kolom :attribute field must have between :min and :max items.',
        'file' => 'Kolom :attribute harus berisi between :min and :max kilobytes.',
        'numeric' => 'Kolom :attribute harus berisi between :min and :max.',
        'string' => 'Kolom :attribute harus berisi between :min and :max characters.',
    ],
    'boolean' => 'Kolom :attribute harus berisi true or false.',
    'can' => 'Kolom :attribute field contains an unauthorized value.',
    'confirmed' => 'Kolom :attribute field confirmation does not match.',
    'current_password' => 'Kolom password is incorrect.',
    'date' => 'Kolom :attribute harus berisi tanggal yang valid.',
    'date_equals' => 'Kolom :attribute harus berisi a date equal to :date.',
    'date_format' => 'Kolom :attribute field must match the format :format.',
    'decimal' => 'Kolom :attribute field must have :decimal decimal places.',
    'declined' => 'Kolom :attribute harus berisi declined.',
    'declined_if' => 'Kolom :attribute harus berisi declined when :other is :value.',
    'different' => 'Kolom :attribute field and :other must be different.',
    'digits' => 'Kolom :attribute harus berisi :digits digits.',
    'digits_between' => 'Kolom :attribute harus berisi between :min and :max digits.',
    'dimensions' => 'Kolom :attribute field has invalid image dimensions.',
    'distinct' => 'Kolom :attribute field has a duplicate value.',
    'doesnt_end_with' => 'Kolom :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'Kolom :attribute field must not start with one of the following: :values.',
    'email' => 'Kolom :attribute harus berisi a valid email address.',
    'ends_with' => 'Kolom :attribute field must end with one of the following: :values.',
    'enum' => 'Kolom selected :attribute is invalid.',
    'exists' => 'Kolom selected :attribute is invalid.',
    'file' => 'Kolom :attribute harus berisi a file.',
    'filled' => 'Kolom :attribute field must have a value.',
    'gt' => [
        'array' => 'Kolom :attribute field must have more than :value items.',
        'file' => 'Kolom :attribute harus berisi greater than :value kilobytes.',
        'numeric' => 'Kolom :attribute harus berisi greater than :value.',
        'string' => 'Kolom :attribute harus berisi greater than :value characters.',
    ],
    'gte' => [
        'array' => 'Kolom :attribute field must have :value items or more.',
        'file' => 'Kolom :attribute harus berisi greater than or equal to :value kilobytes.',
        'numeric' => 'Kolom :attribute harus berisi greater than or equal to :value.',
        'string' => 'Kolom :attribute harus berisi greater than or equal to :value characters.',
    ],
    'image' => 'Kolom :attribute harus berisi an image.',
    'in' => 'Kolom selected :attribute is invalid.',
    'in_array' => 'Kolom :attribute field must exist in :other.',
    'integer' => 'Kaolom :attribute harus berisi angka.',
    'ip' => 'Kolom :attribute harus berisi a valid IP address.',
    'ipv4' => 'Kolom :attribute harus berisi a valid IPv4 address.',
    'ipv6' => 'Kolom :attribute harus berisi a valid IPv6 address.',
    'json' => 'Kolom :attribute harus berisi a valid JSON string.',
    'lowercase' => 'Kolom :attribute harus berisi lowercase.',
    'lt' => [
        'array' => 'Kolom :attribute field must have less than :value items.',
        'file' => 'Kolom :attribute harus berisi less than :value kilobytes.',
        'numeric' => 'Kolom :attribute harus berisi less than :value.',
        'string' => 'Kolom :attribute harus berisi less than :value characters.',
    ],
    'lte' => [
        'array' => 'Kolom :attribute field must not have more than :value items.',
        'file' => 'Kolom :attribute harus berisi less than or equal to :value kilobytes.',
        'numeric' => 'Kolom :attribute harus berisi less than or equal to :value.',
        'string' => 'Kolom :attribute harus berisi less than or equal to :value characters.',
    ],
    'mac_address' => 'Kolom :attribute harus berisi a valid MAC address.',
    'max' => [
        'array' => 'Kolom :attribute field must not have more than :max items.',
        'file' => 'Kolom :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'Kolom :attribute field must not be greater than :max.',
        'string' => 'Kolom :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => 'Kolom :attribute field must not have more than :max digits.',
    'mimes' => 'Kolom :attribute harus berisi a file of type: :values.',
    'mimetypes' => 'Kolom :attribute harus berisi a file of type: :values.',
    'min' => [
        'array' => 'Kolom :attribute field must have at least :min items.',
        'file' => 'Kolom :attribute harus berisi at least :min kilobytes.',
        'numeric' => 'Kolom :attribute harus berisi at least :min.',
        'string' => 'Kolom :attribute harus berisi at least :min characters.',
    ],
    'min_digits' => 'Kolom :attribute field must have at least :min digits.',
    'missing' => 'Kolom :attribute harus berisi missing.',
    'missing_if' => 'Kolom :attribute harus berisi missing when :other is :value.',
    'missing_unless' => 'Kolom :attribute harus berisi missing unless :other is :value.',
    'missing_with' => 'Kolom :attribute harus berisi missing when :values is present.',
    'missing_with_all' => 'Kolom :attribute harus berisi missing when :values are present.',
    'multiple_of' => 'Kolom :attribute harus berisi a multiple of :value.',
    'not_in' => 'Kolom selected :attribute is invalid.',
    'not_regex' => 'Kolom :attribute field format is invalid.',
    'numeric' => 'Kolom :attribute harus berisi a number.',
    'password' => [
        'letters' => 'Kolom :attribute field must contain at least one letter.',
        'mixed' => 'Kolom :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'Kolom :attribute field must contain at least one number.',
        'symbols' => 'Kolom :attribute field must contain at least one symbol.',
        'uncompromised' => 'Kolom given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'Kolom :attribute harus berisi present.',
    'prohibited' => 'Kolom :attribute field is prohibited.',
    'prohibited_if' => 'Kolom :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'Kolom :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'Kolom :attribute field prohibits :other from being present.',
    'regex' => 'Kolom :attribute field format is invalid.',
    'required' => 'Kolom :attribute harus diisi.',
    'required_array_keys' => 'Kolom :attribute field must contain entries for: :values.',
    'required_if' => 'Kolom :attribute field is required when :other is :value.',
    'required_if_accepted' => 'Kolom :attribute field is required when :other is accepted.',
    'required_unless' => 'Kolom :attribute field is required unless :other is in :values.',
    'required_with' => 'Kolom :attribute field is required when :values is present.',
    'required_with_all' => 'Kolom :attribute field is required when :values are present.',
    'required_without' => 'Kolom :attribute field is required when :values is not present.',
    'required_without_all' => 'Kolom :attribute field is required when none of :values are present.',
    'same' => 'Kolom :attribute field must match :other.',
    'size' => [
        'array' => 'Kolom :attribute field must contain :size items.',
        'file' => 'Kolom :attribute harus berisi :size kilobytes.',
        'numeric' => 'Kolom :attribute harus berisi :size.',
        'string' => 'Kolom :attribute harus berisi :size characters.',
    ],
    'starts_with' => 'Kolom :attribute field must start with one of the following: :values.',
    'string' => 'Kolom :attribute harus berisi string.',
    'timezone' => 'Kolom :attribute harus berisi a valid timezone.',
    'unique' => 'Kolom :attribute has already been taken.',
    'uploaded' => 'Kolom :attribute failed to upload.',
    'uppercase' => 'Kolom :attribute harus berisi uppercase.',
    'url' => 'Kolom :attribute harus berisi a valid URL.',
    'ulid' => 'Kolom :attribute harus berisi a valid ULID.',
    'uuid' => 'Kolom :attribute harus berisi a valid UUID.',

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
    | Kolom following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
