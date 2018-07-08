<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Новости', 'Статьи'];
        $categories_index = 0;
        foreach ($categories as $item)
        {
            $c = new \App\BlogCategory();
            $c->sort_order = $categories_index++;
            $c->save();

            $c_t = new \App\BlogCategoriesTranslation();
            $c_t->category_id = $c->id;
            $c_t->name = $item;
            $c_t->locale = 'ru';
            $c_t->slug = str_slug('b-' . $c->id . '-' . 'ru' . '-' . $item, '-', 'en');
            $c_t->save();

            $c_t = new \App\BlogCategoriesTranslation();
            $c_t->category_id = $c->id;
            $c_t->name = $item;
            $c_t->locale = 'ua';
            $c_t->slug = str_slug('b-' . $c->id . '-' . 'ua' . '-' . $item, '-', 'en');
            $c_t->save();

            $c_t = new \App\BlogCategoriesTranslation();
            $c_t->category_id = $c->id;
            $c_t->name = $item;
            $c_t->locale = 'en';
            $c_t->slug = str_slug('b-' . $c->id . '-' . 'en' . '-' . $item, '-', 'en');
            $c_t->save();
        }
    }
}
