<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Мовні ресурси перевірки введення
    |--------------------------------------------------------------------------
    |
    | Наступні ресурси містять стандартні повідомлення перевірки коректності
    | введення даних. Деякі з цих правил мають декілька варіантів, як,
    | наприклад, size. Ви можете змінити будь-яке з цих повідомлень.
    |
    */
    'accepted' => 'Ви повинні прийняти :attribute.',
    'active_url' => 'Поле :attribute не є правильним URL.',
    'after' => 'Поле :attribute має містити дату не раніше :date.',
    'after_or_equal' => 'Поле :attribute має містити дату не раніше або дорівнюватися :date.',
    'alpha' => 'Поле :attribute має містити лише літери.',
    'alpha_dash' => 'Поле :attribute має містити лише літери, цифри та підкреслення.',
    'alpha_num' => 'Поле :attribute має містити лише літери та цифри.',
    'array' => 'Поле :attribute має бути масивом.',
    'before' => 'Поле :attribute має містити дату не пізніше :date.',
    'before_or_equal' => 'Поле :attribute має містити дату не пізніше або дорівнюватися :date.',
    'between' => [
        'numeric' => 'Поле :attribute має бути між :min та :max.',
        'file' => 'Розмір файлу в полі :attribute має бути не менше :min та не більше :max кілобайт.',
        'string' => 'Текст в полі :attribute має бути не менше :min та не більше :max символів.',
        'array' => 'Поле :attribute має містити від :min до :max елементів.',
    ],
    'boolean' => 'Поле :attribute повинне містити логічний тип.',
    'confirmed' => 'Поле :attribute не збігається з підтвердженням.',
    'date' => 'Поле :attribute не є датою.',
    'date_format' => 'Поле :attribute не відповідає формату :format.',
    'different' => 'Поля :attribute та :other повинні бути різними.',
    'digits' => 'Довжина цифрового поля :attribute повинна дорівнювати :digits.',
    'digits_between' => 'Довжина цифрового поля :attribute повинна бути від :min до :max.',
    'dimensions' => 'Поле :attribute містіть неприпустимі розміри зображення.',
    'distinct' => 'Поле :attribute містить значення, яке дублюється.',
    'email' => 'Поле :attribute повинне містити коректну електронну адресу.',
    'file' => 'Поле :attribute має містити файл.',
    'filled' => "Поле :attribute є обов'язковим для заповнення.",
    'exists' => 'Вибране для :attribute значення не коректне.',
    'image' => 'Поле :attribute має містити зображення.',
    'in' => 'Вибране для :attribute значення не коректне.',
    'in_array' => 'Значення поля :attribute не міститься в :other.',
    'integer' => 'Поле :attribute має містити ціле число.',
    'ip' => 'Поле :attribute має містити IP адресу.',
    'ipv4' => 'Поле :attribute має містити IPv4 адресу.',
    'ipv6' => 'Поле :attribute має містити IPv6 адресу.',
    'json' => 'Дані поля :attribute мають бути в форматі JSON.',
    'max' => [
        'numeric' => 'Поле :attribute має бути не більше :max.',
        'file' => 'Файл в полі :attribute має бути не більше :max кілобайт.',
        'string' => 'Текст в полі :attribute повинен мати довжину не більшу за :max.',
        'array' => 'Поле :attribute повинне містити не більше :max елементів.',
    ],
    'mimes' => 'Поле :attribute повинне містити файл одного з типів: :values.',
    'mimetypes' => 'Поле :attribute повинне містити файл одного з типів: :values.',
    'min' => [
        'numeric' => 'Поле :attribute повинне бути не менше :min.',
        'file' => 'Розмір файлу в полі :attribute має бути не меншим :min кілобайт.',
        'string' => 'Текст в полі :attribute повинен містити не менше :min символів.',
        'array' => 'Поле :attribute повинне містити не менше :min елементів.',
    ],
    'not_in' => 'Вибране для :attribute значення не коректне.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'Поле :attribute повинно містити число.',
    'present' => 'Поле :attribute повинне бути присутнє.',
    'regex' => 'Поле :attribute має хибний формат.',
    'required' => "Поле :attribute є обов'язковим для заповнення.",
    //'required_if' => "Поле :attribute є обов'язковим для заповнення, коли :other є рівним :value.",
    'required_if' => "Виберіть розмір товару для того щоб додати його в кошик.",
    'required_unless' => "Поле :attribute є обов'язковим для заповнення, коли :other відрізняється від :values",
    'required_with' => "Поле :attribute є обов'язковим для заповнення, коли :values вказано.",
    'required_with_all' => "Поле :attribute є обов'язковим для заповнення, коли :values вказано.",
    'required_without' => "Поле :attribute є обов'язковим для заповнення, коли :values не вказано.",
    'required_without_all' => "Поле :attribute є обов'язковим для заповнення, коли :values не вказано.",
    'same' => 'Поля :attribute та :other мають співпадати.',
    'size' => [
        'numeric' => 'Поле :attribute має бути довжини :size.',
        'file' => 'Файл в полі :attribute має бути розміром :size кілобайт.',
        'string' => 'Текст в полі :attribute повинен містити :size символів.',
        'array' => 'Поле :attribute повинне містити :size елементів.',
    ],
    'string' => 'Поле :attribute повинне містити текст.',
    'timezone' => 'Поле :attribute повинне містити коректну часову зону.',
    'unique' => 'Таке значення поля :attribute вже існує.',
    'uploaded' => 'Завантаження поля :attribute не вдалося.',
    'url' => 'Формат поля :attribute неправильний.',
    /*
    |--------------------------------------------------------------------------
    | Додаткові ресурси для перевірки введення
    |--------------------------------------------------------------------------
    |
    | Тут Ви можете вказати власні ресурси для підтвердження введення,
    | використовуючи формат "attribute.rule", щоб дати назву текстовим змінним.
    | Так ви зможете легко додати текст повідомлення для заданого атрибуту.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Власні назви атрибутів
    |--------------------------------------------------------------------------
    |
    | Наступні правила дозволяють налаштувати заміну назв полів введення
    | для зручності користувачів. Наприклад, вказати "Електронна адреса" замість
    | "email".
    |
    */
    'attributes' => [


        'name' => trans('item.profile_name'),
        'guest_name' => trans('item.profile_name'),
        'guest_city' => trans('item.address_city'),
        'guest_email' => trans('item.profile_email'),
        'guest_telephone' => trans('item.profile_telephone'),
        'mail_number' => trans('item.address_number'),
        'telephone' => trans('item.profile_telephone'),
        'password_confirmation' => trans('item.profile_r_password'),


        'country' => trans('item.address_country'),
        'city' => trans('item.address_city'),
        'address' => trans('item.address_address'),
        'zipcode' => trans('item.address_zipcode'),
        'item_address' => trans('item.address_address'),
        'item_zipcode' => trans('item.address_zipcode'),

        'delivery_country' => trans('item.address_country'),
        'delivery_city' => trans('item.address_city'),
        'delivery_address' => trans('item.address_address'),
        'delivery_zipcode' => trans('item.address_zipcode'),
        'delivery_id' => trans('item.address_number'),


        'password' => 'пароль',
        'item' => [
            'locales.ru.name' => 'Имя (RU)',
        ],
        'categories.0' => '"категорія"',
        'categories.1' => '"категорія"',
        'categories.2' => '"категорія"',
        'comment.rating' => 'Рейтинг',
        'comment.message' => 'Відгук',
        'item_locales.ru.name' => '"название RU"',
        'item_locales.ua.name' => '"название UA"',
        'item_locales.en.name' => '"название EN"',
        'item.code' => '"код товара"',
        'item.price' => '"цена"',
        'item.qty' => '"количество"',
        'categories' => '"категория товара"',
    ],
];