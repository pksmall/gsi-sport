<?php

use Illuminate\Database\Seeder;

class ItemCharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new \App\ItemCharacteristic();
        $c->sort_id = 0;
        $c->sort_order = 0;
        $c->is_active = true;
        $c->save();

        $c_t = new \App\ItemCharacteristicsTranslation();
        $c_t->ch_id = $c->id;
        $c_t->locale = 'ru';
        $c_t->name = 'Размер';
        $c_t->slug = 'ch-1-ru-size';
        $c_t->save();

        $c_t1 = new \App\ItemCharacteristicsTranslation();
        $c_t1->ch_id = $c->id;
        $c_t1->locale = 'ua';
        $c_t1->name = 'Розмір';
        $c_t1->slug = 'ch-1-ua-size';
        $c_t1->save();

        $c_t2 = new \App\ItemCharacteristicsTranslation();
        $c_t2->ch_id = $c->id;
        $c_t2->locale = 'en';
        $c_t2->name = 'Size';
        $c_t2->slug = 'ch-1-en-size';
        $c_t2->save();
    }
}
