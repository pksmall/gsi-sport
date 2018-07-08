<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = new \App\Settings();
        $settings->title = 'Camo-Tec™ Интернет-магазин милитари одежды оригинального качества';
        $settings->description = 'Camo-Tec™ Большой выбор милитари одежды | ① Низкие цены ② Высокое качество ③ Доставка: вся Украина - ☎ (063)135-15-40';
        $settings->title_shop = 'Camo-Tec™';
        $settings->owner = 'Camo-Tec™';
        $settings->address = 'Наш офіс знаходиться за адресою: м. Одесса, вул. Базовая, 11, 65120';
        $settings->geocode = '51.519,31.2706109';
        $settings->email = 'info@camo-tec.com';
        $settings->telephone = '+38(063) 135 15 40';
        $settings->open = "<p class=\"adres icon-gps\">ул. Базовая, 11, 65120</p>
                    <p class=\"phone icon-walkie-talkie\"><a href=\"tel:+380631351540\">+380 63 135 15 40</a>, <a href=\"tel:+380978882165\">+380 97 888 21 65</a></p>
                    <p class=\"email icon-envelope\"><a href=\"mailto:info@camo-tec.com\">info@camo-tec.com</a></p>";
        $settings->open_ua = "<p class=\"adres icon-gps\">ул. Базовая, 11, 65120</p>
                    <p class=\"phone icon-walkie-talkie\"><a href=\"tel:+380631351540\">+380 63 135 15 40</a>, <a href=\"tel:+380978882165\">+380 97 888 21 65</a></p>
                    <p class=\"email icon-envelope\"><a href=\"mailto:info@camo-tec.com\">info@camo-tec.com</a></p>";
        $settings->open_en = "<p class=\"adres icon-gps\">ул. Базовая, 11, 65120</p>
                    <p class=\"phone icon-walkie-talkie\"><a href=\"tel:+380631351540\">+380 63 135 15 40</a>, <a href=\"tel:+380978882165\">+380 97 888 21 65</a></p>
                    <p class=\"email icon-envelope\"><a href=\"mailto:info@camo-tec.com\">info@camo-tec.com</a></p>";
        $settings->save();
    }
}
