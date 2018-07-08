<?php

use Illuminate\Database\Seeder;

class TypePayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delivery_arr = [
            ['Курьером', 'Кур\'єром', 'Сourier'],
            ['Наложенный платеж', 'Накладений платіж', 'Cash on delivery'],
            ['Безналичный расчет', 'Безготівковий розрахунок', 'Cashless payments']
        ];

        $delivery = new \App\TypePay();
        $delivery->is_active = true;
        $delivery->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery->id;
        $deli_t->name = $delivery_arr[0][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery->id;
        $deli_t->name = $delivery_arr[0][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery->id;
        $deli_t->name = $delivery_arr[0][2];
        $deli_t->locale = 'en';
        $deli_t->save();

        $delivery2 = new \App\TypePay();
        $delivery2->is_active = true;
        $delivery2->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery2->id;
        $deli_t->name = $delivery_arr[1][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery2->id;
        $deli_t->name = $delivery_arr[1][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery2->id;
        $deli_t->name = $delivery_arr[1][2];
        $deli_t->locale = 'en';
        $deli_t->save();

        $delivery3 = new \App\TypePay();
        $delivery3->is_active = true;
        $delivery3->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery3->id;
        $deli_t->name = $delivery_arr[2][0];
        $deli_t->locale = 'ru';
        $deli_t->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery3->id;
        $deli_t->name = $delivery_arr[2][1];
        $deli_t->locale = 'ua';
        $deli_t->save();

        $deli_t = new \App\TypePaysTranslation();
        $deli_t->pay_id = $delivery3->id;
        $deli_t->name = $delivery_arr[2][2];
        $deli_t->locale = 'en';
        $deli_t->save();
    }
}
