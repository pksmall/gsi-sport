<?php

use Illuminate\Database\Seeder;

class TypeDeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delivery_arr = [
            ['Самовывоз в Одессе', 'Самовивіз в Одесі', 'Pickup in Odessa'],
            ['Новая почта', 'Нова пошта', 'Новая почта'],
            ['Деливери', 'Делівери', 'Деливери'],
            ['Автолюкс', 'Автолюкс', 'Автолюкс'],
            ['Ночной экспресс', 'Нічний експрес', 'Ночной экспресс'],
        ];


        $delivery = new \App\TypeDelivery();
        $delivery->is_active = true;
        $delivery->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery->id;
        $deli_t->name = $delivery_arr[0][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery->id;
        $deli_t->name = $delivery_arr[0][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery->id;
        $deli_t->name = $delivery_arr[0][2];
        $deli_t->locale = 'en';
        $deli_t->save();

        $delivery1 = new \App\TypeDelivery();
        $delivery1->is_active = true;
        $delivery1->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery1->id;
        $deli_t->name = $delivery_arr[1][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery1->id;
        $deli_t->name = $delivery_arr[1][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery1->id;
        $deli_t->name = $delivery_arr[1][2];
        $deli_t->locale = 'en';
        $deli_t->save();

        $delivery2 = new \App\TypeDelivery();
        $delivery2->is_active = true;
        $delivery2->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery2->id;
        $deli_t->name = $delivery_arr[2][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery2->id;
        $deli_t->name = $delivery_arr[2][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery2->id;
        $deli_t->name = $delivery_arr[2][2];
        $deli_t->locale = 'en';
        $deli_t->save();

        $delivery3 = new \App\TypeDelivery();
        $delivery3->is_active = true;
        $delivery3->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery3->id;
        $deli_t->name = $delivery_arr[3][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery3->id;
        $deli_t->name = $delivery_arr[3][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery3->id;
        $deli_t->name = $delivery_arr[3][2];
        $deli_t->locale = 'en';
        $deli_t->save();

        $delivery4 = new \App\TypeDelivery();
        $delivery4->is_active = true;
        $delivery4->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery4->id;
        $deli_t->name = $delivery_arr[4][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery4->id;
        $deli_t->name = $delivery_arr[4][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypeDeliveriesTranslation();
        $deli_t->delivery_id = $delivery4->id;
        $deli_t->name = $delivery_arr[4][2];
        $deli_t->locale = 'en';
        $deli_t->save();


    }
}
