<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$parents = ['Новинки', 'Одежда', 'Головные уборы', 'Обувь', 'Амуниция и снаряжение', 'Ткани', 'Товары со скидкой', 'Топ продаж', 'Оптовикам'];
        $parents = ['Новинки', 'Одежда', 'Головные уборы', 'Обувь', 'Амуниция и снаряжение', 'Ткани', 'Уніформа', 'Полювання та риболовля', 'Мілітарі'];
        $parent_index = 0;
        foreach ($parents as $parent) {
            $category = new \App\ItemCategory();
            $category->sort_order = $parent_index++;

            if ($parent == 'Мілітарі' || $parent == 'Полювання та риболовля') {

                if ($parent == 'Мілітарі') {
                    $category->sort_order = 0;
                }

                $category->is_inc_menu = true;
            } else {
                $category->is_inc_menu = false;
            }

            if ($parent == 'Одежда' || $parent == 'Головные уборы' || $parent == 'Обувь' || $parent == 'Амуниция и снаряжение')
            {
                $category->is_additional_menu = true;
            }

            $category->is_second_menu = true;
            $category->is_active = true;
            $category->save();

            foreach (['ru', 'ua', 'en'] as $locale) {
                $category_locale = new \App\ItemCategoriesTranslation();
                $category_locale->category_id = $category->id;
                $category_locale->name = $parent;
                $category_locale->slug = str_slug($parent . $locale, '-', 'en');
                $category_locale->locale = $locale;
                $category_locale->description = 'Description';
                $category_locale->meta_title = 'Meta title';
                $category_locale->meta_description = 'Meta desc';
                $category_locale->meta_keywords = 'Keyword';
                $category_locale->save();
            }

        }

        $subcategories = [
            null,
            [
                ['Куртки. Бушлаты', [
                    'Куртки тактические Soft-Shell и Hard-Shell',
                    'Куртки Полиция (Униформа)',
                    'Подстежки',
                    'Утеплители Бушлаты'
                ]],
                ['Костюмы', [
                    'Костюмы зимние (камуфляж)',
                    'Тактические костюмы',
                    'Костюмы Soft-Shell / HardShell',
                    'Костюмы для охоты и рыбалки',
                    'Спортивные',
                    'Маскировочные костюмы'
                ]],
                ['Кители'],
                ['Рубахи Ubacs'],
                ['Футболки', [
                    'Футболки TopCool',
                    'Футболки CoolPass',
                    'Футболки CoolTеch',
                    'Футболки Cotton',
                    'Футболки CoolMax'
                ]],
                ['Поло'],
                ['Футболки. Батники', [
                    'Футболки / Батники Cotton long (длинный рукав)',
                    'Футболки / Батники CoolMax long (длинный рукав)'
                ]],
                ['Термобелье', [
                    'CollPas',
                    'Термобелье CoolMax',
                    'Термобелье CoralFleece',
                    'Термобелье Cotton',
                    'Термобелье Polartec',
                    'Термобелье TermoLine'
                ]],
                ['Тельняшки. Майки', [
                    'Начес',
                    'Тканная',
                    'Накатка'
                ]],
                ['Кофты. Флисы. Свитера'],
                ['Брюки. Полукомбинезоны', [
                    'Брюки Soft-Shell',
                    'Брюки тактические',
                    'Спортивные Охота / Рыбалка',
                    'Полукомбинезоны'
                ]],
                ['Шорты'],
                ['Ветро-влагозащитная', [
                    'Костюм-дождевик (Пончо)',
                    'Непромокаемая одежда (костюмы)'
                ]]
            ],
            [
                ['Шапки', [
                    'Флис',
                    'Коттон'
                ]],
                ['Баффы', [
                    'Флис2'
                ]],
                ['Бейсболки'],
                ['Панамы'],
                ['Кепки'],
                ['Банданы, косынки, санданы'],
                ['Каверы'],
                ['Маски, подшлемники, балаклавы', [
                    'CoolMax'
                ]],
                ['Антимоскитные сетки']
            ],
            [
                ['Носки'],
                ['Ботинки с высоким берцем (берцы)', [
                    'Демисезонные берцы',
                    'Летние берцы',
                    'Зимние берцы'
                ]],
                ['Ботинки / Полуботинки'],
                ['Туфли'],
                ['Кроссовки тактические']
            ],
            [
                ['Жилеты разгрузочные', [
                    'Жилеты-разгрузки тактические',
                    'Жилеты-разгрузки для рыбалки и охоты'
                ]],
                ['Защита суставов. Наколенники. Налокотники'],
                ['Тактические очки'],
                ['Перчатки', [
                    'Без пальцев',
                    'Тактические'
                ]],
                ['Разгрузочные системы', [
                    'Разгрузочная система molle на бедро'
                ]],
                ['Ремни', [
                    'Офицерские',
                    'Тактические2'
                ]],
                ['Кобуры'],
                ['Шевроны, нашивки, погоны', [
                    'Погоны'
                ]],
                ['Палатки и спальники', [
                    'Спальники'
                ]]
            ]
        ];
        $s_i = 1;
        $subcategories_index = 0;
        foreach ($subcategories as $parent)
        {
            if (isset($parent))
            {
                foreach ($parent as $item)
                {
                    if (isset($item[0])) {
                        $category = new \App\ItemCategory();
                        $category->parent_id = $s_i;
                        $category->sort_order = $subcategories_index++;
                        $category->is_inc_menu = false;
                        $category->is_additional_menu = true;
                        $category->is_active = true;
                        $category->save();

                        foreach (['ru', 'ua', 'en'] as $locale) {
                            $category_locale = new \App\ItemCategoriesTranslation();
                            $category_locale->category_id = $category->id;
                            $category_locale->name = $item[0];
                            $category_locale->slug = str_slug($item[0] . $locale, '-', 'en');
                            $category_locale->locale = $locale;
                            $category_locale->description = 'Description';
                            $category_locale->meta_title = 'Meta title';
                            $category_locale->meta_description = 'Meta desc';
                            $category_locale->meta_keywords = 'Keyword';
                            $category_locale->save();
                        }
                    }
                    if (isset($item[1]))
                    {
                        $subcategories_index = 0;
                        foreach ($item[1] as $i)
                        {
                            $category2 = new \App\ItemCategory();
                            $category2->parent_id = $category->id;
                            $category2->sort_order = $subcategories_index++;
                            $category2->is_inc_menu = false;
                            $category2->is_additional_menu = true;
                            $category2->is_active = true;
                            $category2->save();

                            foreach (['ru', 'ua', 'en'] as $locale) {
                                $category_locale = new \App\ItemCategoriesTranslation();
                                $category_locale->category_id = $category2->id;
                                $category_locale->name = $i;
                                $category_locale->slug = str_slug($i . $locale, '-', 'en');
                                $category_locale->locale = $locale;
                                $category_locale->description = 'Description';
                                $category_locale->meta_title = 'Meta title';
                                $category_locale->meta_description = 'Meta desc';
                                $category_locale->meta_keywords = 'Keyword';
                                $category_locale->save();
                            }
                        }
                    }
                }
            }
            $s_i++;
        }
    }
}
