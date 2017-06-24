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

    'accepted'             => ':attribute kabul edilmelidir.',
    'active_url'           => ':attribute geçirli bir url değildir.',
    'after'                => ':attribute, :date tarihinden sonra olmalıdır.',
    'alpha'                => ':attribute sadece harf içermelidir.',
    'alpha_dash'           => ':attribute sadece harf, rakam veya çizgi içermelidir.',
    'alpha_num'            => ':attribute sadece harf ve rakam içermelidir.',
    'array'                => ':attribute dizi olmalıdır.',
    'before'               => ':attribute, :date tarihinden önce olmalıdır.',
    'between'              => [
        'numeric' => ':attribute :min ve :max aralığında olmalıdır.',
        'file'    => ':attribute :min kilobyte ve :max kilobyte aralığında olmalıdır.',
        'string'  => ':attribute :min ve :max karakter aralığında olmalıdır.',
        'array'   => ':attribute :min ve :max aralığında öğesi olmalıdır.',
    ],
    'boolean'              => ':attribute alanı true ya da false olmalıdır.',
    'confirmed'            => ':attribute eşleşmedi.',
    'date'                 => ':attribute geçirli bir tarih formatı değildir.',
    'date_format'          => ':attribute, formata uygun değildir.(:format).',
    'different'            => ':attribute ve :other farklı olmalıdır.',
    'digits'               => ':attribute :digits rakamdan oluşmalıdır.',
    'digits_between'       => ':attribute en az :min ve en fazla :max rakamdan oluşmalıdır.',
    'distinct'             => ':attribute eşsiz olmalıdır.',
    'email'                => ':attribute geçirli bir email adresi olmalıdır.',
    'exists'               => ':attribute bulunamadı.',
    'filled'               => ':attribute alanı zorunludur.',
    'image'                => ':attribute resim olmalıdır.',
    'in_array'             => ':attribute alanı :other alanında bulunmamaktadır.',
    'in'                   => 'Seçilen :attribute geçirsizdir.',
    'integer'              => ':attribute tamsayı olmalıdır.',
    'ip'                   => ':attribute geçirli IP adresi olmalıdır.',
    'json'                 => ':attribute geçirli bir JSON olmalıdır.',
    'max'                  => [
        'numeric' => ':attribute :max sayısından büyük olmamalıdır.',
        'file'    => ':attribute :max kilobyte\'dan büyük olmamalıdır.',
        'string'  => ':attribute :max karakterden fazla olmamalıdır.',
        'array'   => ':attribute :max öğeden fazla öğe içermemelidir.',
    ],
    'mimes'                => ':attribute :values dosya uzantılarından biri olmalıdır.',
    'min'                  => [
        'numeric' => ':attribute en az :min olmalıdır.',
        'file'    => ':attribute en az :min kilobyte olmalıdır.',
        'string'  => ':attribute en az :min karakterden oluşmalıdır.',
        'array'   => ':attribute en az :min öğeden oluşmalıdır.',
    ],
    'not_in'               => 'Seçilen :attribute geçirsizdir.',
    'numeric'              => ':attribute sayı olmalıdır.',
    'present'              => ':attribute alanı zorunludur.',
    'regex'                => ':attribute format geçirsizdir.',
    'required'             => ':attribute alanı zorunludur.',
    'required_if'          => ':attribute alanı :other alanı :value olduğunda zorunludur.',
    'required_unless'      => ':attribute alanı :other alanındaki değerler :values olmadığı sürece zorunludur.',
    'required_with'        => ':attribute alanı :values alanlarından biri varsa zorunludur.',
    'required_with_all'    => ':attribute alanı :values alanları varsa zorunludur.',
    'required_without'     => ':attribute alanı :values alanlarından biri yoksa zorunludur.',
    'required_without_all' => ':attribute alanı :values alanları yoksa zorunludur.',
    'same'                 => ':attribute ve :other alanları aynı olmalıdır.',
    'size'                 => [
        'numeric' => ':attribute :size olmalıdır.',
        'file'    => ':attribute :size kilobyte olmalıdır.',
        'string'  => ':attribute :size karakterden oluşmalıdır.',
        'array'   => ':attribute :size öğe içermelidir.',
    ],
    'string'               => ':attribute string olmalıdır.',
    'timezone'             => ':attribute geçirli bir zaman dilimi olmalıdır.',
    'unique'               => ':attribute kullanılmaktadır.',
    'url'                  => ':attribute format geçirsizdir.',
    'alpha_num_underscore' => ':attribute sadece harf, rakam veya altçizgi içermelidir.',
    'urlschemes' => ':attribute :urlschemes tipinde url olmalıdır.',
    'float' => ':attribute ondalık kısmı maksimum :decimalsize hane, noktadan sonraki kısmı maksimum :fractionsize hane olabilir.',
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
