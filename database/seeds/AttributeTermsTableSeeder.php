<?php

use Illuminate\Database\Seeder;

class AttributeTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['XXL', 'XL', 'L', 'M'],
            ['Thorax', 'Chiton'],
            ['A-TACS AU', 'Black', 'City', 'Coyote', 'Highlander', 'Khaki', 'MM14', 'Oak', 'Olive', 'Sitka brown', 'Sitka Green'],
            ['Весна/Осень', 'Весна/Осень/Зима', 'Зима'],
            ['Hard Shell', 'Nylon', 'Polyester', 'Rip-Stop', 'Sarzha', 'Soft-shell', 'Twill', 'Микрофибра на мембране'],
            ['Милитари', 'Охота, рыбалка', 'Спорт, туризм', 'Униформа, милитари']
        ];

        $index = 1;
        foreach ($items as $items_new)
        {
            foreach ($items_new as $item)
            {
                $c = new \App\AttributeTerm();
                $c->sort_id = 0;
                $c->sort_order = 0;
                $c->attribute_id = $index;
                $c->is_active = true;
                $c->save();

                $c_t = new \App\AttributeTermsTranslation();
                $c_t->term_id = $c->id;
                $c_t->locale = 'ru';
                $c_t->name = $item;
                $c_t->slug = str_slug('tm-' . $c->id . '-' . 'ru' . '-' . $item, '-', 'en');
                $c_t->save();

                $c_t1 = new \App\AttributeTermsTranslation();
                $c_t1->term_id = $c->id;
                $c_t1->locale = 'ua';
                $c_t1->name = $item;
                $c_t1->slug = str_slug('tm-' . $c->id . '-' . 'ua' . '-' . $item, '-', 'en');
                $c_t1->save();

                $c_t2 = new \App\AttributeTermsTranslation();
                $c_t2->term_id = $c->id;
                $c_t2->locale = 'en';
                $c_t2->name = $item;
                $c_t2->slug = str_slug('tm-' . $c->id . '-' . 'en' . '-' . $item, '-', 'en');
                $c_t2->save();
            }
            $index++;
        }
    }
}
