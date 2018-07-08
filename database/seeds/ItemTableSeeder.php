<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'Кепка DuspoFleece Дуб коричневый',
            'Костюм Дюспо Digital Oak',
            'Костюм зимний Alova Bark',
            'Шапка тактическая Cotton Flecktarn D',
            'Шеврон Полиция охраны Velcro Black',
            'Бандана Cotton A-TAKS FG',
            'Бандана Cotton ABU',
            'Бандана Cotton Cane Brown',
            'Бандана Cotton Cane Gray',
            'Бандана Cotton DDPM',
            'Бандана Cotton Desert 3 Color'
        ];

        $index = 0;
        foreach ($items as $item)
        {
            $i = new \App\Item();
            $i->code = $index++;
            $i->price = '123';
            $i->qty = '1';
            $i->is_active = true;
            $i->save();

            for ($j = 1; $j < 10; $j++)
            {
                \App\ItemMultiCategory::create(['item_id' => $i->id, 'category_id' => $j]);
            }

            $locales = ['ru', 'ua', 'en'];

            foreach ($locales as $locale)
            {
                $l = new \App\ItemTranslation();
                $l->item_id = $i->id;
                $l->locale = $locale;
                $l->name = $item;
                $l->slug = str_slug('i-' . $i->id . '-' . $locale . '-' . $item, '-', 'en');
                $l->description = $item;
                $l->save();
            }
        }
    }
}
