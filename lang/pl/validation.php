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

    'accepted' => 'Pole :attribute musi zostać zaakceptowane.',
    'active_url' => 'Pole :attribute nie jest prawidłowym adresem URL.',
    'after' => 'Pole :attribute musi być datą późniejszą niż :date.',
    'after_or_equal' => 'Pole :attribute musi być datą nie wcześniejszą niż :date.',
    'alpha' => 'Pole :attribute może zawierać tylko litery.',
    'alpha_dash' => 'Pole :attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => 'Pole :attribute może zawierać tylko litery i cyfry.',
    'array' => 'Pole :attribute musi być tablicą.',
    'before' => 'Pole :attribute musi być datą wcześniejszą niż :date.',
    'before_or_equal' => 'Pole :attribute musi być datą nie późniejszą niż :date.',
    'between' => [
        'numeric' => 'Pole :attribute musi zawierać się w przedziale :min - :max.',
        'file' => 'Pole :attribute musi zawierać się w przedziale :min - :max kilobajtów.',
        'string' => 'Pole :attribute musi zawierać się w przedziale :min - :max znaków.',
        'array' => 'Pole :attribute musi mieć od :min do :max elementów.',
    ],
    'boolean' => 'Pole :attribute musi mieć wartość prawda lub fałsz.',
    'confirmed' => 'Potwierdzenie pola :attribute nie zgadza się.',
    'date' => 'Pole :attribute nie jest prawidłową datą.',
    'date_equals' => 'Pole :attribute musi być datą równą :date.',
    'date_format' => 'Pole :attribute nie zgadza się z formatem :format.',
    'different' => 'Pole :attribute oraz :other muszą się różnić.',
    'digits' => 'Pole :attribute musi mieć :digits cyfr.',
    'digits_between' => 'Pole :attribute musi mieć od :min do :max cyfr.',
    'dimensions' => 'Pole :attribute ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole :attribute ma zduplikowaną wartość.',
    'email' => 'Pole :attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => 'Pole :attribute musi kończyć się jednym z następujących: :values.',
    'exists' => 'Wybrane pole :attribute jest nieprawidłowe.',
    'file' => 'Pole :attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'numeric' => 'Pole :attribute musi być większe niż :value.',
        'file' => 'Pole :attribute musi być większe niż :value kilobajtów.',
        'string' => 'Pole :attribute musi być większe niż :value znaków.',
        'array' => 'Pole :attribute musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => 'Pole :attribute musi być większe lub równe :value.',
        'file' => 'Pole :attribute musi być większe lub równe :value kilobajtów.',
        'string' => 'Pole :attribute musi być większe lub równe :value znaków.',
        'array' => 'Pole :attribute musi mieć :value lub więcej elementów.',
    ],
    'image' => 'Pole :attribute musi być obrazem.',
    'in' => 'Wybrane pole :attribute jest nieprawidłowe.',
    'in_array' => 'Pole :attribute nie istnieje w :other.',
    'integer' => 'Pole :attribute musi być liczbą całkowitą.',
    'ip' => 'Pole :attribute musi być prawidłowym adresem IP.',
    'ipv4' => 'Pole :attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => 'Pole :attribute musi być prawidłowym adresem IPv6.',
    'json' => 'Pole :attribute musi być prawidłowym ciągiem JSON.',
    'lt' => [
        'numeric' => 'Pole :attribute musi być mniejsze niż :value.',
        'file' => 'Pole :attribute musi być mniejsze niż :value kilobajtów.',
        'string' => 'Pole :attribute musi być mniejsze niż :value znaków.',
        'array' => 'Pole :attribute musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => 'Pole :attribute musi być mniejsze lub równe :value.',
        'file' => 'Pole :attribute musi być mniejsze lub równe :value kilobajtów.',
        'string' => 'Pole :attribute musi być mniejsze lub równe :value znaków.',
        'array' => 'Pole :attribute nie może mieć więcej niż :value elementów.',
    ],
    'max' => [
        'numeric' => 'Pole :attribute nie może być większe niż :max.',
        'file' => 'Pole :attribute nie może być większe niż :max kilobajtów.',
        'string' => 'Pole :attribute nie może być większe niż :max znaków.',
        'array' => 'Pole :attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => 'Pole :attribute musi być plikiem typu: :values.',
    'mimetypes' => 'Pole :attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => 'Pole :attribute musi mieć przynajmniej :min.',
        'file' => 'Pole :attribute musi mieć przynajmniej :min kilobajtów.',
        'string' => 'Pole :attribute musi mieć przynajmniej :min znaków.',
        'array' => 'Pole :attribute musi mieć przynajmniej :min elementów.',
    ],
    'not_in' => 'Wybrane pole :attribute jest nieprawidłowe.',
    'not_regex' => 'Format pola :attribute jest nieprawidłowy.',
    'numeric' => 'Pole :attribute musi być liczbą.',
    'password' => 'Hasło jest nieprawidłowe.',
    'present' => 'Pole :attribute musi być obecne.',
    'regex' => 'Format pola :attribute jest nieprawidłowy.',
    'required' => 'Pole :attribute jest wymagane.',
    'required_if' => 'Pole :attribute jest wymagane, gdy :other jest :value.',
    'required_unless' => 'Pole :attribute jest wymagane, chyba że :other jest w :values.',
    'required_with' => 'Pole :attribute jest wymagane, gdy :values jest obecne.',
    'required_with_all' => 'Pole :attribute jest wymagane, gdy :values są obecne.',
    'required_without' => 'Pole :attribute jest wymagane, gdy :values nie jest obecne.',
    'required_without_all' => 'Pole :attribute jest wymagane, gdy żadne z :values nie są obecne.',
    'same' => 'Pole :attribute i :other muszą się zgadzać.',
    'size' => [
        'numeric' => 'Pole :attribute musi mieć :size.',
        'file' => 'Pole :attribute musi mieć :size kilobajtów.',
        'string' => 'Pole :attribute musi mieć :size znaków.',
        'array' => 'Pole :attribute musi zawierać :size elementów.',
    ],
    'starts_with' => 'Pole :attribute musi zaczynać się od jednego z następujących: :values.',
    'string' => 'Pole :attribute musi być ciągiem znaków.',
    'timezone' => 'Pole :attribute musi być prawidłową strefą czasową.',
    'unique' => 'Pole :attribute jest już zajęte.',
    'uploaded' => 'Nie udało się przesłać pliku :attribute.',
    'url' => 'Format pola :attribute jest nieprawidłowy.',
    'uuid' => 'Pole :attribute musi być prawidłowym identyfikatorem UUID.',

   

    'attributes' => [],

];
